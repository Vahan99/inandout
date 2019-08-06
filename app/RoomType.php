<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoomType extends Model
{
    protected $fillable = [
    	'name_hy',
    	'name_en',
    	'name_ru'
    ];


    public static function listAll($id = 'id')
    {
        return array_to_list(self::all(), 'name_'.\App::getLocale(), $id);
    }

    public function residence_room_types()
    {
        return $this->hasMany('\App\ResidenceRoomTypes');
    }

    public function getNameAttribute()
    {
        $name = 'name_'.\App::getLocale();
        return $this->$name;
    }
}
