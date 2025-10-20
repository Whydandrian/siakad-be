<?php

namespace App\Modules\Reference\Http\Requests\StatusTypeRequest;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStatusTypeRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|array',
            'name.en' => 'required|string|max:100',
            'name.id' => 'required|string|max:100',
        ];
    }
}
