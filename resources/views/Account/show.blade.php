<x-app-layout title="حسابي">
    <div class="max-w-3xl mx-auto">

    <!-- العنوان -->
    <div class="mb-8">
        <h2 class="text-2xl font-bold text-gray-800">حسابي</h2>
        <p class="text-sm text-gray-500">الصفحة الشخصية للمستخدم</p>
    </div>

     <!-- رسالة نجاح -->
    @if (session('seccuss'))
        <div class="mb-4 p-3 rounded-lg bg-green-100 text-green-700">
            {{ session('seccuss') }}
        </div>
    @endif

    <!-- رسالة خطأ -->
    @if (session('error'))
        <div class="mb-4 p-3 rounded-lg bg-red-100 text-red-700">
            {{ session('error') }}
        </div>
    @endif

    <!-- البطاقة -->
    <div class="bg-white shadow-sm rounded-xl p-6">
        <div class="flex items-center gap-6">

            <!-- صورة البروفايل -->
            <div>
                @if($user->profile_picture)
                    <img src="{{ asset('storage/' . $user->profile_picture) }}"
                         class="w-32 h-32 rounded-full object-cover border">
                @else
                    <div class="w-32 h-32 rounded-full bg-gray-200 text-gray-500 flex items-center justify-center">
                        لايوجد صورة
                    </div>
                @endif
            </div>

            <!-- معلومات المستخدم -->
            <div class="flex-1">
                <h3 class="text-xl font-semibold text-gray-800">{{ $user->name }}</h3>
                <p class="text-gray-600 mt-1">{{ $user->email }}</p>

                <!-- حالة التحقق -->
                <div class="mt-3">
                        <span class="px-3 py-1 bg-green-100 text-green-700 rounded-full text-sm">
                            البريد مفعل
                        </span>
                </div>

                <!-- الدور -->
                <div class="mt-3">
                    <span class="px-3 py-1 bg-blue-100 text-blue-700 rounded-full text-sm">
                     حساب شخصي
                    </span>
                </div>
            </div>
        </div>

        <!-- زر تعديل -->
        <div class="mt-6">
            <a href="{{ route('account.edit') }}"
               class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg">
                تعديل الملف الشخصي
            </a>
        </div>
    </div>

</div>
</x-app-layout>
