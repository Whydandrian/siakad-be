<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 *   schema="GraduationPredicate",
 *   @OA\Property(property="id", type="integer", example=1),
 *   @OA\Property(
 *     property="name",
 *     type="object",
 *     @OA\Property(property="en", type="string", example="Pending"),
 *     @OA\Property(property="id", type="string", example="Menunggu")
 *   )
 * )
 *
 * @OA\Schema(
 *   schema="GraduationPredicateResponse",
 *   @OA\Property(property="status", type="string", example="success"),
 *   @OA\Property(property="message", type="string", example="Graduation Predicate detail"),
 *   @OA\Property(property="data", ref="#/components/schemas/GraduationPredicate")
 * )
 *
 * @OA\Schema(
 *   schema="GraduationPredicateListResponse",
 *   @OA\Property(property="status", type="string", example="success"),
 *   @OA\Property(property="message", type="string", example="List of graduation predicates"),
 *   @OA\Property(
 *     property="data",
 *     type="array",
 *     @OA\Items(ref="#/components/schemas/GraduationPredicate")
 *   )
 * )
 */
class GraduationPredicate extends Model
{
    protected $table = 'graduation_predicates';
    protected $fillable = ['name'];

    protected $casts = [
        'name' => 'array',
    ];
}
