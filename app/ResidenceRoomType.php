<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ResidenceRoomType extends Model
{
    protected $table = 'residence_room_types';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $guarded = ['id'];


    public function residences(){
        return $this->belongsTo('App\Residence');
    }

    public function room_types(){
        return $this->belongsTo('App\RoomType');
    }


}
