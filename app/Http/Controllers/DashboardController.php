<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Etudiant;
use App\Professeur;
use App\Payment;
use App\Inscription;
use DB;
use Charts;
use Session;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $année = Session::get('année');
        //dd($année);
        $professeurs = Professeur::count();
        $payments = Payment::where('annee_id',$année)->sum('versement'); 
  
        $etudiants = Inscription::select('etudiant_id')->where('annee_id',$année)->get();
        $nb_etudiants = $etudiants->count();

   
        $users = Inscription::where(DB::raw("(DATE_FORMAT(created_at,'%Y'))"),date('Y'))->get();

        $chart = Charts::database($users, 'bar', 'highcharts')
                  ->title("Nouveaux utilisateurs enregistrés mensuels")
                  ->elementLabel("Total Etudiants")
                  ->dimensions(1000, 500)
                  ->responsive(false)
                  ->groupByMonth(date('Y'), true);
                  
        return view('dashboard.dashboard',compact('chart','nb_etudiants','payments','professeurs'));
    }

 
}
