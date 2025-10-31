<?php

namespace App\Modules\Reference\Http\Requests\AcademicYearRequest;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAcademicYearRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            // aturan validasi untuk tabel academic_years
        ];
    }
}
