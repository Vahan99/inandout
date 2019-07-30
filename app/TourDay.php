<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TourDay extends Model
{
    public $timestamps = false;

    protected $guarded = [
        'id'
    ];

    public function tour(){
        return $this->belongsTo(Tour::class, 'tour_id', 'id');
    }

    public function getNameAttribute()
    {
        $name = 'name_'.\App::getLocale();
        return $this->$name;
    }

    public function getTitleAttribute()
    {
        $name = 'title_'.\App::getLocale();
        return $this->$name;
    }

    public function getDescAttribute()
    {
        $name = 'desc_'.\App::getLocale();
        return $this->$name;
    }
}
