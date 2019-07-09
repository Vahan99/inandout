<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TourImage extends Model
{
    protected $table = 'tour_images';
    protected $fillable = [
        'image',
        'tour_id'
    ];
}
