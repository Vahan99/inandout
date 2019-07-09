<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Gallery
 *
 * @mixin \Eloquent
 */
class Gallery extends Model
{
    protected $table = 'gallery';
    protected $fillable = ['images'];
}
