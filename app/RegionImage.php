<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\RegionImage
 *
 * @mixin \Eloquent
 */
class RegionImage extends Model
{
    protected $table = 'region_images';
    protected $fillable = [
        'image',
        'region_id'
    ];

    public function region()
    {
        $this->hasMany(Region::class,'region_id', 'id');
    }
}
