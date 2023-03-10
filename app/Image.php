<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = ['order', 'name', 'image', 'imageable_id', 'imageable_type', 'section'];

    public function imageable()
    {
        return $this->morphTo();
    }
}
