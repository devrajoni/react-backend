<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_name',
        'email',
        'phone',
        'company_logo',
        'favicon',
        'address',
        'map',
        'description',
        'landing_description',
        'copyright_name',
        'copyright_year',
        'copyright_link',
    ];
}
