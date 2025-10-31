<?php

namespace App\Modules\Reference\Http\Requests\AdmissionPathwayRequest;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAdmissionPathwayRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            // aturan validasi untuk tabel admission_pathways
        ];
    }
}
