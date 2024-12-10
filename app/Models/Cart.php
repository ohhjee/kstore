<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cart extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['user_id', 'product_id', 'quantity'];
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
