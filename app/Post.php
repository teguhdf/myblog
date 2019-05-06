<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function category()
    {
        return $this->belongsTo('App\category');
    }

    public function tags()
    {
        return $this->belongsToMany('App\tag');
    }
}
