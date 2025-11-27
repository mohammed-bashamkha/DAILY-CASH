<aside class="w-64 bg-[#1e1e2d] text-white fixed right-0 h-full flex flex-col shadow-lg z-50">
    <!-- Logo -->
    <div class="h-16 flex items-center justify-center border-b border-gray-700">
        <h1 class="text-2xl font-bold tracking-wider">DAILY-CASH</h1>
    </div>

    <!-- Navigation -->
    <nav class="flex-1 overflow-y-auto py-4">
        <ul class="space-y-1">
            <li>
                <a href="{{ route('dashboard') }}" class="flex items-center px-6 py-3 hover:bg-[#2b2b40] transition-colors {{ request()->routeIs('dashboard') ? 'bg-blue-600 border-l-4 border-blue-400' : '' }}">
                    <svg class="w-5 h-5 ml-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path>
                    </svg>
                    لوحة التحكم
                </a>
            </li>
            
            <!-- Entities (Workers/Projects) -->
            <li>
                <a href="{{ route('entities.index') }}" class="flex items-center px-6 py-3 hover:bg-[#2b2b40] transition-colors {{ request()->routeIs('entities.*') ? 'bg-blue-600 border-l-4 border-blue-400' : 'text-gray-300 hover:text-white' }}">
                    <svg class="w-5 h-5 ml-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>
                    (العمال / المشاريع)
                </a>
            </li>

            <!-- Revenues -->
            <li>
                <a href="{{-- route('revenues.index') --}}" class="flex items-center px-6 py-3 hover:bg-[#2b2b40] transition-colors {{ request()->routeIs('revenues.*') ? 'bg-blue-600 border-l-4 border-blue-400' : 'text-gray-300 hover:text-white' }}">
                    <svg class="w-5 h-5 ml-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    الإيرادات
                </a>
            </li>

            <!-- Expenses -->
            <li>
                <a href="{{-- route('expenses.index') --}}" class="flex items-center px-6 py-3 hover:bg-[#2b2b40] transition-colors {{ request()->routeIs('expenses.*') ? 'bg-blue-600 border-l-4 border-blue-400' : 'text-gray-300 hover:text-white' }}">
                    <svg class="w-5 h-5 ml-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    المصروفات
                </a>
            </li>

            <!-- Journal Entries -->
            <li>
                <a href="{{ route('journal-entries.index') }}" class="flex items-center px-6 py-3 hover:bg-[#2b2b40] transition-colors {{ request()->routeIs('journal-entries.*') ? 'bg-blue-600 border-l-4 border-blue-400' : 'text-gray-300 hover:text-white' }}">
                    <svg class="w-5 h-5 ml-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                    القيود اليومية
                </a>
            </li>

            <!-- Cashbox -->
             <li>
                <a href="{{-- route('cashbox.index') --}}" class="flex items-center px-6 py-3 hover:bg-[#2b2b40] transition-colors {{ request()->routeIs('cashbox.*') ? 'bg-blue-600 border-l-4 border-blue-400' : 'text-gray-300 hover:text-white' }}">
                    <svg class="w-5 h-5 ml-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path>
                    </svg>
                    الصندوق
                </a>
            </li>
        </ul>
    </nav>
</aside>
