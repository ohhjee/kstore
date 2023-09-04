<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Brand extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id',
        'brand'
    ];
    public function categorys(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
