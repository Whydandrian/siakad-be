<?php

namespace App\Modules\Authentication\Http\Requests\UserRequest;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
                        'name' => 'sometimes|required|string',
            'email' => 'sometimes|required|string',
            'email_verified_at' => 'sometimes|nullable|string',
            'password' => 'sometimes|required|string',
            'remember_token' => 'sometimes|nullable|string'
        ];
    }
}
