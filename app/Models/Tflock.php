<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tflock extends Model
{
    protected $casts = [
        'lockid' => 'string',
        'lock' => 'string',
    ];
}