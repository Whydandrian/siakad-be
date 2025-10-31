<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 *   schema="DigitSemester",
 *   @OA\Property(property="id", type="integer", example=1),
 *   @OA\Property(
 *     property="digit",
 *     type="integer",
 *     example=1
 *   ),
 *   @OA\Property(
 *     property="note",
 *     type="json",
 *     example="{}"
 *   ),
 * )
 *
 * @OA\Schema(
 *   schema="DigitSemesterResponse",
 *   @OA\Property(property="status", type="string", example="success"),
 *   @OA\Property(property="message", type="string", example="Digit semester detail"),
 *   @OA\Property(property="data", ref="#/components/schemas/DigitSemester")
 * )
 *
 * @OA\Schema(
 *   schema="DigitSemesterListResponse",
 *   @OA\Property(property="status", type="string", example="success"),
 *   @OA\Property(property="message", type="string", example="List of digit semesters"),
 *   @OA\Property(
 *     property="data",
 *     type="array",
 *     @OA\Items(ref="#/components/schemas/DigitSemester")
 *   )
 * )
 */
class DigitSemester extends Model
{
    protected $table = 'digit_semesters';
    protected $fillable = ['digit', 'note'];
    protected $casts = [
        'note' => 'json',
    ];
}
