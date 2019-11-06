<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $guarded =[];
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function jobs(){
        // One To many Relationship
        return $this->hasMany('App\Job');
    }
}
