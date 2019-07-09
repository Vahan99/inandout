<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * App\CarDriver
 *
 * @property-read mixed $date
 * @property-read mixed $desc
 * @property-read mixed $meta_data
 * @property-read mixed $name
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\CarDriverSliderImage[] $sliderImages
 * @property-read \App\VehicleType $vehicle_type
 * @mixin \Eloquent
 */
class CarDriver extends Model
{
    protected $table = 'car_driver';
    protected $fillable = [
    	'desc_hy',
    	'desc_en',
    	'desc_ru',
    	'name_en',
    	'name_hy',
    	'name_ru',
        'slug',
        'data',
        'with_driver',
        'grid_image',
        'vehicle_type_id',
        'num_of_seats',
        'amenities',
        'after_text_hy',
        'after_text_ru',
        'after_text_en',
    ];

    protected $guarded = ['image'];

    public function getNameAttribute()
    {
        $name = 'name_'.\App::getLocale();
        return $this->$name;
    }

    public function getDescAttribute()
    {
        $desc = 'desc_'.\App::getLocale();
        return $this->$desc;
    }

    public function getAfterTextAttribute()
    {
        $desc = 'after_text_'.\App::getLocale();
        return $this->$desc;
    }

    public function sliderImages() {
        return $this->hasMany(\App\CarDriverSliderImage::class, 'car_driver_id', 'id');
    }

    public function getDateAttribute()
    {
        return Carbon::parse($this->from)->format('m/d/Y') . ' - ' . Carbon::parse($this->to)->format('m/d/Y');
    }
    
    public function getMetaDataAttribute()
    {
        $data = $this->data ? json_decode($this->data, TRUE) : false;
        return $data;
    }

    public function vehicle_type()
    {
        return $this->hasOne(VehicleType::class, 'id', 'vehicle_type_id');
    }

    public function getAmenityDataAttribute()
    {
        $amenities = $this->amenities ? json_decode($this->amenities, TRUE) : false;
        return $amenities;
    }
}