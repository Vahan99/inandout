<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    const DURATION_TYPES_SINGULAR = [
        'h' => [
            'en' => 'hour',
            'hy' => 'ժամ',
            'ru' => 'час'
        ],
        'd' => [
            'en' => 'day',
            'hy' => 'օր',
            'ru' => 'день'
        ]
    ];

    const DURATION_TYPES_PLURAL = [
        'h' => [
            'en' => 'hours',
            'hy' => 'ժամ',
            'ru' => 'час'
        ],
        'd' => [
            'en' => 'days',
            'hy' => 'օր',
            'ru' => 'дней'
        ]
    ];

    protected $table = 'tours';

    protected $with = ['images'];

    protected  $fillable = [
        'name_hy',
        'name_ru',
        'name_en',
        'desc_hy',
        'desc_ru',
        'desc_en',
        'region_id',
        'slug',
        'tour_type_id',
        'data',
        'sightseeing_place',
        'from',
        'to',
        'grid_image',
        'after_text_hy',
        'after_text_ru',
        'after_text_en',
        'exclude_hy',
        'exclude_ru',
        'exclude_en',
        'duration'
    ];

    protected $guarded = ['created_at','update_at'];

    public function images()
    {
        return $this->hasMany(TourImage::class,'tour_id', 'id');
    }

    public function getNameAttribute()
    {
        $name = 'name_'.\App::getLocale();
        return $this->$name;
    }

    public function tour_days(){
        return $this->hasMany(TourDay::class, 'tour_id', 'id');
    }

    public function getDescAttribute()
    {
        $desc = 'desc_'.\App::getLocale();
        return $this->$desc;
    }

    public function getAfterTextAttribute()
    {
        $name = 'after_text_' . \App::getLocale();
        return $this->$name;
    }

    public function getExcludeAttribute()
    {
        $exclude = 'exclude_'.\App::getLocale();
        return $this->$exclude;
    }

    public function getSliderImagesAttribute() 
    {
        $images = [];
        foreach ($this->images()->get() as $image) {
            array_push($images, $image->image);
        }
        return $images;
    }

    public function type()
    {
        return $this->belongsTo(\App\TourType::class, 'tour_type_id', 'id');
    }
    
     public static function listAll($id)
    {
        return array_to_list(self::all(), 'name_'.\App::getLocale(), $id);
    }

    public function getTourTypeAttribute() 
    {
        return $this->type();
    }

     public function getMetaDataAttribute()
    {
        $data = $this->data ? json_decode($this->data, TRUE) : false;
        return $data;
    }

    public function getDateAttribute()
    {
        return \Carbon\Carbon::parse($this->from)->format('m/d/Y') . ' - ' . \Carbon\Carbon::parse($this->to)->format('m/d/Y');
    }

    public function region() 
    {
        return $this->hasOne(Region::class, 'id', 'region_id');
    }

    public function getDurationAttribute()
    {
        $duration = $this->attributes['duration'];
        return $duration ? json_decode($duration) : false;
    }

    public function getShowDurationAttribute()
    {
        $val = $this->duration;
        $locale = \App::getLocale();
        if($val) {
            return  $val->duration_value . ' ' .($val->duration_value == '1' ? self::DURATION_TYPES_SINGULAR[$val->duration_type][$locale] : self::DURATION_TYPES_PLURAL[$val->duration_type][$locale]);
        }
        return false;
    }
}
