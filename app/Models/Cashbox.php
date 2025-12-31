<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cashbox extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'total_income',
        'total_expense',
        'balance',
    ];

    /**
     * تحديث الرصيد بناءً على نوع العملية
     */
    public static function updateBalance($type, $amount,$userId)
    {
        $cashbox = self::where('user_id', $userId)->first();

        // إذا لم يوجد صندوق، إنشئه
        if (!$cashbox) {
            $cashbox = self::create([
                'user_id' => $userId,
                'total_income' => 0,
                'total_expense' => 0,
                'balance' => 0,
            ]);
        }

        if ($type === 'income') {
            $cashbox->increment('total_income', $amount);
        } else {
            $cashbox->increment('total_expense', $amount);
        }

        $cashbox->balance = $cashbox->total_income - $cashbox->total_expense;
        $cashbox->save();
    }
    public function user() {
       return $this->belongsTo(User::class, 'user_id');
    }
}
