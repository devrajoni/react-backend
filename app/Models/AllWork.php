<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\WorkCategory;

class AllWork extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'title',
        'author',
        'client',
        'date',
        'image',
        'description',
        'status',
    ];

    public function category() {
        return $this->belongsTo(WorkCategory::class, 'category_id');
    }

    protected $casts = [
        'date' => 'datetime:d-m-Y',
    ];
}
