<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inscription extends Model
{
    public function etudiants(){

        return $this->belongsTo('App\Etudiant','etudiant_id');
        
    }
    public function années(){

        return $this->belongsTo('App\Année','annee_id');
        
    }     
    public function classes(){

        return $this->belongsTo('App\Classe','classe_id');
        
    }

    public function categories(){

        return $this->belongsTo('App\Categorie','categorie_id');
        
    }

    public function niveaus(){

        return $this->belongsTo('App\Niveau','niveau_id');
        
    }

    public function Payment(){
        return $this->hasMany('App\Payment');
    }

}
