<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TourType extends Model
{
    protected $table = 'tour_types';

    protected $fillable = [
	    'name_hy',
	    'name_ru',
	    'name_en',
	    'slug',
	    'parent_id',
        'image',
    ];

    public static function listAll($id)
    {
        return array_to_list(self::whereNull('parent_id')->get(), 'name_'.\App::getLocale(), $id);
    }

    public function childrenTourTypes()
    {
        return $this->hasMany(self::class, 'parent_id', 'id');
    }

    public function parentTourType()
    {
        return $this->belongsTo(self::class, 'parent_id', 'id')->with('childrenTourTypes');
    }

    public function getNameAttribute()
    {
        $name = 'name_'.\App::getLocale();
        return $this->$name;
    }

    public function tours()
    {
        return $this->hasMany(\App\Tour::class, 'tour_type_id', 'id')->whereDisplay(true);
    }

    public static function listTourTypes()
    {
        return self::with('childrenTourTypes')->whereNull('parent_id')->get();
    }
}
