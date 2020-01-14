<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Emploi extends Model
{
    public function cours(){

        return $this->belongsTo('App\Cour','cour_id');
        
    }
}
