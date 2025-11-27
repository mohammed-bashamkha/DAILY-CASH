@extends('layouts.app')

@section('content')
    <div class="mb-6 flex justify-between items-center">
        <h2 class="text-2xl font-bold text-gray-800">لوحة التحكم المالية</h2>
        <div class="text-sm text-gray-500">الرئيسية / لوحة التحكم</div>
    </div>

    <!-- Stats Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-4">
        <!-- Cashbox Balance -->
        <div class="bg-white rounded-xl shadow-sm p-6 flex items-center justify-between border-r-4 border-blue-500">
            <div>
                <p class="text-sm text-gray-500 font-medium mb-1">رصيد الصندوق</p>
                <h3 class="text-2xl font-bold text-gray-800" dir="ltr">${{ number_format($cashbox->balance ?? 0, 2) }}</h3>
            </div>
            <div class="bg-blue-100 p-3 rounded-full text-blue-600">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>
        </div>

        <!-- Total Income -->
        <div class="bg-white rounded-xl shadow-sm p-6 flex items-center justify-between border-r-4 border-green-500">
            <div>
                <p class="text-sm text-gray-500 font-medium mb-1">إجمالي الإيرادات</p>
                <h3 class="text-2xl font-bold text-gray-800" dir="ltr">${{ number_format($cashbox->total_income ?? 0, 2) }}</h3>
            </div>
            <div class="bg-green-100 p-3 rounded-full text-green-600">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 11l5-5m0 0l5 5m-5-5v12"></path>
                </svg>
            </div>
        </div>

        <!-- Total Expenses -->
        <div class="bg-white rounded-xl shadow-sm p-6 flex items-center justify-between border-r-4 border-red-500">
            <div>
                <p class="text-sm text-gray-500 font-medium mb-1">إجمالي المصروفات</p>
                <h3 class="text-2xl font-bold text-gray-800" dir="ltr">${{ number_format($cashbox->total_expense ?? 0, 2) }}</h3>
            </div>
            <div class="bg-red-100 p-3 rounded-full text-red-600">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 13l-5 5m0 0l-5-5m5 5V6"></path>
                </svg>
            </div>
        </div>

        <!-- Net Profit -->
        <div class="bg-white rounded-xl shadow-sm p-6 flex items-center justify-between border-r-4 border-yellow-500">
            <div>
                <p class="text-sm text-gray-500 font-medium mb-1">صافي الربح</p>
                <h3 class="text-2xl font-bold text-gray-800" dir="ltr">
                    ${{ number_format(($cashbox->total_income ?? 0) - ($cashbox->total_expense ?? 0), 2) }}
                </h3>
            </div>
            <div class="bg-yellow-100 p-3 rounded-full text-yellow-600">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                </svg>
            </div>
        </div>
    </div>
    <!-- Stats Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-4 mb-4">
        <!-- Total Workers -->
        <div class="bg-white rounded-xl shadow-sm p-6 flex items-center justify-between border-r-4 border-blue-500">
            <div>
                <p class="text-sm text-gray-500 font-medium mb-1">عدد العمال</p>
                <h3 class="text-2xl font-bold text-gray-800" dir="ltr">{{ $totalWorkers ?? 0 }}</h3>
            </div>
            <div class="bg-blue-100 p-3 rounded-full text-blue-600">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>
        </div>

        <!-- Total Projects -->
        <div class="bg-white rounded-xl shadow-sm p-6 flex items-center justify-between border-r-4 border-yellow-500">
            <div>
                <p class="text-sm text-gray-500 font-medium mb-1">عددالمشاريع</p>
                <h3 class="text-2xl font-bold text-gray-800" dir="ltr">
                    {{ $totalProjects ?? 0 }}
                </h3>
            </div>
            <div class="bg-yellow-100 p-3 rounded-full text-yellow-600">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                </svg>
            </div>
        </div>
    </div>

    <!-- Content Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Recent Transactions -->
        <div class="lg:col-span-3 bg-white rounded-xl shadow-sm p-6">
            <h3 class="text-lg font-bold text-gray-800 mb-4">أحدث العمليات المالية</h3>
            <div class="overflow-x-auto">
                <table class="w-full text-right">
                    <thead>
                        <tr class="text-gray-500 border-b border-gray-100">
                            <th class="pb-3 font-medium text-sm">التاريخ</th>
                            <th class="pb-3 font-medium text-sm">الجهة / الكيان</th>
                            <th class="pb-3 font-medium text-sm">النوع</th>
                            <th class="pb-3 font-medium text-sm">المبلغ</th>
                            <th class="pb-3 font-medium text-sm">الوصف</th>
                        </tr>
                    </thead>
                    <tbody class="text-sm">
                        @forelse($recentTransactions as $transaction)
                            <tr class="border-b border-gray-50 last:border-0 hover:bg-gray-50 transition-colors">
                                <td class="py-3 text-gray-800">{{ $transaction->date }}</td>
                                <td class="py-3 text-gray-800">{{ $transaction->entity->name ?? 'غير محدد' }}</td>
                                <td class="py-3">
                                    <span class="px-2 py-1 rounded-full text-xs font-semibold {{ $transaction->type == 'income' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                        {{ $transaction->type == 'income' ? 'إيراد' : 'مصروف' }}
                                    </span>
                                </td>
                                <td class="py-3 font-bold {{ $transaction->type == 'income' ? 'text-green-600' : 'text-red-600' }}" dir="ltr">
                                    ${{ number_format($transaction->amount, 2) }}
                                </td>
                                <td class="py-3 text-gray-500">{{ Str::limit($transaction->description, 50) }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="py-4 text-center text-gray-500">لا توجد عمليات حديثة.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
