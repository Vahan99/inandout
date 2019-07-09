<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Region
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Residence[] $apartments
 * @property-read mixed $description
 * @property-read mixed $main_image
 * @property-read mixed $name
 * @property-read mixed $slider_images
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Residence[] $hotels
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\RegionImage[] $images
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Restaurant[] $restaurants
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Tour[] $tours
 * @mixin \Eloquent
 */
class Region extends Model
{
    protected $table = 'regions';
    protected $fillable = [
        'desc_hy',
        'desc_en',
        'desc_ru',
        'name_hy',
        'name_en',
        'name_ru',
        'slug',
    ];
    protected $guarded = ['images'];

    public static function listAll($id)
    {
        return array_to_list(self::all(), 'name_'.\App::getLocale(), $id);
    }

    public function tours()
    {
    	return $this->hasMany(Tour::class, 'region_id', 'id');
    }

    public function sightseeing_places() 
    {
        return $this->tours()->whereSightseeingPlace(1);
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

    public function images()
    {
        return $this->hasMany(RegionImage::class,'region_id', 'id');
    }

    public function getSliderImagesAttribute() 
    {
        $images = [];
        foreach ($this->images()->get() as $image) {
            array_push($images, $image->image);
        }
        return $images;
    }

    public function hotels()
    {
        return $this->hasMany(Residence::class, 'region_id', 'id')->whereResidenceType(Residence::residence_type_hotel);
    }

    public function hostels()
    {
        return $this->hasMany(Residence::class, 'region_id', 'id')->whereResidenceType(Residence::residence_type_hostel);
    }

    public function apartments()
    {
        return $this->hasMany(Residence::class, 'region_id', 'id')->whereResidenceType(Residence::residence_type_apartment);
    }

    public function restaurants()
    {
        return $this->hasMany(Restaurant::class, 'region_id', 'id');     
    }
}
