<x-app-layout title="إضافة قيد محاسبي جديد">
    <div class="mb-8">
        <h2 class="text-2xl font-bold text-gray-800">إضافة قيد محاسبي جديد</h2>
        <div class="text-sm text-gray-500">الرئيسية / القيود اليومية / إضافة</div>
    </div>

    <div class="bg-white rounded-xl shadow-sm p-6 max-w-2xl mx-auto">
        <form action="{{ route('journal-entries.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label for="date" class="block text-sm font-medium text-gray-700 mb-1">التاريخ</label>
                <input type="date" name="date" id="date" value="{{ date('Y-m-d') }}" class="w-full rounded-lg border-gray-300 focus:border-purple-500 focus:ring-purple-500" required>
            </div>

            <div class="grid grid-cols-2 gap-4 mb-4">
                <div>
                    <label for="debit_entity_id" class="block text-sm font-medium text-gray-700 mb-1">من حساب (مدين)</label>
                    <select name="debit_entity_id" id="debit_entity_id" class="w-full rounded-lg border-gray-300 focus:border-purple-500 focus:ring-purple-500" required>
                        <option value="">اختر الحساب...</option>
                        @foreach($entities as $entity)
                            <option value="{{ $entity->id }}">{{ $entity->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="credit_entity_id" class="block text-sm font-medium text-gray-700 mb-1">إلى حساب (دائن)</label>
                    <select name="credit_entity_id" id="credit_entity_id" class="w-full rounded-lg border-gray-300 focus:border-purple-500 focus:ring-purple-500" required>
                        <option value="">اختر الحساب...</option>
                        @foreach($entities as $entity)
                            <option value="{{ $entity->id }}">{{ $entity->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="mb-4">
                <label for="amount" class="block text-sm font-medium text-gray-700 mb-1">المبلغ</label>
                <input type="number" step="0.01" name="amount" id="amount" class="w-full rounded-lg border-gray-300 focus:border-purple-500 focus:ring-purple-500" required>
            </div>

            <div class="mb-6">
                <label for="description" class="block text-sm font-medium text-gray-700 mb-1">البيان (الوصف)</label>
                <textarea name="description" id="description" rows="3" class="w-full rounded-lg border-gray-300 focus:border-purple-500 focus:ring-purple-500"></textarea>
            </div>

            <div class="flex justify-end">
                <a href="{{ route('journal-entries.index') }}" class="bg-gray-100 text-gray-700 px-4 py-2 rounded-lg ml-2 hover:bg-gray-200 transition-colors">إلغاء</a>
                <button type="submit" class="bg-purple-600 text-white px-4 py-2 rounded-lg hover:bg-purple-700 transition-colors">حفظ</button>
            </div>
        </form>
    </div>
</x-app-layout>
