<x-app-layout title="تعديل المصروف">
    <div class="mb-8">
        <h2 class="text-2xl font-bold text-gray-800">تعديل المصروف</h2>
        <div class="text-sm text-gray-500">الرئيسية / المصروفات / تعديل</div>
    </div>

    <div class="bg-white rounded-xl shadow-sm p-6 max-w-2xl mx-auto">
        <form action="{{ route('expenses.update', $expense->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="date" class="block text-sm font-medium text-gray-700 mb-1">التاريخ</label>
                <input type="date" name="date" id="date" value="{{ $expense->date }}" class="w-full rounded-lg border-gray-300 focus:border-red-500 focus:ring-red-500" required>
            </div>

            <div class="mb-4">
                <label for="entity_id" class="block text-sm font-medium text-gray-700 mb-1">الجهة / الكيان</label>
                <select name="entity_id" id="entity_id" class="w-full rounded-lg border-gray-300 focus:border-red-500 focus:ring-red-500" required>
                    <option value="">اختر الكيان...</option>
                    @foreach($entities as $entity)
                        <option value="{{ $entity->id }}" {{ $expense->entity_id == $entity->id ? 'selected' : '' }}>{{ $entity->name }} ({{ $entity->type == 'worker' ? 'عامل' : 'مشروع' }})</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="amount" class="block text-sm font-medium text-gray-700 mb-1">المبلغ</label>
                <input type="number" step="0.01" name="amount" id="amount" value="{{ $expense->amount }}" class="w-full rounded-lg border-gray-300 focus:border-red-500 focus:ring-red-500" required>
            </div>

            <div class="mb-6">
                <label for="description" class="block text-sm font-medium text-gray-700 mb-1">الوصف</label>
                <textarea name="description" id="description" rows="3" class="w-full rounded-lg border-gray-300 focus:border-red-500 focus:ring-red-500">{{ $expense->description }}</textarea>
            </div>

            <div class="flex justify-end">
                <a href="{{ route('expenses.index') }}" class="bg-gray-100 text-gray-700 px-4 py-2 rounded-lg ml-2 hover:bg-gray-200 transition-colors">إلغاء</a>
                <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition-colors">تحديث</button>
            </div>
        </form>
    </div>
</x-app-layout>
