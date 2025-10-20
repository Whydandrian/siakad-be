<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


/**
 * @OA\Schema(
 *   schema="StudyStage",
 *   @OA\Property(property="id", type="integer", example=1),
 *   @OA\Property(
 *     property="name",
 *     type="object",
 *     @OA\Property(property="en", type="string", example="example name"),
 *     @OA\Property(property="id", type="string", example="Contoh nama")
 *   ),
 *   @OA\Property(property="code", type="string", example="Gs")
 * )
 *
 * @OA\Schema(
 *   schema="StudyStageResponse",
 *   @OA\Property(property="status", type="string", example="success"),
 *   @OA\Property(property="message", type="string", example="Semester type detail"),
 *   @OA\Property(property="data", ref="#/components/schemas/StudyStage")
 * )
 *
 * @OA\Schema(
 *   schema="StudyStageListResponse",
 *   @OA\Property(property="status", type="string", example="success"),
 *   @OA\Property(property="message", type="string", example="List of semester types"),
 *   @OA\Property(
 *     property="data",
 *     type="array",
 *     @OA\Items(ref="#/components/schemas/StudyStage")
 *   )
 * )
 */
class StudyStage extends Model
{
    protected $table = 'study_stages';
    protected $fillable = ['name', 'code'];
    protected $casts = [
        'name' => 'array',
    ];
}
