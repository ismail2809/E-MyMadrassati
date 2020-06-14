<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classe; 

class ClasseController extends Controller
{
    public function index()
    {
        $classes = Classe::all();
        return view('classe.index',compact('classes'));
    }

    public function create()
    {     
        return view('classe.new');
    }

    public function store(Request $request){
        
        $classe         = new Classe();
        $classe->titre = $request->titre;        
        $classe->description = $request->description;        
        $classe->save();

        return redirect('/classes')->with('success','Classe est ajoutée avec succès');
    }

    public function edit($id){

        $classe = Classe::find($id);
        return view('classe.edit',['classe'=>$classe]);
    }
    
    public function update($id,Request $request){
        
        $classe        = Classe::find($id);
        $classe->titre = $request->titre; 
        $classe->description = $request->description;        
        $classe->save();

        return redirect('/classes')->with('warning','Classe est modifiée avec succès');
    }

    public function destroy(Request $request,$id){

        $classe = Classe::find($id);
        $classe->delete();

        return redirect('/classes')->with('error','Classe est supprimée avec succès');        
    }
}
