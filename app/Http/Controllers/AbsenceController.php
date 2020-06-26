<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Année;
use App\Classe;
use App\Matiere;
use App\Inscription;
use App\User;
use App\Absence;

class AbsenceController extends Controller
{
	public function create()
    {         
        $matieres = Matiere::all(); 
        $années   = Année::all();
        $classes  = Classe::all();

        return view('absence.new',compact('matieres','années','classes'));
    }

    public function form_search(Request $request)
    {   //dd($request);
		$année_id   = $request->année_id;
		$classe_id  = $request->classe_id;		
		$matiere_id = $request->matiere_id;	

		$data = json_decode(Inscription::where('classe_id',$classe_id)->where('annee_id',$année_id)->with('etudiants')->get(),true);
		//dd(json_decode($data,true));
         return view('absence.classe',compact('data','matiere_id','année_id','classe_id'));
    }

    public function store(Request $request)
    {   //dd($request); 
   		$etudiants 	  = $request->etudiant_id;              
   		$absences     = $request->absence;              
        $observations = $request->observation;  
        $debutseance  = $request->debutseance;  
   		$finseance    = $request->finseance;  
		$matiere_id   = $request->matiere_id;	
		$année_id     = $request->année_id;
		$classe_id    = $request->classe_id;

        //dd($request,$observations,$absences);  
        
        foreach($etudiants as $key => $etudiant){ 
	        
	         if(isset($absences[$key])){       

		        $absence = new Absence(); 
		        $absence->etudiant_id   = $etudiant;    
		        $absence->professeur_id = $request->input('professeur_id');    
		        $absence->matiere_id	= $request->input('matiere_id');    
		        $absence->annee_id 		= $request->input('année_id');        
		        $absence->classe_id 	= $request->input('classe_id');
		        $absence->absence 		= $absences[$key];  
		        $absence->observation 	= $observations[$key];
		        $absence->debutseance 	= $debutseance[$key]; 
		        $absence->finseance 	= $finseance[$key]; 
		        $absence->save(); 
		    }
    	}

       // dd($absence);
    	return redirect('/dashboard');
    }    

    public function claase()
    {         
        $matieres = Matiere::all(); 
        $années   = Année::all();
        $classes  = Classe::all();

        return view('absence.classe',compact('matieres','années','classes'));
    }

    public function index()
    {          
        $absences  = json_decode(Absence::with('matieres','années','classes','professeurs','etudiants')->get(),true);
        //	dd($absences);
        return view('absence.index',compact('absences'));
    }

    public function show($id){

        $absence 	= json_decode(Absence::where('id',$id)->with('matieres','années','classes','professeurs','etudiants')->first(),true);
        $user 	    = json_decode(User::findOrfail($absence['etudiants']['user_id']),true);
        $professeur = json_decode(User::find($absence['professeurs']['user_id']),true);
        //dd($professeur);	
        return view('absence.show',['absence' => $absence , 'user' => $user ,'professeur' => $professeur]);
    }

        public function edit($id){

        $absence = json_decode(Absence::where('id',$id)->with('matieres','années','classes','professeurs','etudiants')->first(),true);        
        $matieres = Matiere::all(); 
        $années   = Année::all();
        $classes  = Classe::all();
 		//dd($absence);
        return view('absence.edit',compact('absence','matieres','années','classes'));
    }
    
    public function update(Request $request,$id){
        //dd($request);
 
        $absence = Absence::where('id',$id)->with('matieres','années','classes','professeurs','etudiants')->first();        
        
//        dd($absence);

        $absence->etudiant_id   = isset($request->etudiant_id)? $request->etudiant_id : $absence->etudiant_id;    
        $absence->professeur_id = isset($request->professeur_id)? $request->professeur_id : $absence->professeur_id;    
        $absence->matiere_id	= isset($request->matiere_id)? $request->matiere_id : $absence->matiere_id;    
        $absence->annee_id 		= isset($request->annee_id)? $request->annee_id : $absence->annee_id;        
        $absence->classe_id 	= isset($request->classe_id)? $request->classe_id : $absence->classe_id;
        $absence->absence 		= isset($request->absence)? $request->absence : $absence->absence;  
        $absence->observation 	= isset($request->observation)? $request->observation : $absence->observation;
        $absence->debutseance 	= isset($request->debutseance)? $request->debutseance : $absence->debutseance; 
        $absence->finseance 	= isset($request->finseance)? $request->finseance : $absence->finseance; 
        $absence->save(); 

        return redirect('/absences');
    }

    public function destroy(Request $request,$id){

        $absence = Absence::find($id);
        $absence->delete();

        return redirect('/absences');        
    }

    public function getAbsencesEtudiant($id=11,$annee_id=1){
        $absences = json_decode(Absence::where('etudiant_id',$id)->where('annee_id',$annee_id)->with('années','professeurs.users','etudiants.users','classes','matieres')->get(),true); 
        return $absences;
    }

     public function getAbsencesEtudiantEp($id=11,$annee_id=1){

        $absences = $this->getAbsencesEtudiant($id,$annee_id);
        //dd($absences[0]); 
        return view('absence.etudiantEp',compact('absences'));
    }
}
