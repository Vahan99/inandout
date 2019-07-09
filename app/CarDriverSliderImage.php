<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\CarDriverSliderImage
 *
 * @mixin \Eloquent
 */
class CarDriverSliderImage extends Model
{
    public $fillable = [
        'car_driver_id',
        'name'
    ];
}
