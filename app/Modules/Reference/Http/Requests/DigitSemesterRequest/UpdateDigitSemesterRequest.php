<?php

namespace App\Modules\Reference\Http\Requests\DigitSemesterRequest;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDigitSemesterRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            // aturan validasi untuk tabel digit_semesters
        ];
    }
}
