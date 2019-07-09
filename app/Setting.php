<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
   
    protected $table = 'setting';
    protected $fillable = [
    	'mail', 
        'phone',
    	'facebook',
        'vk',
    	'instagram',
        'image',
    	'title_hy',
        'title_en',
    	'title_ru',
        'keywords',
        'keywords_desc',
        'tripadvisor',
    ];

    public function getTitleAttribute()
    {
        $title = 'title_'.\App::getLocale();
        return $this->$title;
    }
}
