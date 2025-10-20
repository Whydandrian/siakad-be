<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 *   schema="Accreditation",
 *   @OA\Property(property="id", type="integer", example=1),
 *   @OA\Property(
 *     property="name",
 *     type="object",
 *     @OA\Property(property="en", type="string", example="Pending"),
 *     @OA\Property(property="id", type="string", example="Menunggu")
 *   ),
 *   @OA\Property(property="description", type="string", example="Accreditation description")
 * )
 *
 * @OA\Schema(
 *   schema="AccreditationResponse",
 *   @OA\Property(property="status", type="string", example="success"),
 *   @OA\Property(property="message", type="string", example="Accreditation detail"),
 *   @OA\Property(property="data", ref="#/components/schemas/Accreditation")
 * )
 *
 * @OA\Schema(
 *   schema="AccreditationListResponse",
 *   @OA\Property(property="status", type="string", example="success"),
 *   @OA\Property(property="message", type="string", example="List of accreditations"),
 *   @OA\Property(
 *     property="data",
 *     type="array",
 *     @OA\Items(ref="#/components/schemas/Accreditation")
 *   )
 * )
 */
class Accreditation extends Model
{
    protected $table = 'accreditations';
    protected $fillable = ['name', 'description'];

    protected $casts = [
        'name' => 'array',
    ];
}
