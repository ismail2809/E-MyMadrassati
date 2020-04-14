<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Inscription;
use App\Classe;
use App\Année;
use App\Etudiant;
use App\User;  
use App\Categorie;  
use App\Niveau;  

class InscriptionController extends Controller
{
	public function create(){
        $années = Année::all();
        $classes = Classe::all();
        $catégories = Categorie::all();
        $niveaux = Niveau::all();

    	return view('inscription.new',compact('années','classes','catégories','niveaux')); 
    }

    public function create2(){

        return view('inscription.new2'); 
    }

    public function store(Request $request){

		$inscription 			  = new Inscription();         

            $user           = new User();
            $user->prenom   = $request->prenom;                         
            $user->nom      = $request->nom;
            $user->email    = $request->nom;
            $user->password = bcrypt('Password123');
            $user->ddn      = $request->ddn;
            $user->lieu_naissance  = $request->lieu_naissance;
            $user->sexe     = $request->sexe;
            $user->tel      = $request->tel;
            $user->adresse  = $request->adresse;
                if($request->hasfile('avatar')){ 
                    $user->avatar   = $request->avatar->store('avatar');
                } 
            $user->role     = "etudiant";
            $user->save();               
            
            $etudiant                    = new Etudiant();                 
            $etudiant->user_id           = $user->id;        
            $etudiant->prenom_tuteur     = $request->prenom_tuteur;        
            $etudiant->nom_tuteur        = $request->nom_tuteur;       
            $etudiant->tel_tuteur        = $request->tel_tuteur;          
            $etudiant->email_tuteur      = $request->email_tuteur;          
            $etudiant->sexe_tuteur       = $request->sexe_tuteur;          
            $etudiant->profession_tuteur = $request->profession_tuteur;           
            $etudiant->save();

        $inscription->etudiant_id     = $etudiant->id; 
        $inscription->num_inscription = $request->num_inscription;  
        $inscription->niveau_id       = $request->niveau_id;  
        $inscription->categorie_id    = $request->categorie_id;  
		$inscription->classe_id       = $request->classe_id;	
		$inscription->année_id 	      = $request->année_id;  

 		$inscription->tarif           = $request->tarif;       
        $inscription->modalité        = $request->modalité;               
        $inscription->transport       = $request->transport;                
		$inscription->cantine 	      = $request->cantine;               
		$inscription->description     = $request->description;         
        $inscription->save();
        
		return redirect('/inscriptions')->with('success','Inscription faites avec succès !');
	}

	public function index(){

        $inscriptions = Inscription::all();
        
        return view('inscription.index',compact('inscriptions'));
    }

    public function edit($id){

        $inscription =   Inscription::find($id);
        $années = Année::all();
        $classes = Classe::all();
        $catégories = Categorie::all();
        $niveaux = Niveau::all();
        //dd($inscription);
        return view('inscription.edit',compact('années','classes','catégories','niveaux','inscription'));
    }
    
    public function update(Request $reques,$id){
        
        $inscription = Inscription::find($id);        

        $inscription->save();

        return redirect('/inscriptions');
    }

    public function destroy(Request $request,$id){

        $inscription = Inscription::find($id);
        $inscription->delete();

        return redirect('/inscription');
        
    }
}
