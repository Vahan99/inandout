<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewsImage extends Model
{
    public $fillable = [
        'news_id',
        'image'
    ];
}
