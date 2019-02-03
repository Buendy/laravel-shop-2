<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function getFeaturedImageUrlAttribute()
    {
        $image = $this->images()->where('featured', true)->first();

        if(!$image) {
            $image = $this->images()->first();
        }

        return ($image ? $image->url : '/images/default.jpg');
    }

    public function getCategoryNameAttribute()
    {
        if ($this->category) {
            return $this->category->name;
        }
        return 'General';
    }
}
