<?php

namespace App\Modules\Reference\Http\Requests\GraduationRequest;

use Illuminate\Foundation\Http\FormRequest;

class StoreGraduationRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            // aturan validasi untuk tabel graduations
        ];
    }
}
