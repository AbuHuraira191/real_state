<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'email' => [
                'required',
                'exists:'.$this->getTableForRole() .',email',
            ],
            'password' => [
                'required',
                'exists:'.$this->getTableForRole() .',password',
            ]
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Please enter the name',
            'email.required' => 'Please email.',
            'password.required' => 'Please password.',
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
