<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 *   schema="Graduation",
 *   @OA\Property(property="id", type="integer", example=1),
 *   @OA\Property(
 *     property="year",
 *     type="string",
 *     example="2025-2026"
 *   ),
 *   @OA\Property(
 *     property="note",
 *     type="json",
 *     example="{}"
 *   ),
 * )
 *
 * @OA\Schema(
 *   schema="GraduationResponse",
 *   @OA\Property(property="status", type="string", example="success"),
 *   @OA\Property(property="message", type="string", example="Graduation detail"),
 *   @OA\Property(property="data", ref="#/components/schemas/Graduation")
 * )
 *
 * @OA\Schema(
 *   schema="GraduationListResponse",
 *   @OA\Property(property="status", type="string", example="success"),
 *   @OA\Property(property="message", type="string", example="List of graduations"),
 *   @OA\Property(
 *     property="data",
 *     type="array",
 *     @OA\Items(ref="#/components/schemas/Graduation")
 *   )
 * )
 */
class Graduation extends Model
{
    protected $table = 'graduations';
    protected $fillable = ['year', 'note'];
    protected $casts = [
        'note' => 'json',
    ];
}
