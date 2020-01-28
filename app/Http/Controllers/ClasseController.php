<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classe;
use App\Niveau;

class ClasseController extends Controller
{
    public function index()
    {
        $classes = Classe::all();
        return view('classe.index',compact('classes'));
    }

    public function create()
    { 
        $niveaux = Niveau::all();
        //dd($niveaux);               
        return view('classe.new',compact('niveaux'));
    }

    public function store(Request $request){
        
        $classe         = new Classe();
        $classe->titre = $request->titre;        
        $classe->description = $request->description;        
        $classe->niveau_id = $request->niveau_id;        
        $classe->save();

        return redirect('/classes');
    }

    public function edit($id){

        $classe = Classe::find($id);
        return view('classe.edit',['classe'=>$classe]);
    }
    
    public function update(Request $request){
        
        $classe        = Classe::find($id);
        $classe->titre = $request->titre; 
        $classe->description = $request->description;        
        $classe->niveau_id = $request->niveau_id;        
        $classe->save();

        return redirect('/classes');
    }

    public function destroy(Request $request,$id){

        $classe = Classe::find($id);
        $classe->delete();

        return redirect('/classes');        
    }
}
