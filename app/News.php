<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\News
 *
 * @property-read mixed $desc
 * @property-read mixed $name
 * @mixin \Eloquent
 */
class News extends Model
{
    protected $table = 'news';
    protected $fillable = [
    	'desc_hy',
    	'desc_en',
    	'desc_ru',
    	'name_en',
    	'name_hy',
    	'name_ru',
        'slug',
        'grid_image'
    ];

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

    public function images()
    {
        return $this->hasMany(\App\NewsImage::class, 'news_id', 'id');
    }
}
