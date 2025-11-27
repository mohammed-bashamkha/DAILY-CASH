<?php

namespace App\Http\Controllers;

use App\Models\Entity;
use App\Models\RevenuesExpenses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Omaralalwi\Gpdf\Facade\Gpdf;

class RevenuesExpensesController extends Controller
{
    // --- Revenues Methods ---
    public function indexRevenues()
    {
        $user_id = Auth::user()->id;
        $revenues = RevenuesExpenses::where('created_by', $user_id)
            ->where('type', 'income')
            ->with('entity')
            ->latest('date')
            ->get();
        return view('revenues.index', compact('revenues'));
    }

    public function createRevenue()
    {
        $entities = Auth::user()->entities;
        return view('revenues.create', compact('entities'));
    }

    public function storeRevenue(Request $request)
    {
        $this->storeTransaction($request, 'income');
        return redirect()->route('revenues.index')->with('success', 'تم إضافة الإيراد بنجاح');
    }

    public function editRevenue($id)
    {
        $revenue = $this->authorizeTransaction($id);
        $entities = Auth::user()->entities;
        return view('revenues.edit', compact('revenue', 'entities'));
    }

    public function updateRevenue(Request $request, $id)
    {
        $this->updateTransaction($request, $id, 'income');
        return redirect()->route('revenues.index')->with('success', 'تم تحديث الإيراد بنجاح');
    }

    public function destroyRevenue($id)
    {
        $this->destroyTransaction($id);
        return redirect()->route('revenues.index')->with('success', 'تم حذف الإيراد بنجاح');
    }

    // --- Expenses Methods ---
    public function indexExpenses()
    {
        $user_id = Auth::user()->id;
        $expenses = RevenuesExpenses::where('created_by', $user_id)
            ->where('type', 'expense')
            ->with('entity')
            ->latest('date')
            ->get();
        return view('expenses.index', compact('expenses'));
    }

    public function createExpense()
    {
        $entities = Auth::user()->entities;
        return view('expenses.create', compact('entities'));
    }

    public function storeExpense(Request $request)
    {
        $this->storeTransaction($request, 'expense');
        return redirect()->route('expenses.index')->with('success', 'تم إضافة المصروف بنجاح');
    }

    public function editExpense($id)
    {
        $expense = $this->authorizeTransaction($id);
        $entities = Auth::user()->entities;
        return view('expenses.edit', compact('expense', 'entities'));
    }

    public function updateExpense(Request $request, $id)
    {
        $this->updateTransaction($request, $id, 'expense');
        return redirect()->route('expenses.index')->with('success', 'تم تحديث المصروف بنجاح');
    }

    public function destroyExpense($id)
    {
        $this->destroyTransaction($id);
        return redirect()->route('expenses.index')->with('success', 'تم حذف المصروف بنجاح');
    }

    // --- Shared Logic ---

    private function storeTransaction(Request $request, $type)
    {
        $user_id = Auth::user()->id;
        $data = $request->validate([
            'entity_id' => 'required|exists:entities,id',
            'amount' => 'required|numeric',
            'description' => 'nullable|string',
            'date' => 'required|date',
        ]);
        $data['type'] = $type;
        $data['created_by'] = $user_id;
        RevenuesExpenses::create($data);
    }

    private function updateTransaction(Request $request, $id, $type)
    {
        $transaction = $this->authorizeTransaction($id);
        $data = $request->validate([
            'entity_id' => 'required|exists:entities,id',
            'amount' => 'required|numeric',
            'description' => 'nullable|string',
            'date' => 'required|date',
        ]);
        // Type cannot be changed easily without affecting cashbox logic, so we keep it
        $transaction->update($data);
    }

    private function destroyTransaction($id)
    {
        $transaction = $this->authorizeTransaction($id);
        $transaction->delete();
    }

    private function authorizeTransaction($id)
    {
        $user_id = Auth::user()->id;
        $transaction = RevenuesExpenses::findOrFail($id);
        if ($transaction->created_by !== $user_id) {
            abort(403);
        }
        return $transaction;
    }


    public function show($id) {
        $user_id = Auth::user()->id;
        $revenuesExpenses = RevenuesExpenses::findOrFail($id);
        if($revenuesExpenses->created_by !== $user_id) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }else {
            return response()->json($revenuesExpenses);
        }
    }

    public function incomeSearch(Request $request)
    {
        $query = RevenuesExpenses::query()->where('type', 'income');

        // البحث في وصف العملية + اسم العامل/المشروع + المبلغ + التاريخ
        if ($request->filled('keyword')) {
            $keyword = $request->keyword;

            $query->where(function($q) use ($keyword) {
                $q->where('description', 'like', "%$keyword%")
                ->orWhere('amount', 'like', "%$keyword%")
                ->orWhere('date', 'like', "%$keyword%")
                ->orWhereHas('entity', function($qe) use ($keyword) {
                    $qe->where('name', 'like', "%$keyword%");
                });
            });
        }

        $results = $query->with('entity')->orderBy('date', 'desc')->get();

        return response()->json($results);
    }

    public function expenseSearch(Request $request)
    {
        $query = RevenuesExpenses::query()->where('type', 'expense');

        // البحث في وصف العملية + اسم العامل/المشروع + المبلغ + التاريخ
        if ($request->filled('keyword')) {
            $keyword = $request->keyword;

            $query->where(function($q) use ($keyword) {
                $q->where('description', 'like', "%$keyword%")
                ->orWhere('amount', 'like', "%$keyword%")
                ->orWhere('date', 'like', "%$keyword%")
                ->orWhereHas('entity', function($qe) use ($keyword) {
                    $qe->where('name', 'like', "%$keyword%");
                });
            });
        }

        $results = $query->with('entity')->orderBy('date', 'desc')->get();

        return response()->json($results);
    }

    public function getIncomes()
    {
        $user_id = Auth::user()->id;
        $revenuesExpenses = RevenuesExpenses::where('created_by', $user_id)
            ->where('type', 'income')
            ->get();
        return response()->json($revenuesExpenses);
    }

    public function getExpenses()
    {
        $user_id = Auth::user()->id;
        $revenuesExpenses = RevenuesExpenses::where('created_by', $user_id)
            ->where('type', 'expense')
            ->get();
        return response()->json($revenuesExpenses);
    }
}
