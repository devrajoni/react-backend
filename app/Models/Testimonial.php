<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Latest;

class Testimonial extends Model
{
    use HasFactory;

   protected $fillable = [
      'latest_id',
      'name',
      'designation',
      'description',
      'rating',
      'image',
      'status',
   ];

    public function latest()
    {
        return $this->belongsTo(Latest::class, 'latest_id');
    }
}
