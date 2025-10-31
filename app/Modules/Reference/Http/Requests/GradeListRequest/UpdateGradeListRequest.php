<?php

namespace App\Modules\Reference\Http\Requests\GradeListRequest;

use Illuminate\Foundation\Http\FormRequest;

class UpdateGradeListRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            // aturan validasi untuk tabel grade_lists
        ];
    }
}
