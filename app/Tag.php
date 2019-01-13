<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $guarded = [];

    public function news()
    {
        return $this->belongsToMany('App\News', 'news_tags');
    }
}