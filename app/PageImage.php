<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PageImage extends Model
{
    protected $fillable = [
        'image',
        'page_id'
    ];
}
