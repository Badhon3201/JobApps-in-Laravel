<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $guarded =[];
    public function getRouteKeyName()
    {
        return 'slug';
    }
    public function company(){
        // One To Many(Inverse)
        return $this->belongsTo('App\Company');
    }
}
