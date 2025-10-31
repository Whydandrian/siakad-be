<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 *   schema="GradeList",
 *   @OA\Property(property="id", type="integer", example=1),
 *   @OA\Property(
 *     property="code",
 *     type="string",
 *     example="B"
 *   ),
 *   @OA\Property(
 *     property="gpa_score",
 *     type="string",
 *     example="3.00"
 *   ),
 * )
 *
 * @OA\Schema(
 *   schema="GradeListResponse",
 *   @OA\Property(property="status", type="string", example="success"),
 *   @OA\Property(property="message", type="string", example="Grade detail"),
 *   @OA\Property(property="data", ref="#/components/schemas/GradeList")
 * )
 *
 * @OA\Schema(
 *   schema="GradeListListResponse",
 *   @OA\Property(property="status", type="string", example="success"),
 *   @OA\Property(property="message", type="string", example="List of grade lists"),
 *   @OA\Property(
 *     property="data",
 *     type="array",
 *     @OA\Items(ref="#/components/schemas/GradeList")
 *   )
 * )
 */
class GradeList extends Model
{
    protected $table = 'grade_lists';
    protected $fillable = ['code', 'gpa_score'];
    
}
