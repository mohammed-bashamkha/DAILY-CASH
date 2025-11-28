<x-app-layout title="تعديل حسابي">
    <div class="max-w-3xl mx-auto">

    <!-- العنوان -->
    <div class="mb-8">
        <h2 class="text-2xl font-bold text-gray-800">تعديل حسابي</h2>
        <p class="text-sm text-gray-500">تحديث معلومات الحساب</p>
    </div>

    <!-- رسالة نجاح -->
    @if (session('seccuss'))
        <div class="mb-4 p-3 rounded-lg bg-green-100 text-green-700">
            {{ session('seccuss') }}
        </div>
    @endif

    <!-- البطاقة -->
    <div class="bg-white shadow-sm rounded-xl p-6">

        <form action="{{ route('account.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="flex items-center gap-6 mb-6">
                <!-- صورة البروفايل الحالية -->
                <div>
                    @if(auth()->user()->profile_picture)
                        <img src="{{ asset('storage/' . auth()->user()->profile_picture) }}"
                             class="w-32 h-32 rounded-full object-cover border">
                    @else
                        <div class="w-32 h-32 rounded-full bg-gray-200 flex items-center justify-center text-gray-500">
                            لا يوجد صورة
                        </div>
                    @endif
                </div>

                <!-- رفع صورة جديدة -->
                <div class="flex-1">
                    <label class="block font-semibold text-gray-700 mb-1">تغيير الصورة</label>
                    <input type="file" name="profile_picture"
                           class="block w-full border rounded-lg p-2">
                </div>
            </div>
            @error('profile_picture')<div class="text-red-600 text-sm mt-1">{{ $message }}</div>@enderror

            <!-- الاسم -->
            <div class="mb-4">
                <label class="block font-semibold text-gray-700 mb-1">الاسم</label>
                <input type="text" name="name" value="{{ auth()->user()->name }}"
                       class="w-full border rounded-lg p-3"
                       required>
            </div>
            @error('name')<div class="text-red-600 text-sm mt-1">{{ $message }}</div>@enderror

            <!-- الإيميل -->
            <div class="mb-4">
                <label class="block font-semibold text-gray-700 mb-1">الإيميل</label>
                <input type="email" name="email" value="{{ auth()->user()->email }}"
                       class="w-full border rounded-lg p-3"
                       required>
            </div>
            @error('email')<div class="text-red-600 text-sm mt-1">{{ $message }}</div>@enderror

            <!-- كلمة المرور -->
            <div class="mb-4">
                <label class="block font-semibold text-gray-700 mb-1">كلمة المرور الجديدة (اختياري)</label>
                <input type="password" name="password"
                       class="w-full border rounded-lg p-3"
                       placeholder="اتركه فارغاً إذا لا تريد تغييره">
            </div>
            @error('password')<div class="text-red-600 text-sm mt-1">{{ $message }}</div>@enderror

            <!-- زر الحفظ -->
            <div class="mt-6">
                <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg">
                    حفظ التعديل
                </button>
            </div>

        </form>
    </div>

</div>
</x-app-layout>
