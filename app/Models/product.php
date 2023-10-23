<?php

namespace App\Models;

use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class product extends Model
{
    use HasFactory, HasSlug;
    protected $fillable = ["title", "price", "description", "stock", "category", 'brand', 'image'];

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()->generateSlugsFrom('title')->saveSlugsTo('slug');
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }
    public function cartitem()
    {
        return $this->hasMany(cartitem::class);
    }
}
