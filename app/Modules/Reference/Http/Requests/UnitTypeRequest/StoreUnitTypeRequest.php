<?php

namespace App\Modules\Reference\Http\Requests\UnitTypeRequest;

use Illuminate\Foundation\Http\FormRequest;

class StoreUnitTypeRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            // aturan validasi untuk tabel unit_types
        ];
    }
}
