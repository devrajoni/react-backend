<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Service;

class SimilarProject extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_id',
        'image',
    ];

    public function similarService() {
        return $this->belongsTo(Service::class, 'service_id');
    }
}
