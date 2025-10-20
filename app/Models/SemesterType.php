<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 *   schema="SemesterType",
 *   @OA\Property(property="id", type="integer", example=1),
 *   @OA\Property(
 *     property="name",
 *     type="object",
 *     @OA\Property(property="en", type="string", example="Odd"),
 *     @OA\Property(property="id", type="string", example="Gasal")
 *   ),
 *   @OA\Property(property="code", type="string", example="Gs")
 * )
 *
 * @OA\Schema(
 *   schema="SemesterTypeResponse",
 *   @OA\Property(property="status", type="string", example="success"),
 *   @OA\Property(property="message", type="string", example="Semester type detail"),
 *   @OA\Property(property="data", ref="#/components/schemas/SemesterType")
 * )
 *
 * @OA\Schema(
 *   schema="SemesterTypeListResponse",
 *   @OA\Property(property="status", type="string", example="success"),
 *   @OA\Property(property="message", type="string", example="List of semester types"),
 *   @OA\Property(
 *     property="data",
 *     type="array",
 *     @OA\Items(ref="#/components/schemas/SemesterType")
 *   )
 * )
 */
class SemesterType extends Model
{
    protected $table = 'semester_types';
    protected $fillable = ['name', 'code'];
    protected $casts = [
        'name' => 'array',
    ];

}
