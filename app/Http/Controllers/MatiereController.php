<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Matiere;

class MatiereController extends Controller
{
      public function index()
    {
        $matieres = Matiere::all();
        return view('matiere.index',compact('matieres'));
    }

    public function create()
    { 
        return view('matiere.new');
    }
    
    public function store(Request $request){
        
        $matiere              = new matiere();
        $matiere->titre = $request->titre;        
        $matiere->description = $request->description;        
        $matiere->save();

        return redirect('matiere');
    }

    public function edit($id){

        $matiere = matiere::find($id);
        return view('matiere.edit',['matiere'=>$matiere]);
    }
    
    public function update(Request $request,$id){
        
        $matiere  = matiere::find($id);
        $matiere->titre = $request->titre;        
        $matiere->description = $request->description;          
        $matiere->save();

        return redirect('/matieres');
    }

    public function destroy(Request $request,$id){

        $matiere=matiere::find($id);
        $matiere->delete();

        return redirect('/matieres');
        
    }
}
