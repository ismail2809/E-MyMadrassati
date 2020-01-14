<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inscription extends Model
{
    public function etudiants(){

        return $this->belongsTo('App\Etudiant','etudiant_id');
        
    }
    public function années(){

        return $this->belongsTo('App\Année','année_id');
        
    }     
    public function classes(){

        return $this->belongsTo('App\Classe','classe_id');
        
    }
}
