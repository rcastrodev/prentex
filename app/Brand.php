<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $fillable = ['order', 'name', 'slug', 'description', 'image', 'outstanding'];
}
