<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactCard extends Model
{
    use HasFactory;

    protected $fillable = [
       'title',
       'icon',
       'description',
       'status',
    ];
}
