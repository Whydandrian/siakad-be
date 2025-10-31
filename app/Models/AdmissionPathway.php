<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 *   schema="AdmissionPathway",
 *   @OA\Property(property="id", type="integer", example=1),
 *   @OA\Property(
 *     property="name",
 *     type="object",
 *     @OA\Property(property="en", type="string", example="Pending"),
 *     @OA\Property(property="id", type="string", example="Menunggu")
 *   )
 * )
 *
 * @OA\Schema(
 *   schema="AdmissionPathwayResponse",
 *   @OA\Property(property="status", type="string", example="success"),
 *   @OA\Property(property="message", type="string", example="Admission Pathway detail"),
 *   @OA\Property(property="data", ref="#/components/schemas/AdmissionPathway")
 * )
 *
 * @OA\Schema(
 *   schema="AdmissionPathwayListResponse",
 *   @OA\Property(property="status", type="string", example="success"),
 *   @OA\Property(property="message", type="string", example="List of admission pathways"),
 *   @OA\Property(
 *     property="data",
 *     type="array",
 *     @OA\Items(ref="#/components/schemas/AdmissionPathway")
 *   )
 * )
 */
class AdmissionPathway extends Model
{
    protected $table = 'admission_pathways';
    protected $fillable = ['name'];

    protected $casts = [
        'name' => 'array',
    ];
}
