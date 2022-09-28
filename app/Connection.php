<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model;

class Connection extends Model
{
    protected $guarded = [];
    
    public function translations()
    {
        return $this->hasMany('App\Translation');
    }
}
