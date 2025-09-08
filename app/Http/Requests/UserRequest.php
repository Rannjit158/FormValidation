<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
     */
    public function rules(): array
    {
        return [
            'name' => 'required|alpha|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => [
                'required',
                'string',
                'min:8',
                'max:14',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&]).+$/'
            ],
            'age' => 'required|numeric|between:18,30',
        ];
    }

    /**
     * Custom messages for validation errors.
     */
    public function messages(): array
    {
        return [
            'name.required' => "Name is required",
            'name.alpha' => 'Name must be alphabetic',
            'email.required' => "Email is required",
            'email.email' => 'Email must be a valid email address',
            'email.unique' => 'Email has already been taken',
            'password.required' => 'Password is required',
            'password.min' => 'Password must be minimum 8 characters',
            'password.max' => 'Password must be maximum 14 characters',
            'password.regex' => 'Password must contain at least one uppercase letter, one lowercase letter, one digit, and one special character',
            'age.required' => 'Age is required',
            'age.numeric' => 'Age must be a number',
            'age.between' => 'Age must be between 18 and 30',
        ];
    }


    public function attributes(): array
    {
        return [
            'name' => 'Name',
            'email' => 'Email',
            'password' => 'Password',
            'age' => 'Age',
        ];
    }
}
