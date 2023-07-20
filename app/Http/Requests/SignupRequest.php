<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SignupRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'role' => 'required',
            'name' => 'required',
            'email' => 'required|unique:' .$this->getTableForRole() .',email',
            'phone' => 'required',
            'password' => 'required|min:6|confirmed',
            'about' => 'required',
            'address' => 'required'
        ];
    }

    public function messages(): array
    {
        return [
            'role.required' => 'Please Select the role.',
            'name.required' => 'Please enter the name.',
            'email.required' => 'Please enter the email.',
            'phone.required' => 'Please enter the phone.',
            'password.required' => 'Please enter the password.',
            'password.confirmed' => 'Password not match.',
            'about.required' => 'Please enter the about yourself detail.',
            'address.required' => 'Please enter the address.',
        ];
    }

    protected function getTableForRole()
    {
        $role = $this->input('role');

        // Map the role to the respective table name
        $tableNames = [
            'admin' => 'admins',
            'buyer' => 'buyers',
            'dealer' => 'dealers',
            'seller' => 'sellers',
        ];

        return $tableNames[$role] ?? null;
    }
}
