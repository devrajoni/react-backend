<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\WorkCategory;

class Work extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'title',
        'image',
        'status',
    ];

    public function category() {
        return $this->belongsTo(WorkCategory::class, 'category_id');
    }
}
