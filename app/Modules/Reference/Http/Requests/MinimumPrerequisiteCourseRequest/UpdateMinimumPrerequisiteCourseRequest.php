<?php

namespace App\Modules\Reference\Http\Requests\MinimumPrerequisiteCourseRequest;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMinimumPrerequisiteCourseRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            // aturan validasi untuk tabel minimum_prerequisite_courses
        ];
    }
}
