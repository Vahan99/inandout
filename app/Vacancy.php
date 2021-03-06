<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vacancy extends Model
{
    protected $table = 'vacancy';
    protected $fillable = [
     	'name_en',
     	'name_hy',
     	'name_ru',
     	'desc_en',
     	'desc_hy',
     	'desc_ru',
     	'slug',
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

}
