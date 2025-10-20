<?php

namespace App\Modules\Reference\Http\Requests\CohortYearRequest;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCohortYearRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            // aturan validasi untuk tabel cohort_years
        ];
    }
}
