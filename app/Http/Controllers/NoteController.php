<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Note;

class NoteController extends Controller
{
    public function create(){

    	return view('note.new'); 
    }

    public function store(Request $request){
		
		$note 			 	 = new Note(); 
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

	public function index(){

        $notes = Note::all();
        
        return view('note.index',compact('notes'));
    }

    public function edit($id){

        $note =   Note::find($id);
        
        return view('note.edit',['note'=>$note]);
    }
    
    public function update(Request $request){
        
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
}
