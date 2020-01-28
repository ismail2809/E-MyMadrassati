<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Niveau;

class NiveauController extends Controller
{
    public function create(){

    	return view('niveau.new'); 
    }

    public function store(Request $request){
		
		$niveau 			 = new Niveau(); 
		$niveau->titre 		 = $request->input('titre');                 
		$niveau->description = $request->input('description');          
		$niveau->type_id 	 = $request->input('type_id');        
        $niveau->save();
        
		return redirect('/niveaux');
	}

	public function index(){

        $niveaus = Niveau::all();
        
        return view('niveau.index',compact('niveaus'));
    }

    public function edit($id){

        $niveau =   Niveau::find($id);
        
        return view('niveau.edit',['niveau'=>$niveau]);
    }
    
    public function update(Request $request){
        
        $niveau 			 = Niveau::find($id);        
        $niveau->titre 		 = $request->input('titre');                 
		$niveau->description = $request->input('description');          
		$niveau->type_id 	 = $request->input('type_id');        
        $niveau->save();

        return redirect('/niveaux');
    }

    public function destroy(Request $request,$id){

        $niveau = Niveau::find($id);
        $niveau->delete();

        return redirect('/niveaux');
        
    }
}
