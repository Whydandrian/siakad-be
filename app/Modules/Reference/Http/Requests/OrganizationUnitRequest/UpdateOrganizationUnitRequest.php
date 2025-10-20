<?php

namespace App\Modules\Reference\Http\Requests\OrganizationUnitRequest;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOrganizationUnitRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            // aturan validasi untuk tabel organization_units
        ];
    }
}
