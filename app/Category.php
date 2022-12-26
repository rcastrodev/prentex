<?php

namespace App;

use App\Image;
use App\Product;
use App\SubCategory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['order', 'name', 'slug', 'description', 'image', 'outstanding'];

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    public function subCategories()
    {
        return $this->hasMany(SubCategory::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
