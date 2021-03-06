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
use App\Payment;  
use App\Absence;  
use App\Note;
use Illuminate\Support\Facades\Hash;

class InscriptionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
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
            $user->password = hash::make('abcd1234');
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
		$inscription->annee_id 	      = $request->année_id;  

 		$inscription->tarif           = $request->tarif;       
        $inscription->modalité        = $request->modalité;               
        $inscription->transport       = $request->transport;                
		$inscription->cantine 	      = $request->cantine;               
		$inscription->description     = $request->description;         
        $inscription->save();
        
		return redirect('/inscriptions')->with('success','Inscription est bien ajouté !');
	}

	public function index(){ 

        $inscriptions= Inscription::with('classes','categories','niveaus','etudiants','années')->get(); 
        $années = Année::all();
        $classes = Classe::all();
        $catégories = Categorie::all();
        $niveaux = Niveau::all(); 
    
        //dd($inscriptions);
        return view('inscription.index',compact('inscriptions','années','classes','catégories','niveaux'));
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
            $user->password = hash::make($request->password);

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
            $inscription->annee_id        = isset($request->année_id) ? $request->année_id : $inscription->annee_id;  

            $inscription->tarif           = isset($request->tarif) ? $request->tarif : $inscription->tarif;       
            $inscription->modalité        = isset($request->modalité) ? $request->modalité : $inscription->modalité;               
            $inscription->transport       = isset($request->transport) ? $request->transport : $inscription->transport;                
            $inscription->cantine         = isset($request->cantine) ? $request->cantine : $inscription->cantine;               
            $inscription->description     = isset($request->description) ? $request->description : $inscription->description;
         $inscription->save();

        return redirect('/inscriptions')->with('warning','Inscription est modifié avec succès');
    }

    public function destroy(Request $request,$id){

        $inscription = Inscription::find($id);
        $inscription->delete();

        return redirect('/inscriptions')->with('error','Inscription est supprimé avec succès');
        
    }

    public function show($id){

        $detail = $this->detailEtudiant($id);  
                                          
        return view('inscription.détail',compact('detail'));     
             }

    public function create_renouveler($id){
        dd($id);
        $inscription =   Inscription::find($id);
        $années = Année::all();
        $classes = Classe::all();
        $catégories = Categorie::all();
        $niveaux = Niveau::all();
        $etudiant = Etudiant::where('id',$inscription->etudiant_id)->first();
        $user = User::where('id',$etudiant->id)->first();
        dd($user);
        //return view('inscription.renouveler',compact('années','classes','catégories','niveaux','inscription','user','etudiant'));
    }

    public function search_inscription(Request $request){

        $email = $request->email;
        $num_inscription = $request->num_inscription;
        $années = Année::all();
        $classes = Classe::all();
        $catégories = Categorie::all();
        $niveaux = Niveau::all();
        $data=[]; 

       if(isset($email)){
                        
            $user = User::where('email',$email)->first();  
            
            if( (!$user) ){
                return back()->with("error","Opss ! Compte n'existe pas " );        
            }

            else if($user) { 
                $etudiant = Etudiant::where('user_id',$user->id)->first(); 
                $inscription = Inscription::where('etudiant_id',$etudiant->id)->first();
                $detail = $this->detailEtudiant($inscription->id);
            } 

        }     

        if(isset($num_inscription)) {

            $inscription = Inscription::where('num_inscription',$num_inscription)->with('classes','categories','niveaus','années')->first(); 

            if( (!$inscription) ){
                return back()->with("error","Opss ! Compte n'existe pas " );        
            } 

            else if($inscription){
                $detail = $this->detailEtudiant($inscription->id);  
            }             
        }         

        return view('inscription.détail',compact('detail'));     
    }

    public function update_renouveler(Request $request){

        $inscription = Inscription::find($request->id);        
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

            $inscriptions                  = new Inscription();         
            $inscriptions->etudiant_id     = $etudiant->id; 
            $inscriptions->num_inscription = isset($request->num_inscription) ? $request->num_inscription : $inscription->num_inscription;  
            $inscriptions->niveau_id       = isset($request->niveau_id) ? $request->niveau_id : $inscription->niveau_id;  
            $inscriptions->categorie_id    = isset($request->categorie_id) ? $request->categorie_id : $inscription->categorie_id;  
            $inscriptions->classe_id       = isset($request->classe_id) ? $request->classe_id : $inscription->classe_id;    
            $inscriptions->annee_id        = isset($request->année_id) ? $request->année_id : $inscription->annee_id;  

            $inscriptions->tarif           = isset($request->tarif) ? $request->tarif : $inscription->tarif;       
            $inscriptions->modalité        = isset($request->modalité) ? $request->modalité : $inscription->modalité;               
            $inscriptions->transport       = isset($request->transport) ? $request->transport : $inscription->transport;                
            $inscriptions->cantine         = isset($request->cantine) ? $request->cantine : $inscription->cantine;               
            $inscriptions->description     = isset($request->description) ? $request->description : $inscription->description;
         $inscriptions->save();

        return redirect('/inscriptions')->with('warning','Inscription est renouvelé avec succès');
    }         


    public function detailEtudiant($id){

        $inscription = json_decode(Inscription::find($id),true); 
        $annee = json_decode(Année::where('id',$inscription['annee_id'])->first(),true);
        $classe =json_decode(Classe::where('id',$inscription['classe_id'])->first(),true);
        $categorie = json_decode(Categorie::where('id',$inscription['categorie_id'])->first(),true);
        $niveau = json_decode(Niveau::where('id',$inscription['niveau_id'])->first(),true);
        $etudiant = json_decode(Etudiant::where('id',$inscription['etudiant_id'])->first(),true);
        $user = json_decode(User::where('id',$etudiant['id'])->first(),true); 

        $historiquePayements = json_decode(Payment::where('inscription_id',$inscription['id'])
                                                ->where('annee_id',$inscription['annee_id'])->get(),true);
        /*
        $historiqueAbsences = json_decode(Absence::where('annee_id',$inscription['annee_id'])
                                                ->where('etudiant_id',$inscription['etudiant_id'])
                                                ->where('classe_id',$inscription['classe_id'])->with('matieres','professeurs.users')->get(),true);
        $historiqueNotes = json_decode(Note::where('annee_id',$inscription['annee_id'])
                                                ->where('etudiant_id',$inscription['etudiant_id'])
                                                ->where('classe_id',$inscription['classe_id'])->with('classes','matieres','professeurs.users')->get(),true);
        */
        $sum_payement = Payment::where('inscription_id','=',$id)
                               ->where('annee_id','=',$inscription['annee_id'])
                               ->where('etudiant_id','=',$inscription['etudiant_id'])->sum('versement');
        $detail = [];
        $detail['inscription']= $inscription;                               
        $detail['etudiant']= $etudiant;                               
        $detail['user']= $user;                               
        $detail['annee']= $annee;                                  
        $detail['categorie']= $categorie;                           
        $detail['niveau']= $niveau;                               
        $detail['classe']= $classe;  
        $detail['historiquePayements']= $historiquePayements;  
        //$detail['historiqueAbsences']= $historiqueAbsences;  
        //$detail['historiqueNotes']= $historiqueNotes;  
        $detail['sum_payement']= $sum_payement;  

        return $detail; 
    }
}