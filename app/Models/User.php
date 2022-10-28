<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 *
 * @OA\Schema(properties={
 * * @OA\Property(
 *     property="id",
 *     format="int64",
 *     description="id",
 *     type="integer",
 *     title="id"
 * ),
 * @OA\Property(
 *     property="name",
 *     format="string",
 *     description="name",
 *     type="name",
 *     title="name"
 * ),
 * @OA\Property(
 *     property="email",
 *     format="email",
 *     description="email",
 *     type="string",
 *     title="email"
 * ),
 * @OA\Property(
 *     property="email_verified_at",
 *     format="string",
 *     description="email_verified_at",
 *     type="string",
 *     title="email_verified_at"
 * ),
 * @OA\Property(
 *     property="password",
 *     format="password",
 *     description="password",
 *     type="string",
 *     title="password"
 * )
 * })
 */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
