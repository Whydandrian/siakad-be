<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 *   schema="StatusType",
 *   @OA\Property(property="id", type="integer", example=1),
 *   @OA\Property(
 *     property="name",
 *     type="object",
 *     @OA\Property(property="en", type="string", example="Student-In"),
 *     @OA\Property(property="id", type="string", example="Mahasiswa Masuk")
 *   )
 * )
 *
 * @OA\Schema(
 *   schema="StatusTypeResponse",
 *   @OA\Property(property="status", type="string", example="success"),
 *   @OA\Property(property="message", type="string", example="Status type detail"),
 *   @OA\Property(property="data", ref="#/components/schemas/StatusType")
 * )
 *
 * @OA\Schema(
 *   schema="StatusTypeListResponse",
 *   @OA\Property(property="status", type="string", example="success"),
 *   @OA\Property(property="message", type="string", example="List of status types"),
 *   @OA\Property(
 *     property="data",
 *     type="array",
 *     @OA\Items(ref="#/components/schemas/StatusType")
 *   )
 * )
 */
class StatusType extends Model
{
    protected $table = 'status_types';
    protected $fillable = ['name'];
    protected $casts = [
        'name' => 'array',
    ];


    public function statuses()
    {
        return $this->hasMany(Status::class, 'status_type_id');
    }

}
