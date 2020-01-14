<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Inscription;
use App\Classe;
use App\Année;
use App\Etudiant;

class InscriptionController extends Controller
{
	public function create(){

    	return view('inscription.new'); 
    }

    public function store(Request $request){
		
		$inscription 			  = new Inscription(); 
		$inscription->etudiant_id = $request->input('etudiant_id'); 
		$inscription->classe_id   = $request->input('classe_id');		
		$inscription->année_id 	  = $request->input('année_id'); 	  
 		$inscription->total_frais = $request->input('total_frais');         
		$inscription->modalité 	  = $request->input('modalité');                 
		$inscription->description = $request->input('description');         
        $inscription->save();
        
		return redirect('/home')->with('success','Inscription faites avec succès !');
	}

	public function index(){

        $inscriptions = Inscription::all();
        
        return view('inscription.index',compact($inscriptions));
    }

    public function edit($id){

        $inscription =   Inscription::find($id);
        
        return view('inscription.edit',['inscription'=>$inscription]);
    }
    
    public function update(Request $request){
        
        $inscription = Inscription::find($id);        
        $inscription->etudiant_id = $request->input('etudiant_id'); 
		$inscription->classe_id   = $request->input('classe_id');		
		$inscription->année_id 	  = $request->input('année_id'); 	  
 		$inscription->total_frais = $request->input('total_frais');         
		$inscription->modalité 	  = $request->input('modalité');                 
		$inscription->description = $request->input('description');       
        $inscription->save();

        return redirect('/inscriptions');
    }

    public function destroy(Request $request,$id){

        $inscription = Inscription::find($id);
        $inscription->delete();

        return redirect('/inscription');
        
    }
}
