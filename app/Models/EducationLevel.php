<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


/**
 * @OA\Schema(
 *   schema="EducationLevel",
 *   @OA\Property(property="id", type="integer", example=1),
 *   @OA\Property(
 *     property="name",
 *     type="object",
 *     @OA\Property(property="en", type="string", example="Bachelor"),
 *     @OA\Property(property="id", type="string", example="Sarjana")
 *   ),
 *   @OA\Property(
 *     property="code",
 *     type="string",
 *     example="S1"
 *   ),
 * )
 *
 * @OA\Schema(
 *   schema="EducationLevelResponse",
 *   @OA\Property(property="status", type="string", example="success"),
 *   @OA\Property(property="message", type="string", example="Education Level detail"),
 *   @OA\Property(property="data", ref="#/components/schemas/EducationLevel")
 * )
 *
 * @OA\Schema(
 *   schema="EducationLevelListResponse",
 *   @OA\Property(property="status", type="string", example="success"),
 *   @OA\Property(property="message", type="string", example="List of education levels"),
 *   @OA\Property(
 *     property="data",
 *     type="array",
 *     @OA\Items(ref="#/components/schemas/EducationLevel")
 *   )
 * )
 */
class EducationLevel extends Model
{
    protected $table = 'education_levels';
    protected $fillable = ['name', 'code'];

    protected $casts = [
        'name' => 'array',
    ];
}
