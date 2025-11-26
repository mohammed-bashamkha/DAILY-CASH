@extends('layouts.app')

@section('content')
    <div class="mb-8">
        <h2 class="text-2xl font-bold text-gray-800">تعديل الكيان</h2>
        <div class="text-sm text-gray-500">الرئيسية / الكيانات / تعديل</div>
    </div>

    <div class="bg-white rounded-xl shadow-sm p-6 max-w-2xl mx-auto">
        <form action="{{ route('entities.update', $entity->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">الاسم</label>
                <input type="text" name="name" id="name" value="{{ $entity->name }}" class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500" required>
            </div>

            <div class="mb-4">
                <label for="type" class="block text-sm font-medium text-gray-700 mb-1">النوع</label>
                <select name="type" id="type" class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500">
                    <option value="worker" {{ $entity->type == 'worker' ? 'selected' : '' }}>عامل</option>
                    <option value="project" {{ $entity->type == 'project' ? 'selected' : '' }}>مشروع</option>
                </select>
            </div>

            <div class="mb-4">
                <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">رقم الهاتف</label>
                <input type="text" name="phone" id="phone" value="{{ $entity->phone }}" class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500">
            </div>

            <div class="mb-6">
                <label for="notes" class="block text-sm font-medium text-gray-700 mb-1">ملاحظات</label>
                <textarea name="notes" id="notes" rows="3" class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500">{{ $entity->notes }}</textarea>
            </div>

            <div class="flex justify-end">
                <a href="{{ route('entities.index') }}" class="bg-gray-100 text-gray-700 px-4 py-2 rounded-lg ml-2 hover:bg-gray-200 transition-colors">إلغاء</a>
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors">تحديث</button>
            </div>
        </form>
    </div>
@endsection
