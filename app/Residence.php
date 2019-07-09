<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Residence
 *
 * @property-read mixed $address
 * @property-read mixed $amenity_data
 * @property-read mixed $description
 * @property-read mixed $main_image
 * @property-read mixed $meta_data
 * @property-read mixed $name
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\ResidenceImage[] $images
 * @mixin \Eloquent
 */
class Residence extends Model
{
    public $residence_types = [
        'Hotel',
        'Apartment',
        'Hostel'
    ];

    const residence_type_apartment = 10;
    const residence_type_hotel = 20;
    const residence_type_hostel = 30;

    public static function residenceList()
    {
        return [
            self::residence_type_apartment => 'Apartment',
            self::residence_type_hotel => 'Hotel',
            self::residence_type_hostel => 'Hostel',
        ];
    }

    protected $table = 'residences';

    protected $with = ['images'];

    protected $fillable = [
        'name_hy',
        'name_ru',
        'name_en',
        'desc_hy',
        'desc_ru',
        'desc_en',
        'address_hy',
        'address_ru',
        'address_en',
        'region_id',
        'residence_type',
        'data',
        'amenities',
        'slug',
        'grid_image',
        'after_text_hy',
        'after_text_ru',
        'after_text_en'
    ];

    protected $guarded = ['created_at', 'update_at'];

    public function images()
    {
        return $this->hasMany(ResidenceImage::class, 'residence_id', 'id');
    }

    public function getNameAttribute()
    {
        $name = 'name_' . \App::getLocale();
        return $this->$name;
    }

    public function getDescriptionAttribute()
    {
        $desc = 'desc_' . \App::getLocale();
        return $this->$desc;
    }

    public function getAddressAttribute()
    {
        $address = 'address_' . \App::getLocale();
        return $this->$address;
    }

    public function getAfterTextAttribute()
    {
        $name = 'after_text_' . \App::getLocale();
        return $this->$name;
    }

    public function getMetaDataAttribute()
    {
        $data = $this->data ? json_decode($this->data, TRUE) : false;
        return $data;
    }

    public function getAmenityDataAttribute()
    {
        $amenities = $this->amenities ? json_decode($this->amenities, TRUE) : false;
        return $amenities;
    }
}