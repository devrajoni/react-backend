<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ServiceSkill;
use App\Models\Feature;

class Service extends Model
{
    use HasFactory;
    
    protected $fillable = [
      'name',
      'title',
      'sub_title',
      'icon',
      'image',
      'short_description',
      'long_description',
      'status',
    ];

    public function skill()
    {
        return $this->hasMany(ServiceSkill::class);
    }

    public function feature()
    {
        return $this->hasMany(Feature::class);
    }
}
