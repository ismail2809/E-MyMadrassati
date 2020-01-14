<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cour extends Model
{
    public function matieres(){

        return $this->belongsTo('App\Matiere','matiere_id');
        
    }
    public function professeurs(){

        return $this->belongsTo('App\Professeur','professeur_id');
        
    } 
    public function années(){

        return $this->belongsTo('App\Année','année_id');
        
    }
    public function classes(){

        return $this->belongsTo('App\Classe','classe_id');
        
    }    
    public function emploi(){
        return $this->hasMany('App\Emploi');
    }
}
