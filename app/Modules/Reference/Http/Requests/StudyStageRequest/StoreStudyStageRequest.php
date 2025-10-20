<?php

namespace App\Modules\Reference\Http\Requests\StudyStageRequest;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudyStageRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            // aturan validasi untuk tabel study_stages
        ];
    }
}
