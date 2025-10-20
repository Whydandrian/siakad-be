<?php

namespace App\Modules\Reference\Http\Requests\StatusRequest;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStatusRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'status_type_id' => 'required|exists:status_types,id',
            'name' => 'required|array',
            'name.en' => 'required|string|max:100',
            'name.id' => 'required|string|max:100',
        ];
    }
}
