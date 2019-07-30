<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ResBedType extends Model
{
    //
    public $timestamps = false;

    protected  $guarded = ['id'];

    public function bedtypes(){
        return $this->belongsTo('App\BedType');
    }

    public function residences(){
        return $this->belongsTo('App\Residence');
    }
}
