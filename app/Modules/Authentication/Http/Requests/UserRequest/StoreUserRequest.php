<?php

namespace App\Modules\Authentication\Http\Requests\UserRequest;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
                        'name' => 'required|string',
            'email' => 'required|string',
            'email_verified_at' => 'nullable|string',
            'password' => 'required|string',
            'remember_token' => 'nullable|string'
        ];
    }
}
