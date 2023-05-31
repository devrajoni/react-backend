<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SingleServiceBanner extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
    ];
}
