<?php

namespace App\Modules\Reference\Http\Requests\OrganizationUnitHistoryRequest;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOrganizationUnitHistoryRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            // aturan validasi untuk tabel organization_unit_histories
        ];
    }
}
