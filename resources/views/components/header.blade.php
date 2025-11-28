<header class="bg-white shadow-sm h-16 flex items-center justify-between px-6 sticky top-0 z-40">
    <!-- Search Bar -->
    <div class="flex items-center bg-gray-100 rounded-lg px-4 py-2 w-96">
        <svg class="w-5 h-5 text-gray-500 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
        </svg>
        <input type="text" placeholder="بحث..."
            class="bg-transparent border-none focus:ring-0 text-sm w-full text-gray-700 placeholder-gray-500 text-right">
    </div>

    <!-- Right Actions (Left in RTL) -->
    <div class="flex items-center space-x-6 space-x-reverse">
        <!-- Notification -->
        {{-- <button class="relative text-gray-500 hover:text-gray-700">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path>
            </svg>
            <span class="absolute top-0 right-0 block h-2 w-2 rounded-full bg-red-500 ring-2 ring-white"></span>
        </button> --}}

        <!-- User Profile -->
        <div class="flex items-center">
            <img 
            src="{{ Auth::user()->profile_picture 
                ? asset('storage/' . Auth::user()->profile_picture) 
                : 'https://ui-avatars.com/api/?name=' . urlencode(Auth::user()->name) . '&background=3b82f6&color=fff' }}"
            alt="User"
            class="w-10 h-10 rounded-full ml-3 object-cover">
            <div class="text-right ml-3">
                <p class="text-sm font-medium text-gray-700"><a href="{{ route('account.show') }}">{{ Auth::user()->name }}</a></p>
                <p class="text-xs text-gray-500">{{ Auth::user()->email }}</p>
            </div>
            <form action="{{ route('logout') }}" method="POST" class="inline">
                @csrf
                <button type="submit"
                    class="text-red-600 hover:text-red-700 text-sm font-medium px-3 py-1 rounded hover:bg-red-50 transition-colors">
                    تسجيل الخروج
                </button>
            </form>
        </div>
    </div>
</header>
