<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    public function etudiants(){

        return $this->belongsTo('App\Etudiant','etudiant_id');
        
    } 

    public function années(){

        return $this->belongsTo('App\Année','annee_id');
        
    }

    public function inscriptions(){

        return $this->belongsTo('App\Inscription','inscription_id');
        
    }
    
}
