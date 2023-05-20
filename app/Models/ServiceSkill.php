<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Service;

class ServiceSkill extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_id',
        'name',
        'percentage',
        'status',
    ];

    public function serviceSkill() {
        return $this->belongsTo(Service::class, 'service_id');
    }
}
