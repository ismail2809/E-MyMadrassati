<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    public function niveau(){
        return $this->hasMany('App\Niveau');
    }
}
