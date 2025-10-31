<?php

namespace App\Modules\Reference\Http\Requests\EducationLevelRequest;

use Illuminate\Foundation\Http\FormRequest;

class StoreEducationLevelRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            // aturan validasi untuk tabel education_levels
        ];
    }
}
