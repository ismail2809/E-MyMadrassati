<?php

namespace App\Http\Controllers;

use App\Professeur;
use Illuminate\Http\Request;

class ProfesseurController extends Controller
{
    public function index()
    {
        $professeurs = Professeur::all();
        return view('professeur.index',compact($professeur));
    }

    public function create(){
     
        return view('professeur.new');
    }

    public function store(Request $request){
        
        $professeur                  = new Professeur();  
        $professeur->user_id         = $request->user_id;         
        $professeur->cin             = $request->cin;       
        $professeur->diplome         = $request->diplome;
        $professeur->promo           = $request->promo;        
        $Professeur->save();

        return redirect('/professeurs');
    } 

    public function edit($id){

        $professeur = Professeur::find($id);
        return view('professeur.edit',['professeur'=>$professeur]);
    }
    
    public function update(Request $request){
        
        $professeur                  = new Professeur();  
        $professeur->user_id         = $request->user_id;         
        $professeur->cin             = $request->cin;       
        $professeur->diplome         = $request->diplome;
        $professeur->promo           = $request->promo;        
        $Professeur->save();

        return redirect('/professeurs');
    }

    public function destroy(Request $request,$id){

        $professeur = Professeur::find($id);
        $professeur->delete();

        return redirect('/professeurs');
        
    }
}