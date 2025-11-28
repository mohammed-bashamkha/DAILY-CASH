<x-app-layout title="من نحن">

<div class="max-w-3xl mx-auto">

    <!-- العنوان -->
    <div class="mb-8">
        <h2 class="text-3xl font-bold text-gray-800">عن المشروع</h2>
        <p class="text-gray-500 mt-2">نُبذة مختصرة عن الفكرة والفريق القائم عليها</p>
    </div>

    <!-- بطاقة المحتوى -->
    <div class="bg-white shadow-sm rounded-xl p-6 leading-relaxed text-gray-700">

        <!-- شرح المشروع -->
        <h3 class="text-xl font-semibold text-gray-800 mb-3">نبذة عن المشروع</h3>
        <p class="text-gray-600 mb-6">
            هذا المشروع تم تطويره بهدف توفير نظام متكامل لإدارة العمال والمشاريع
            بطريقة سهلة وسريعة، مع واجهة استخدام بسيطة وواضحة تسهّل عملية
            المتابعة وإدارة البيانات اليومية.
        </p>

        <!-- الفريق -->
        <h3 class="text-xl font-semibold text-gray-800 mb-3">فريق العمل</h3>

        <ul class="space-y-3">
            <li class="flex items-center gap-3">
                <div class="bg-blue-100 text-blue-600 p-2 rounded-full">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                              d="M5.121 17.804A4 4 0 0112 15a4 4 0 016.879 2.804M12
                                 11a4 4 0 100-8 4 4 0 000 8z" />
                    </svg>
                </div>
                <span class="text-gray-700 font-medium text-lg">محمد فائز باشامخه</span>
            </li>

            <li class="flex items-center gap-3">
                <div class="bg-green-100 text-green-600 p-2 rounded-full">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                              d="M5.121 17.804A4 4 0 0112 15a4 4 0 016.879 2.804M12
                                 11a4 4 0 100-8 4 4 0 000 8z" />
                    </svg>
                </div>
                <span class="text-gray-700 font-medium text-lg">عمر بوعيران</span>
            </li>
        </ul>

    </div>

</div>

</x-app-layout>
