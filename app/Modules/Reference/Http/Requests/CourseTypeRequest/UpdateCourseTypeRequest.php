<?php

namespace App\Modules\Reference\Http\Requests\CourseTypeRequest;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCourseTypeRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|array',
            'name.en' => 'required|string',
            'name.id' => 'required|string',
            'note' => 'nullable|string',
        ];
    }
}
