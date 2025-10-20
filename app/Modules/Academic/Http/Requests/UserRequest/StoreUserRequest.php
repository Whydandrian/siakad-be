<?php

namespace App\Modules\Academic\Http\Requests\UserRequest;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            // aturan validasi untuk tabel users
        ];
    }
}
