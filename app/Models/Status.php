<?php

namespace App\Models;

use App\Casts\TranslatableJson;
use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 *   schema="Status",
 *   @OA\Property(property="id", type="integer", example=1),
 *   @OA\Property(
 *     property="name",
 *     type="object",
 *     @OA\Property(property="en", type="string", example="Pending"),
 *     @OA\Property(property="id", type="string", example="Menunggu")
 *   ),
 *   @OA\Property(property="status_type_id", type="integer", example=1),
 *   @OA\Property(
 *     property="status_type",
 *     ref="#/components/schemas/StatusType"
 *   )
 * )
 *
 * @OA\Schema(
 *   schema="StatusResponse",
 *   @OA\Property(property="status", type="string", example="success"),
 *   @OA\Property(property="message", type="string", example="Status detail"),
 *   @OA\Property(property="data", ref="#/components/schemas/Status")
 * )
 *
 * @OA\Schema(
 *   schema="StatusListResponse",
 *   @OA\Property(property="status", type="string", example="success"),
 *   @OA\Property(property="message", type="string", example="List of statuses"),
 *   @OA\Property(
 *     property="data",
 *     type="array",
 *     @OA\Items(ref="#/components/schemas/Status")
 *   )
 * )
 */
class Status extends Model
{
    protected $table = 'statuses';
    protected $fillable = ['status_type_id', 'name'];
    protected $casts = [
        'name' => 'array',
    ];

    public function status_type()
    {
        return $this->belongsTo(StatusType::class, 'status_type_id');
    }


}
