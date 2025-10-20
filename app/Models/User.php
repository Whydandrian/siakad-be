<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

/**
 * @OA\Schema(
 *   schema="User",
 *   @OA\Property(property="id", type="integer", example=1),
 *   @OA\Property(property="username", type="string", example="01234567"),
 *   @OA\Property(property="email", type="string", example="user.name@gmail.com"),
 *   @OA\Property(property="password", type="string", example="password123"),
 *   @OA\Property(property="email_verified_at", type="string", example=null),
 * )
 *
 * @OA\Schema(
 *   schema="UserResponse",
 *   @OA\Property(property="status", type="string", example="success"),
 *   @OA\Property(property="message", type="string", example="User detail"),
 *   @OA\Property(property="data", ref="#/components/schemas/User")
 * )
 *
 * @OA\Schema(
 *   schema="UserListResponse",
 *   @OA\Property(property="status", type="string", example="success"),
 *   @OA\Property(property="message", type="string", example="List of users"),
 *   @OA\Property(
 *     property="data",
 *     type="array",
 *     @OA\Items(ref="#/components/schemas/User")
 *   )
 * )
 */
class User extends Model
{
    use HasFactory, Notifiable;

    protected $table = "users";

    protected $fillable = [
        'username',
        'email',
        'password',
        'email_verified_at',
    ];

    protected $casts = [
        // Add your casts here
    ];

    protected $hidden = [
        'password',
        'remember_token',
        'email_verified_at'
    ];


    protected function setPasswordAttribute($value)
    {
        if (!empty($value)) {
            $this->attributes['password'] = Hash::make($value);
        }
    }
}
