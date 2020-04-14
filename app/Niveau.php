<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Niveau extends Model
{
	protected $table = 'niveaus';

    public function categories(){

        return $this->belongsTo('App\Categorie','categorie_id');
        
    }
    public function classe(){
        return $this->hasMany('App\Classe');
    }
}
