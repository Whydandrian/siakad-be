<?php

namespace App\Modules\Reference\Http\Requests\DigitSemesterRequest;

use Illuminate\Foundation\Http\FormRequest;

class StoreDigitSemesterRequest extends FormRequest
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
