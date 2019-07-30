<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BedType extends Model
{
    //
    public $timestamps = false;

    protected  $guarded = ['id'];

    public static function listAll($id = 'id')
    {
        return array_to_list(self::all(), 'name_'.\App::getLocale(), $id);
    }

    public function resbedtypes(){
        return $this->hasMany('App\ResBedType');
    }
}
