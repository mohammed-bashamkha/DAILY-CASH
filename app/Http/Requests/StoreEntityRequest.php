<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEntityRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'type' => 'required|in:worker,project',
            'phone' => 'nullable|string|regex:/^[0-9]{9,15}$/|unique:entities,phone',
            'notes' => 'nullable|string',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'حقل الاسم مطلوب.',
            'phone.regex' => 'رقم الهاتف يجب أن يحتوي على أرقام فقط ويتراوح بين 9 إلى 15 رقمًا.',
            'phone.unique' => 'رقم الهاتف هذا مستخدم بالفعل من قبل كيان آخر.',
        ];
    } 
    
    public function attributes(): array
    {
        return [
            'name' => 'الاسم',
            'type' => 'النوع',
            'phone' => 'رقم الهاتف',
            'notes' => 'ملاحظات',
        ];
    }   
}
