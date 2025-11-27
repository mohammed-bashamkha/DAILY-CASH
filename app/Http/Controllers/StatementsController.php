<?php

namespace App\Http\Controllers;

use App\Models\Cashbox;
use Illuminate\Http\Request;
use App\Models\Entity;
use App\Models\JourbalEntry;
use App\Models\RevenuesExpenses;
use Illuminate\Support\Facades\Auth;
use Omaralalwi\Gpdf\Facade\Gpdf;

class StatementsController extends Controller
{
    public function index()
    {
        return view('Statements.index',);
    }

    public function getEntityStatement($entity_id)
    {
        // نبحث عن الكيان (عامل / مشروع)
        $entity = Entity::findOrFail($entity_id);

        // جميع العمليات المرتبطة بالكيان
        $transactions = RevenuesExpenses::where('entity_id', $entity_id)
            ->orderBy('date', 'desc')
            ->get();

        // حساب الإجماليات
        $total_income = $transactions->where('type', 'income')->sum('amount');
        $total_expense = $transactions->where('type', 'expense')->sum('amount');
        $balance = $total_income - $total_expense;

        $html = view('pdf.entity-statement', [
        'entity'         => $entity,
        'transactions'   => $transactions,
        'total_income'   => $total_income,
        'total_expense'  => $total_expense,
        'balance'        => $balance
    ])->render();

        //  // 5. توليد PDF كـ string
        $pdfContent = Gpdf::generate($html);

        // // 6. إرجاعه كتحميل (Download)
        return response($pdfContent)
            ->header('Content-Type', 'application/pdf')
            ->header('Content-Disposition', 'attachment; filename="statement-'.$entity->name.'.pdf"')
            ->header('Content-Length', strlen($pdfContent));
    }

    public function getJourbalEntryStatement($entity_id)
{
    // 1. جلب الكيان
    $entity = Entity::findOrFail($entity_id);

    // 2. جلب جميع القيود الخاصة بالكيان
    $entries = JourbalEntry::where('debit_entity_id', $entity_id)
        ->orWhere('credit_entity_id', $entity_id)
        ->orderBy('date', 'desc')
        ->get();

    // 3. حساب الإجماليات
    $total_debit  = $entries->where('debit_entity_id', $entity_id)->sum('amount');
    $total_credit = $entries->where('credit_entity_id', $entity_id)->sum('amount');

    // 4. الرصيد = مدين - دائن
    $balance = $total_debit - $total_credit;

    // 5. تجهيز الـ HTML
    $html = view('pdf.journal-statement', [
        'entity'       => $entity,
        'entries'      => $entries,
        'total_debit'  => $total_debit,
        'total_credit' => $total_credit,
        'balance'      => $balance
    ])->render();

    // 6. توليد PDF
    $pdfContent = Gpdf::generate($html);

    return response($pdfContent)
        ->header('Content-Type', 'application/pdf')
        ->header('Content-Disposition', 'attachment; filename="journal-'.$entity->name.'.pdf"')
        ->header('Content-Length', strlen($pdfContent));
}


    public function selectEntity()
    {
        $entities = Auth::user()->entities;

        return view('statements.select-entity', compact('entities'));
    }

    public function selectEntityForJournal()
    {
        $entities = Auth::user()->entities;
        return view('statements.journal-select', compact('entities'));
    }


    public function getLast5states() {
        $user_id = Auth::user()->id;
        $transactions = RevenuesExpenses::where('created_by', $user_id)
            ->orderBy('date', 'desc')
            ->take(5)
            ->get();
        return response()->json($transactions);
    }

}
