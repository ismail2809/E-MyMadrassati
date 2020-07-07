<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Note;
use App\Matiere;
use App\Classe;
use App\Année;
use App\Inscription;
use App\User;
use Illuminate\Support\Facades\Session;

class NoteController extends Controller
{  
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function show($id){

        $result = json_decode(Note::find($id)->with('années','classes','etudiants.users','professeurs.users','matieres')->first(),true);
        //dd($result);       
        return view('note.show',['result'=>$result]);
    }

	public function index(){

        $notes =  json_decode(Note::with('années','classes','etudiants.users','professeurs.users','matieres')->get(),true);  
        //dd($notes);
         return view('note.index',compact('notes'));
    }

    public function store(Request $request){
        
        $note                = new Note(); 
        $note->etudiant_id   = $request->input('etudiant_id');                 
        $note->professeur_id = $request->input('professeur_id');          
        $note->classe_id     = $request->input('classe_id');          
        $note->annee_id      = $request->input('annee_id');          
        $note->matiere_id    = $request->input('matiere_id');          
        $note->note          = $request->input('note');          
        $note->observation   = $request->input('observation');        
        $note->save();
        
        return redirect('/notes');
    }

    public function edit($id){

        $note     = json_decode(Note::where('id',$id)->with('matieres','etudiants.users','professeurs.users','années','classes')->first(),true);
        $matieres = Matiere::all(); 
        $années   = Année::all();
        $classes  = Classe::all();
        //dd($note);
        return view('note.edit',compact('note','matieres','années','classes'));
    }
    
    public function update($id,Request $request){
        
        $note 			 	 = Note::find($id);        
        $note->etudiant_id 	 = $request->input('etudiant_id');                 
		$note->professeur_id = $request->input('professeur_id');          
		$note->classe_id 	 = $request->input('classe_id');          
		$note->année_id 	 = $request->input('année_id');          
		$note->matiere_id 	 = $request->input('matiere_id');          
		$note->note 		 = $request->input('note');          
		$note->absence 	 	 = $request->input('absence');       
        $note->save();

        return redirect('/notes');
    }

    public function destroy(Request $request,$id){

        $note = Note::find($id);
        $note->delete();

        return redirect('/notes');
        
    }

    public function getCategories(){
        $categories = json_decode(Inscription::select('categorie_id','niveau_id','classe_id')->with('categories','niveaus','classes')->groupby('categorie_id','niveau_id','classe_id')->get(),true);
        $niveaux = json_decode(Inscription::select('niveau_id')->with('niveaus')->groupby('niveau_id')->get(),true);
        $classes = json_decode(Inscription::select('classe_id')->with('classes')->groupby('classe_id')->get(),true);
        dd($categories,$niveaux,$classes);
    }

    public function getNotesEtudiant($id=11,$annee_id=1){
        $notes = json_decode(Note::where('etudiant_id',$id)->where('annee_id',$annee_id)->with('années','professeurs.users','etudiants.users','classes','matieres')->get(),true); 
        return $notes;
    }

     public function getNotesEtudiantEp($id=11,$annee_id=1){

        $notes = $this->getNotesEtudiant($id,$annee_id);
        //dd($notes); 
        return view('note.etudiantEp',compact('notes'));
    }
    
    public function storeNote(Request $request){

         //dd($request); 
        $etudiants    = $request->etudiant_id;  
        $professeur   = $request->professeur_id;        
        $matiere_id   = $request->matiere_id;   
        $année        = $request->annee_id;
        $classe       = $request->classe_id;           
        $observations = $request->observation;  
        $notes         = $request->note;  
        
        foreach($etudiants as $key => $etudiant){ 

             if(isset($notes[$key])){       

                $note = new Note(); 
                $note->etudiant_id   = $etudiant;    
                $note->professeur_id = $professeur[$key];    
                $note->matiere_id    = $request->input('matiere_id');    
                $note->annee_id      = $année[$key];        
                $note->classe_id     = $classe[$key];
                $note->observation   = $observations[$key];
                $note->note          = $notes[$key]; 
                $note->save(); 
            }
        }        
         
        return back()->with('success','Note est bien ajouté !');
    }

    public function getListNotesEtudiants(){
        $année = 1;
        $etudiants = json_decode(Inscription::where('annee_id',$année)->groupBy('etudiant_id')->get(),true);
        //dd($etudiants);

             foreach ($etudiants as $key => $etudiant) {
                $listNotes[] =  json_decode(Note::where('etudiant_id',$etudiant['etudiant_id'])->where('annee_id',$année)->with('etudiants.users','professeurs.users','matieres','années','classes')->get(),true);      
                //$listNotes[] = count($listNotes);     
            }

        //dd($listNotes);
        return view('note.liste_notes_etudiant',compact('listNotes'));

    }


   /* public function form_note(Request $request)
    {   
        $data = $request->session()->get('data');
        $inscription = json_decode(Inscription::where('classe_id',$data['classe'])->where('annee_id',$data['année'])->with('années','classes','etudiants.users')->first(),true); 
        
        return view('note.addnote',compact('inscription','data'));
    }

        public function create(){

        $matieres = Matiere::all(); 
        $années   = Année::all();
        $classes  = Classe::all();

        return view('note.new',compact('matieres','années','classes'));
    }

    public function form_search(Request $request)
    { 
        $année_id   = $request->année_id;
        $classe_id  = $request->classe_id;      
        $matiere_id = $request->matiere_id; 

        $matiere     = json_decode(Matiere::find($matiere_id)->first(),true);
        $inscription = json_decode(Inscription::where('classe_id',$classe_id)->where('annee_id',$année_id)->with('années','classes','etudiants')->get(),true);
        $data        = ['matiere' => $matiere ,'classe' => $classe_id ,'année' => $année_id ]; 
        //vider session
        $request->session()->flush();
        $request->session()->put('data',$data);

        return view('note.classe',compact('data' ,'inscription'));
    }
    
      public function list_notes_etudiant($id,$matiere_id,Request $request){

        $data    = $request->session()->get('data');
        $inscription = json_decode(Inscription::where('etudiant_id',$id)->first(),true);
        $notes   = json_decode(Note::where('etudiant_id',$id)->where('matiere_id',$matiere_id)->
                                     where('classe_id',$data['classe'])->where('annee_id',$data['année'])->
                                     with('années','classes','etudiants.users','matieres')->get(),true);

        $results = ['inscription' => $inscription ,'note' => $notes];
        dd($id,$results,$matiere_id,$data['classe'],$data['année']);
         return view('note.liste_notes_etudiant',['results'=>$results]);    
    }*/

}
