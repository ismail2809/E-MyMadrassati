<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Etudiant;
use App\Professeur;
use Charts;
use DB;

class UserController extends Controller
{   
    public function profile()
    {   
        $id =3;        
        $etudiant = json_decode(Etudiant::where('user_id',$id)->with('users')->first(),true);
        //dd($etudiant);
        return view('user.profile',compact('etudiant'));
    }

    public function editprofile()
    {   
        $id   =1;        
        $user = User::where('id',$id)->first();

        if (isset($user) && $user->role == 'etudiant') {
            $data = json_decode(Etudiant::where('user_id',$user->id)->with('users')->first(),true);
        }
        elseif (isset($user) && $user->role == 'professeur') {
            $data = json_decode(Professeur::where('user_id',$user->id)->with('users')->first(),true);
        }  
        //dd($etudiant);
        return view('user.updateprofile',compact('data'));
    }

    public function update_profile(Request $request){
     
        $id = 1;

        $profile = User::where('id',$id)->first();   

        $user = User::find($profile->id);        
        $user->prenom = $request->prenom;
        $user->nom    = $request->nom;
        $user->ddn    = $request->ddn;
        $user->lieu_naissance = $request->lieu_naissance;
        $user->sexe   = $request->sexe;
        $user->tel    = $request->tel;
        $user->adresse= $request->adresse; 
 
        if($request->hasfile('avatar')){
             $user->avatar = $request->avatar->store('avatar');
        } 
        
        $user->save();

        if (isset($user) && $user->role == 'etudiant') {

            $etudiant  = Etudiant::where('user_id',$user->id)->first();
            //dd($etudiant->id);
            $etudiant         = Etudiant::find($etudiant->id);
            $etudiant->prenom_tuteur = $request->prenom_tuteur;
            $etudiant->nom_tuteur    = $request->nom_tuteur;
            $etudiant->tel_tuteur    = $request->tel_tuteur;
            $etudiant->email_tuteur  = $request->email_tuteur;
            $etudiant->sexe_tuteur   = $request->sexe_tuteur;
            $etudiant->profession_tuteur = $request->profession_tuteur;

            $etudiant->save();
        }

        else if(isset($user) && $user->role == 'professeur') {

            $professeur  = Professeur::where('user_id',$user->id)->first();
            //dd($professeur->id);
            $professeur          = Professeur::find($professeur->id);
            $professeur->cin     = $request->cin;
            $professeur->diplome = $request->diplome;
            $professeur->promo   = $request->promo; 

            $professeur->save();
        }

        return back();
    }

    public function getUsers()
    {
        $users = User::where(DB::raw("(DATE_FORMAT(created_at,'%Y'))"),date('Y'))
                    ->get();
        $chart = Charts::database($users, 'bar', 'highcharts')
                  ->title("Monthly new Register Users")
                  ->elementLabel("Total Users")
                  ->dimensions(1000, 500)
                  ->responsive(false)
                  ->groupByMonth(date('Y'), true);
                  
        return view('dashboard.dashboard',compact('chart'));
    }

    public function event(){
        $events = [];

        $events[] = \Calendar::event(
            'Event One', //event title
            false, //full day event?
            '2015-02-11T0800', //start time (you can also use Carbon instead of DateTime)
            '2015-02-12T0800', //end time (you can also use Carbon instead of DateTime)
            0 //optionally, you can specify an event ID
        );

        $events[] = \Calendar::event(
            "Valentine's Day", //event title
            true, //full day event?
            new \DateTime('2015-02-14'), //start time (you can also use Carbon instead of DateTime)
            new \DateTime('2015-02-14'), //end time (you can also use Carbon instead of DateTime)
            'stringEventId' //optionally, you can specify an event ID
        );

 
        $calendar = \Calendar::addEvents($events);

        return view('emploi.calendar', compact('calendar'));
    }

}