<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $table = 'teams';
    protected $fillable = [
    	'description_hy',
    	'description_en',
    	'description_ru',
    	'name_en',
    	'name_hy',
    	'name_ru',
    	'rank_hy',
    	'rank_en',
    	'rank_ru',
        'image'
    ];

    public function getNameAttribute()
    {
        $name = 'name_'.\App::getLocale();
        return $this->$name;
    }

    public function getRankAttribute()
    {
        $rank = 'rank_'.\App::getLocale();
        return $this->$rank;
    }

    public function getDescAttribute()
    {
        $rank = 'description_'.\App::getLocale();
        return $this->$rank;
    }
}
