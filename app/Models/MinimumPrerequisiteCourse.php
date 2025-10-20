<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 *   schema="MinimumPrerequisiteCourse",
 *   @OA\Property(property="id", type="integer", example=1),
 *   @OA\Property(
 *     property="name",
 *     type="object",
 *     @OA\Property(property="en", type="string", example="Odd"),
 *     @OA\Property(property="id", type="string", example="Gasal")
 *   ),
 * )
 *
 * @OA\Schema(
 *   schema="MinimumPrerequisiteCourseResponse",
 *   @OA\Property(property="status", type="string", example="success"),
 *   @OA\Property(property="message", type="string", example="Minimum prerequisite course detail"),
 *   @OA\Property(property="data", ref="#/components/schemas/MinimumPrerequisiteCourse")
 * )
 *
 * @OA\Schema(
 *   schema="MinimumPrerequisiteCourseListResponse",
 *   @OA\Property(property="status", type="string", example="success"),
 *   @OA\Property(property="message", type="string", example="List of minimum prerequisite courses"),
 *   @OA\Property(
 *     property="data",
 *     type="array",
 *     @OA\Items(ref="#/components/schemas/MinimumPrerequisiteCourse")
 *   )
 * )
 */
class MinimumPrerequisiteCourse extends Model
{
    protected $table = 'minimum_prerequisite_courses';
    protected $fillable = ['name'];

    protected $casts = [
        'name' => 'array',
    ];
}
