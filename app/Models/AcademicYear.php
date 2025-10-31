<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 *   schema="AcademicYear",
 *   @OA\Property(property="id", type="integer", example=1),
 *   @OA\Property(
 *     property="year",
 *     type="string",
 *     example="2023/2024"
 *   ),
 *   @OA\Property(
 *     property="note",
 *     type="json",
 *     example="{}"
 *   ),
 * )
 *
 * @OA\Schema(
 *   schema="AcademicYearResponse",
 *   @OA\Property(property="status", type="string", example="success"),
 *   @OA\Property(property="message", type="string", example="Academic year detail"),
 *   @OA\Property(property="data", ref="#/components/schemas/AcademicYear")
 * )
 *
 * @OA\Schema(
 *   schema="AcademicYearListResponse",
 *   @OA\Property(property="status", type="string", example="success"),
 *   @OA\Property(property="message", type="string", example="List of academic years"),
 *   @OA\Property(
 *     property="data",
 *     type="array",
 *     @OA\Items(ref="#/components/schemas/AcademicYear")
 *   )
 * )
 */
class AcademicYear extends Model
{
    protected $table = 'academic_years';
    protected $fillable = ['year', 'note'];
    protected $casts = [
        'note' => 'json',
    ];
}
