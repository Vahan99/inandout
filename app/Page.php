<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Page
 *
 * @property-read mixed $desc
 * @property-read mixed $name
 * @property-read mixed $slider_images
 * @mixin \Eloquent
 */
class Page extends Model
{
    protected $table = 'pages';
    protected $fillable = [
    	'name_hy',
    	'name_en',
    	'name_ru',
    	'text_hy',
    	'text_en',
    	'text_ru',
    	'images',
        'data'
    ];

    public function images() {
    	return $this->hasMany(PageImage::class, 'page_id', 'id');
    }

    public function getNameAttribute()
    {
        $name = 'name_'.\App::getLocale();
        return $this->$name;
    }

    public function getDescAttribute()
    {
        $text = 'text_'.\App::getLocale();
        return $this->$text;
    }
}
