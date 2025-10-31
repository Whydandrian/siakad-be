<?php

namespace App\Modules\Reference\Http\Requests\GraduationPredicateRequest;

use Illuminate\Foundation\Http\FormRequest;

class UpdateGraduationPredicateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            // aturan validasi untuk tabel graduation_predicates
        ];
    }
}
