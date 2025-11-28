<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditMyAccountRequest extends FormRequest
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
            'name' => 'sometimes|required|string|max:255',
            'email' => 'sometimes|required|email|string|max:255|unique:users,email,' . $this->user()->id,
            'password' => 'nullable|string|min:8',
            'profile_picture' => 'sometimes|nullable|image|max:4048',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'حقل الاسم مطلوب.',
            'name.string' => 'حقل الاسم يجب أن يكون نصاً.',
            'name.max' => 'حقل الاسم لا يجب أن يتجاوز 255 حرفاً.',
            'email.required' => 'حقل البريد الإلكتروني مطلوب.',
            'email.email' => 'يجب إدخال بريد إلكتروني صالح.',
            'email.string' => 'حقل البريد الإلكتروني يجب أن يكون نصاً.',
            'email.max' => 'حقل البريد الإلكتروني لا يجب أن يتجاوز 255 حرفاً.',
            'email.unique' => 'هذا البريد الإلكتروني مستخدم بالفعل.',
            'password.required' => 'حقل كلمة المرور مطلوب.',
            'password.string' => 'حقل كلمة المرور يجب أن يكون نصاً.',
            'password.min' => 'كلمة المرور يجب أن تكون على الأقل 8 أحرف.',
            'profile_picture.image' => 'يجب أن يكون ملف صورة صالح.',
            'profile_picture.max' => 'حجم ملف الصورة لا يجب أن يتجاوز 4 ميغابايت.',
        ];
    }   

    public function attributes(): array 
    {
        return [
            'name' => 'الاسم',
            'email' => 'البريد الاكتروني',
            'password' => 'كلمة السر',
            'profile_picture' => 'صورة الملف الشخصي',
        ];
    }
}
