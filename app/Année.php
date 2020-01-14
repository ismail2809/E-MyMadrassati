<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Année extends Model
{
    public function absence(){
        return $this->hasMany('App\Absence');
    }

    public function cour(){
        return $this->hasMany('App\Cour');
    }

    public function inscription(){
        return $this->hasMany('App\Inscription');
    }

    public function note(){
        return $this->hasMany('App\Note');
    }
}
