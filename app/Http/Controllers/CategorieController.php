<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categorie;

class CategorieController extends Controller
{
    public function index()
    {
        $categories = Categorie::all();
        return view('categorie.index',compact('categories'));
    }

    public function create()
    { 
        return view('categorie.new');
    }
    
    public function store(Request $request){
        
        $categorie              = new Categorie();
        $categorie->titre       = $request->titre;        
        $categorie->description = $request->description;        
        $categorie->save();
        
        return redirect('categories')->with('success','Catégorie est ajoutée avec succès');
    }

    public function edit($id){

        $categorie = Categorie::find($id);
        return view('categorie.edit',['categorie'=>$categorie]);
    }
    
    public function update(Request $request,$id){
        
        $categorie  = Categorie::find($id);
        $categorie->titre = $request->titre;        
        $categorie->description = $request->description;          
        $categorie->save();

        return redirect('/categories')->with('success','Catégorie est modifiée avec succès');
    }

    public function destroy(Request $request,$id){

        $categorie=Categorie::find($id);
        $categorie->delete();

        return redirect('/categories')->with('success','Catégorie est supprimée avec succès');
        
    }

    public function mesCatégories(){
        $categories = Categorie::all();

        return view('categorie.mesCatégories');
    }

    public function mesClasses(){
        return view('categorie.mesClasses');
    }

     public function mesEtudiants(){
        return view('categorie.mesEtudiants');
    }
}
