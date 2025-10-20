<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 *   schema="CohortYear",
 *   @OA\Property(property="id", type="integer", example=1),
 *   @OA\Property(
 *     property="year",
 *     type="string",
 *     example="2023"
 *   ),
 *   @OA\Property(
 *     property="name",
 *     type="string",
 *     example="2023/2024"
 *   )
 * )
 *
 * @OA\Schema(
 *   schema="CohortYearResponse",
 *   @OA\Property(property="status", type="string", example="success"),
 *   @OA\Property(property="message", type="string", example="CohortYear detail"),
 *   @OA\Property(property="data", ref="#/components/schemas/CohortYear")
 * )
 *
 * @OA\Schema(
 *   schema="CohortYearListResponse",
 *   @OA\Property(property="status", type="string", example="success"),
 *   @OA\Property(property="message", type="string", example="List of cohort-years"),
 *   @OA\Property(
 *     property="data",
 *     type="array",
 *     @OA\Items(ref="#/components/schemas/CohortYear")
 *   )
 * )
 */
class CohortYear extends Model
{
    protected $table = 'cohort_years';
    protected $fillable = ['year', 'name'];
}
