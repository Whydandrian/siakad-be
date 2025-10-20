<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 *   schema="Role",
 *   @OA\Property(property="id", type="integer", example=1),
 *   @OA\Property(property="name", type="string", example="admin"),
 * )
 *
 * @OA\Schema(
 *   schema="RoleResponse",
 *   @OA\Property(property="status", type="string", example="success"),
 *   @OA\Property(property="message", type="string", example="Role detail"),
 *   @OA\Property(property="data", ref="#/components/schemas/Role")
 * )
 *
 * @OA\Schema(
 *   schema="RoleListResponse",
 *   @OA\Property(property="status", type="string", example="success"),
 *   @OA\Property(property="message", type="string", example="List of roles"),
 *   @OA\Property(
 *     property="data",
 *     type="array",
 *     @OA\Items(ref="#/components/schemas/Role")
 *   )
 * )
 */
class Role extends Model
{
    protected $table = 'roles';
    protected $fillable = ['name'];


    public function user_roles()
    {
        return $this->hasMany(UserRole::class, 'role_id');
    }
}
