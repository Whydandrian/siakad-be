<?php

namespace App\Modules\Reference\Http\Requests\SemesterTypeRequest;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSemesterTypeRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            // aturan validasi untuk tabel semester_types
        ];
    }
}
