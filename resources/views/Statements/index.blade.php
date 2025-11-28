<x-app-layout title="الكشوفات">
    <div class="mb-8">
        <h2 class="text-2xl font-bold text-gray-800">الكشوفات</h2>
        <div class="text-sm text-gray-500">الرئيسية / الكشوفات</div>
    </div>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif

    <!-- Statements Options -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

        <!-- Entity Statements -->
        <a href="{{ route('statements.entities.form') }}"
           class="bg-white shadow-sm rounded-xl p-6 border-t-4 border-blue-500 hover:shadow-md transition-all">
            <div class="flex items-center mb-3">
                <svg class="w-8 h-8 text-blue-600 ml-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M7 3h8l4 4v14a2 2 0 01-2 2H7a2 2 0 01-2-2V5a2 2 0 012-2z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M9 12h6M9 16h6M9 8h3"/>
                </svg>
                <h3 class="text-xl font-bold text-gray-800">كشف حساب للكيانات</h3>
            </div>
            <p class="text-gray-600">
                إنشاء كشف حساب شامل للكيان مع عرض العمليات والإجماليات.
            </p>
        </a>

        <!-- Accounting Entries Statements -->
        <a href="{{ route('journal.statement.form') }}"
           class="bg-white shadow-sm rounded-xl p-6 border-t-4 border-green-500 hover:shadow-md transition-all">
            <div class="flex items-center mb-3">
                <svg class="w-8 h-8 text-green-600 ml-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M4 6h16M4 12h16M4 18h7"/>
                </svg>
                <h3 class="text-xl font-bold text-gray-800">كشف حساب للقيود المحاسبية</h3>
            </div>
            <p class="text-gray-600">
                عرض قيود اليومية مع التواريخ والتفاصيل والإجماليات.
            </p>
        </a>

    </div>
</x-app-layout>