<?php

namespace App\Modules\Reference\Http\Requests\OrganizationLevelRequest;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOrganizationLevelRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            // aturan validasi untuk tabel organization_levels
        ];
    }
}
