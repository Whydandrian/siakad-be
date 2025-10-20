<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 *   schema="UnitType",
 *   @OA\Property(property="id", type="integer", example=1),
 *   @OA\Property(property="name", type="string", example="Program Sarjana"),
 *   @OA\Property(property="note", type="string", example="Catatan tambahan")
 * )
 *
 * @OA\Schema(
 *   schema="UnitTypeResponse",
 *   @OA\Property(property="status", type="string", example="success"),
 *   @OA\Property(property="message", type="string", example="Unit Type detail"),
 *   @OA\Property(property="data", ref="#/components/schemas/UnitType")
 * )
 *
 * @OA\Schema(
 *   schema="UnitTypeListResponse",
 *   @OA\Property(property="status", type="string", example="success"),
 *   @OA\Property(property="message", type="string", example="List of Unit Types"),
 *   @OA\Property(
 *     property="data",
 *     type="array",
 *     @OA\Items(ref="#/components/schemas/UnitType")
 *   ),
 * )
 */
class UnitType extends Model
{
    protected $table = 'unit_types';
    protected $fillable = ['name', 'description'];
}
