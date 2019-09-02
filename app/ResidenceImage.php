<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\ResidenceImage
 *
 * @mixin \Eloquent
 */
class ResidenceImage extends Model
{
    protected $table = 'residence_images';
    protected $fillable = [
        'image',
        'residence_id',
        'position'
    ];
}
