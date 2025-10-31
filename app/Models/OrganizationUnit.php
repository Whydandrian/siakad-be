<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 *   schema="OrganizationUnit",
 *   @OA\Property(property="id", type="integer", example=1),
 *   @OA\Property(
 *     property="name",
 *     type="object",
 *     @OA\Property(property="en", type="string", example="Faculty Information"),
 *     @OA\Property(property="id", type="string", example="Fakultas Informasi")
 *   ),
 *   @OA\Property(property="unit_type_id", type="integer", example=1),
 *   @OA\Property(property="parent_id", type="integer", example=1),
 *   @OA\Property(
 *     property="unit_type",
 *     ref="#/components/schemas/UnitType"
 *   ),
 *   @OA\Property(
 *     property="parent",
 *     ref="#/components/schemas/OrganizationUnit"
 *   ),
 * )
 *
 * @OA\Schema(
 *   schema="OrganizationUnitResponse",
 *   @OA\Property(property="status", type="string", example="success"),
 *   @OA\Property(property="message", type="string", example="Organization unit detail"),
 *   @OA\Property(property="data", ref="#/components/schemas/OrganizationUnit")
 * )
 *
 * @OA\Schema(
 *   schema="OrganizationUnitListResponse",
 *   @OA\Property(property="status", type="string", example="success"),
 *   @OA\Property(property="message", type="string", example="List of organization units"),
 *   @OA\Property(
 *     property="data",
 *     type="array",
 *     @OA\Items(ref="#/components/schemas/OrganizationUnit")
 *   )
 * )
 */
class OrganizationUnit extends Model
{
    protected $table = 'organization_units';
    protected $fillable = [
        'name',
        'unit_type_id',
        'parent_id',
        'is_active',
    ];
    protected $casts = [
        'name' => 'array',
    ];

    public function unit_type()
    {
        return $this->belongsTo(UnitType::class, 'unit_type_id');
    }
    
}
