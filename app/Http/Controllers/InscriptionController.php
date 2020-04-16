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
 
    public function store(Request $request){

		$inscription 			  = new Inscription();         

            $user           = new User();
            $user->prenom   = $request->prenom;                         
            $user->nom      = $request->nom;
            $user->email    = $request->email;
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
		$inscription->annee_id 	      = 1;  

 		$inscription->tarif           = $request->tarif;       
        $inscription->modalité        = $request->modalité;               
        $inscription->transport       = $request->transport;                
		$inscription->cantine 	      = $request->cantine;               
		$inscription->description     = $request->description;         
        $inscription->save();
        
		return redirect('/inscriptions')->with('success','Inscription faites avec succès !');
	}

	public function index(){ 

        $inscriptions= Inscription::with('classes','categories','niveaus','etudiants','années')->get(); 
        //dd($inscriptions);
        return view('inscription.index',compact('inscriptions'));
    }

    public function edit($id){

        $inscription =   Inscription::find($id);
        $années = Année::all();
        $classes = Classe::all();
        $catégories = Categorie::all();
        $niveaux = Niveau::all();
        $etudiant = Etudiant::where('id',$inscription->etudiant_id)->first();
        $user = User::where('id',$etudiant->id)->first();
        //dd($user);
        return view('inscription.edit',compact('années','classes','catégories','niveaux','inscription','user','etudiant'));
    }
    
    public function update(Request $request,$id){
        //dd($request);
        $inscription = Inscription::find($id);        
        $etudiant = Etudiant::where('id',$inscription->etudiant_id)->first();
        
        $user = User::where('id',$etudiant->id)->first();
        
            $user->prenom   = isset($request->prenom) ? $request->prenom : $user->prenom;                         
            $user->nom      = isset($request->nom) ? $request->nom : $user->nom;
            $user->email    = isset($request->email) ? $request->email : $user->email;
            $user->password = bcrypt('Password123');
            $user->ddn      = isset($request->ddn) ? $request->ddn : $user->ddn;
            $user->lieu_naissance  = isset($request->lieu_naissance) ? $request->lieu_naissance : $user->lieu_naissance;
            $user->sexe     = isset($request->sexe) ? $request->sexe : $user->sexe;
            $user->tel      = isset($request->tel) ? $request->tel : $user->tel;
            $user->adresse  = isset($request->adresse) ? $request->adresse : $user->adresse;
                if($request->hasfile('avatar')){ 
                    $user->avatar   = $request->avatar->store('avatar');
                } 
            $user->role     = "etudiant";
            $user->save();               
             
            $etudiant->user_id           = $user->id;        
            $etudiant->prenom_tuteur     = isset($request->prenom_tuteur) ? $request->prenom_tuteur : $etudiant->prenom_tuteur;        
            $etudiant->nom_tuteur        = isset($request->nom_tuteur) ? $request->nom_tuteur : $etudiant->nom_tuteur;       
            $etudiant->tel_tuteur        = isset($request->tel_tuteur) ? $request->tel_tuteur : $etudiant->tel_tuteur;          
            $etudiant->email_tuteur      = isset($request->email_tuteur) ? $request->email_tuteur : $etudiant->email_tuteur;          
            $etudiant->sexe_tuteur       = isset($request->sexe_tuteur) ? $request->sexe_tuteur : $etudiant->sexe_tuteur;          
            $etudiant->profession_tuteur = isset($request->profession_tuteur) ? $request->profession_tuteur : $etudiant->profession_tuteur;  
            $etudiant->save();

            $inscription->etudiant_id     = $etudiant->id; 
            $inscription->num_inscription = isset($request->num_inscription) ? $request->num_inscription : $inscription->num_inscription;  
            $inscription->niveau_id       = isset($request->niveau_id) ? $request->niveau_id : $inscription->niveau_id;  
            $inscription->categorie_id    = isset($request->categorie_id) ? $request->categorie_id : $inscription->categorie_id;  
            $inscription->classe_id       = isset($request->classe_id) ? $request->classe_id : $inscription->classe_id;    
            $inscription->année_id        = isset($request->année_id) ? $request->année_id : $inscription->année_id;  

            $inscription->tarif           = isset($request->tarif) ? $request->tarif : $inscription->tarif;       
            $inscription->modalité        = isset($request->modalité) ? $request->modalité : $inscription->modalité;               
            $inscription->transport       = isset($request->transport) ? $request->transport : $inscription->transport;                
            $inscription->cantine         = isset($request->cantine) ? $request->cantine : $inscription->cantine;               
            $inscription->description     = isset($request->description) ? $request->description : $inscription->description;
            //dd($inscription,$etudiant,$user);
        $inscription->save();

        return redirect('/inscriptions');
    }

    public function destroy(Request $request,$id){

        $inscription = Inscription::find($id);
        $inscription->delete();

        return redirect('/inscriptions');
        
    }

    public function show($id){

        $inscription = Inscription::find($id);
        $année = Année::where('id',$inscription->année_id)->first();
        $classe = Classe::where('id',$inscription->classe_id)->first();
        $categorie = Categorie::where('id',$inscription->categorie_id)->first();
        $niveau = Niveau::where('id',$inscription->niveau_id)->first();
        $etudiant = Etudiant::where('id',$inscription->etudiant_id)->first();
        $user = User::where('id',$etudiant->id)->first();

        return view('inscription.détail',compact('année','classe','categorie','niveau','inscription','user','etudiant'));
    }
}
