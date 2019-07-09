<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Restaurant
 *
 * @property-read mixed $address
 * @property-read mixed $description
 * @property-read mixed $main_image
 * @property-read mixed $name
 * @property-read mixed $slider_images
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\RestaurantImage[] $images
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Restaurant[] $tours
 * @mixin \Eloquent
 */
class Restaurant extends Model
{
    protected $table = 'restaurants';
    protected $fillable = [
        'desc_hy',
        'desc_en',
        'desc_ru',
        'name_hy',
        'name_en',
        'name_ru',
        'address_hy',
        'address_en',
        'address_ru',
        'region_id',
        'slug',
        'grid_image'
    ];
    protected $guarded = ['images'];

    public static function listAll($id)
    {
        return array_to_list(self::all(), 'name_'.\App::getLocale(), $id);
    }

    public function tours()
    {
    	return $this->hasMany(Restaurant::class, 'region_id', 'id');
    }

    public function getNameAttribute()
    {
        $name = 'name_'.\App::getLocale();
        return $this->$name;
    }

    public function getDescriptionAttribute()
    {
        $desc = 'desc_'.\App::getLocale();
        return $this->$desc;
    }

    public function getAddressAttribute()
    {
        $address = 'address_'.\App::getLocale();
        return $this->$address;
    }

    public function images()
    {
        return $this->hasMany(RestaurantImage::class,'restaurant_id', 'id');
    }
}
