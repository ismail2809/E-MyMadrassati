<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Professeur extends Model
{
    public function absence(){
        return $this->hasMany('App\Absence');
    }

    public function cour(){
        return $this->hasMany('App\Cour');
    }
    public function note(){
        return $this->hasMany('App\Note');
    }
    public function users(){

        return $this->belongsTo('App\User','user_id');
        
    }
}
