<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewsImage extends Model
{
    protected $table = 'news_images';
    protected $guarded = [];
    public function news()
    {
        return $this->belongsTo('News');
    }
}
