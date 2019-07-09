<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RestaurantImage extends Model
{
    protected $table = 'restaurant_images';
    protected $fillable = [
        'image',
        'restaurant_id'
    ];

    public function restaurants()
    {
        $this->hasMany(Restaurant::class,'restaurant_id', 'id');
    }
}
