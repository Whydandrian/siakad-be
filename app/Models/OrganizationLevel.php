<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 *   schema="OrganizationLevel",
 *   @OA\Property(property="id", type="integer", example=1),
 *   @OA\Property(
 *     property="name",
 *     type="object",
 *     @OA\Property(property="en", type="string", example="BLU"),
 *     @OA\Property(property="id", type="string", example="Badan Layanan Umum")
 *   ),
 *   @OA\Property(property="type", type="string", example="user")
 * )
 *
 * @OA\Schema(
 *   schema="OrganizationLevelResponse",
 *   @OA\Property(property="status", type="string", example="success"),
 *   @OA\Property(property="message", type="string", example="Organization level detail"),
 *   @OA\Property(property="data", ref="#/components/schemas/OrganizationLevel")
 * )
 *
 * @OA\Schema(
 *   schema="OrganizationLevelListResponse",
 *   @OA\Property(property="status", type="string", example="success"),
 *   @OA\Property(property="message", type="string", example="List of organization levels"),
 *   @OA\Property(
 *     property="data",
 *     type="array",
 *     @OA\Items(ref="#/components/schemas/OrganizationLevel")
 *   )
 * )
 */
class OrganizationLevel extends Model
{
    protected $table = 'organization_levels';
    protected $fillable = ['name'];
    protected $casts = [
        'name' => 'array',
    ];
}
