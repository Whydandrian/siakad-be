<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 *   schema="OrganizationUnitHistory",
 *   @OA\Property(property="id", type="integer", example=1),
 *   @OA\Property(property="organization_unit_id", type="integer", example=1),
 *   @OA\Property(property="organization_level_id", type="integer", example=1),
 *   @OA\Property(property="start_date", type="date", example="2025-10-14"),
 *   @OA\Property(property="end_date", type="date", example="2025-10-14"),
 *   @OA\Property(property="is_active", type="boolean", example=true),
 *   @OA\Property(
 *     property="note",
 *     type="object",
 *     @OA\Property(property="en", type="string", example="Faculty Information"),
 *     @OA\Property(property="id", type="string", example="Fakultas Informasi")
 *   ),
 *   @OA\Property(
 *     property="organization_level",
 *     ref="#/components/schemas/OrganizationLevel"
 *   ),
 *   @OA\Property(
 *     property="organization_unit",
 *     ref="#/components/schemas/OrganizationUnit"
 *   ),
 * )
 *
 * @OA\Schema(
 *   schema="OrganizationUnitHistoryResponse",
 *   @OA\Property(property="status", type="string", example="success"),
 *   @OA\Property(property="message", type="string", example="Organization unit history detail"),
 *   @OA\Property(property="data", ref="#/components/schemas/OrganizationUnitHistory")
 * )
 *
 * @OA\Schema(
 *   schema="OrganizationUnitHistoryListResponse",
 *   @OA\Property(property="status", type="string", example="success"),
 *   @OA\Property(property="message", type="string", example="List of organization unit histories"),
 *   @OA\Property(
 *     property="data",
 *     type="array",
 *     @OA\Items(ref="#/components/schemas/OrganizationUnitHistory")
 *   )
 * )
 */
class OrganizationUnitHistory extends Model
{
    protected $table = 'organization_unit_histories';
    protected $fillable = [
        'organization_unit_id',
        'organization_level_id',
        'start_date',
        'end_date',
        'is_active',
        'note',
    ];
    protected $casts = [
        'note' => 'array',
    ];
    public function organization_unit()
    {
        return $this->belongsTo(OrganizationUnit::class, 'organization_unit_id');
    }
    public function organization_level()
    {
        return $this->belongsTo(OrganizationLevel::class, 'organization_level_id');
    }
}
