<?php

namespace App\Modules\Reference\Http\Requests\OrganizationUnitHistoryRequest;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrganizationUnitHistoryRequest extends FormRequest
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
