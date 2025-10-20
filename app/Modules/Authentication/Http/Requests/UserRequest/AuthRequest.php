<?php

namespace App\Modules\Authentication\Http\Requests\UserRequest;

use Illuminate\Foundation\Http\FormRequest;

class AuthRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'username' =>
                [
                    'required',
                    'string',
                    'min:3',
                    'max:50',
                    'regex:/^[a-zA-Z0-9_]+$/',
                    'not_regex:/^[^@]*@[^@]*$/',
                ],
            'password' => 'required|string|min:6',
        ];
    }

    /**
     * Custom error messages
     */
    public function messages(): array
    {
        return [
            'username.required' => 'Username wajib diisi',
            'username.min' => 'Username minimal 3 karakter',
            'username.max' => 'Username maksimal 50 karakter',
            'username.regex' => 'Username hanya boleh mengandung huruf, angka, dan underscore (_)',
            'username.not_regex' => 'Username tidak boleh menggunakan format email. Gunakan NIP (staf/dosen) / NIM (Mahasiswa).',
            'password.required' => 'Password wajib diisi',
            'password.min' => 'Password minimal 6 karakter',
        ];
    }

    /**
     * Custom attribute names
     */
    public function attributes(): array
    {
        return [
            'username' => 'username',
            'password' => 'password',
        ];
    }
}
