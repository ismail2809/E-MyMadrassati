<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Matiere extends Model
{
    
    public function cour(){
        return $this->hasMany('App\Cour');
    }
    public function note(){
        return $this->hasMany('App\Note');
    }
}
