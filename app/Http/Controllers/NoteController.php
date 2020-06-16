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

    public function list_notes_etudiant($id,Request $request){
        //dd($id);
        $data    = $request->session()->get('data');
        $result1 = json_decode(Inscription::where('etudiant_id',$id)->with('années','classes','etudiants')->first(),true);
        $result2 = json_decode(Note::where('etudiant_id',$result1['etudiant_id'])->where('matiere_id',$data['matiere']['id'])->where('classe_id',$data['classe'])->where('annee_id',$data['année'])->with('années','classes','etudiants')->get(),true);
        //sdd($result2);
        $user    = json_decode(User::find($result1['etudiants']['user_id']),true);
        $results = ['inscription' => $result1 ,'user' => $user ,'note' => $result2 , 'matiere' => $data['matiere']];
        //dd($results);
         return view('note.liste_notes_etudiant',['results'=>$results]);    
    }

     public function show($id){

        $result = json_decode(Note::find($id)->with('années','classes','etudiants.users','professeurs.users','matieres')->first(),true);
        //dd($result);       
        return view('note.show',['result'=>$result]);
    }

    public function form_note(Request $request)
    {   
        $data = $request->session()->get('data');
        $inscription = json_decode(Inscription::where('classe_id',$data['classe'])->where('annee_id',$data['année'])->with('années','classes','etudiants')->first(),true);
        //dd($data,$inscription);
        
        return view('note.addnote',compact('inscription','data'));
    }

	public function index(){

        $notes =  json_decode(Note::with('années','classes','etudiants')->get(),true);        
        
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

        $note =   Note::find($id);
        
        return view('note.edit',['note'=>$note]);
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
    
}
