<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Service;

class Feature extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_id',
        'icon',
        'title',
        'description',
        'status',
    ];
    public function featureService() {
        return $this->belongsTo(Service::class, 'service_id');
    }
}
