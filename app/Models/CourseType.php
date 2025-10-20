<?php

namespace App\Models;

use App\Casts\TranslatableJson;
use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 *   schema="CourseType",
 *   @OA\Property(property="id", type="integer", example=1),
 *   @OA\Property(
 *     property="name",
 *     type="object",
 *     @OA\Property(property="en", type="string", example="Compulsory Course"),
 *     @OA\Property(property="id", type="string", example="Mata Kuliah Wajib")
 *   ),
 *   @OA\Property(property="note", type="string", example="Catatan tambahan")
 * )
 *
 * @OA\Schema(
 *   schema="CourseTypeResponse",
 *   @OA\Property(property="status", type="string", example="success"),
 *   @OA\Property(property="message", type="string", example="Course Type detail"),
 *   @OA\Property(property="data", ref="#/components/schemas/CourseType")
 * )
 *
 * @OA\Schema(
 *   schema="CourseTypeListResponse",
 *   @OA\Property(property="status", type="string", example="success"),
 *   @OA\Property(property="message", type="string", example="List of Course Types"),
 *   @OA\Property(
 *     property="data",
 *     type="array",
 *     @OA\Items(ref="#/components/schemas/CourseType")
 *   ),
 * )
 */
class CourseType extends Model
{
    protected $table = 'course_types';
    protected $fillable = ['name', 'note'];
    protected $casts = [
        'name' => 'array',
    ];
}   
