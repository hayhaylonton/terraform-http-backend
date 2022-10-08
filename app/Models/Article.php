<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
 *     property="title",
 *     format="string",
 *     description="title",
 *     type="string",
 *     title="title"
 * ),
 * @OA\Property(
 *     property="body",
 *     format="string",
 *     description="body",
 *     type="string",
 *     title="body"
 * ),
 * @OA\Property(
 *     property="created_at",
 *     format="date-time",
 *     description="created_at",
 *     type="string",
 *     title="created_at"
 * ),
 * @OA\Property(
 *     property="updated_at",
 *     format="date-time",
 *     description="updated_at",
 *     type="string",
 *     title="updated_at"
 * )
 * })
 */
class Article extends Model
{

    protected $fillable = ['title', 'body'];
}
