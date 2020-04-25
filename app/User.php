<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'prenom','nom', 'email', 'password','ddn','lieu_naissance','sexe','tel','adresse','avatar','role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function etudiant(){
        return $this->hasMany('App\Etudiant');
    }
    public function professeur(){
        return $this->hasMany('App\Professeur');
    }

    public function absence(){
        return $this->hasMany('App\Absence');
    }
 
}
