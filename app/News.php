<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $guarded = [];

    public function category()
    {
        return $this->belongsToMany('App\Category', 'news_categories');
    }

    public function tag()
    {
        return $this->belongsToMany('App\Tag', 'news_tags');
    }

    public function newsImages()
    {
        return $this->hasMany('App\NewsImage')->orderBy('sort', 'ASC');
    }
}
