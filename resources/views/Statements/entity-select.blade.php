@extends('layouts.app')

@section('content')
    <div class="mb-8">
        <h2 class="text-2xl font-bold text-gray-800">كشف حساب للكيانات</h2>
        <div class="text-sm text-gray-500">الرئيسية / الكشوفات / كشف حساب كيان</div>
    </div>

    <div class="bg-white rounded-xl shadow-sm p-6 max-w-lg mx-auto">
        <h3 class="text-lg font-bold text-gray-800 mb-4">اختر الكيان لعمل كشف حساب</h3>

        <form action="" method="GET" id="entityForm">
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    الكيان
                </label>
                <select id="entitySelect"
                        class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500">
                    <option disabled selected>اختر الكيان...</option>
                    @foreach($entities as $entity)
                        <option value="{{ $entity->id }}">{{ $entity->name }}</option>
                    @endforeach
                </select>
            </div>

            <button type="button"
                    onclick="goToStatement()"
                    class="w-full bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
                إنشاء كشف حساب
            </button>
        </form>
    </div>

    <script>
        function goToStatement() {
            let id = document.getElementById('entitySelect').value;

            if (!id) {
                alert("الرجاء اختيار كيان أولاً");
                return;
            }

            // الانتقال لصفحة توليد الكشف
            window.location.href = "/statements/entity/" + id;
        }
    </script>
@endsection
