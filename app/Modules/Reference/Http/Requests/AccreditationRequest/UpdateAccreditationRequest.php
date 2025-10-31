<?php

namespace App\Modules\Reference\Http\Requests\AccreditationRequest;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAccreditationRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            // aturan validasi untuk tabel accreditations
        ];
    }
}
