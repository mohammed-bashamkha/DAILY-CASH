<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RevenuesExpenses extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'date',
        'amount',
        'description',
        'entity_id',
        'created_by',
    ];

    /**
     * الكيان المرتبط (عامل أو مشروع)
     */
    public function entity()
    {
        return $this->belongsTo(Entity::class);
    }

    /**
     * المستخدم الذي أنشأ العملية
     */
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

     /**
     * 📦 عند إنشاء عملية جديدة (دخل أو صرف) يتم تحديث الخزينة تلقائيًا
     */
    protected static function booted()
{
    static::created(function ($record) {
        \App\Models\Cashbox::updateBalance($record->type, $record->amount, $record->created_by);
    });

    static::deleted(function ($record) {
        $userId = $record->created_by;
        if ($record->type === 'income') {
            \App\Models\Cashbox::updateBalance('expense', $record->amount, $userId);
        } else {
            \App\Models\Cashbox::updateBalance('income', $record->amount, $userId);
        }
    });
}

}
