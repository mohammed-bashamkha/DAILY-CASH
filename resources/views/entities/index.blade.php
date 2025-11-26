@extends('layouts.app')

@section('content')
    <div class="mb-8 flex justify-between items-center">
        <div>
            <h2 class="text-2xl font-bold text-gray-800">الكيانات (العمال / المشاريع)</h2>
            <div class="text-sm text-gray-500">الرئيسية / الكيانات</div>
        </div>
        <a href="{{ route('entities.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg flex items-center transition-colors">
            <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
            </svg>
            إضافة كيان جديد
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif

    <div class="bg-white rounded-xl shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-right">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">الاسم</th>
                        <th class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">النوع</th>
                        <th class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">رقم الهاتف</th>
                        <th class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">ملاحظات</th>
                        <th class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">الإجراءات</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($entities as $entity)
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $entity->name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full {{ $entity->type === 'worker' ? 'bg-purple-100 text-purple-800' : 'bg-indigo-100 text-indigo-800' }}">
                                    {{ $entity->type === 'worker' ? 'عامل' : 'مشروع' }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500" dir="ltr">{{ $entity->phone ?? '-' }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ Str::limit($entity->notes, 30) }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <a href="{{ route('entities.edit', $entity->id) }}" class="text-blue-600 hover:text-blue-900 ml-3">تعديل</a>
                                <form action="{{ route('entities.destroy', $entity->id) }}" method="POST" class="inline-block" onsubmit="return confirm('هل أنت متأكد من الحذف؟');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900">حذف</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-4 text-center text-gray-500">لا توجد كيانات مضافة حالياً.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
