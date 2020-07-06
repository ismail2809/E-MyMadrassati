<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categorie;
use App\Inscription;
use App\Matiere;
use Illuminate\Support\Facades\Session;

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
        $categories = Inscription::groupBy('categorie_id')->with('categories')->get();
        //dd($categories[0]);
        return view('categorie.mesCatégories',compact('categories'));
    }

    public function mesClasses($id){

        $annee_id = 1;
        $inscriptions = json_decode(Inscription::select('classe_id','niveau_id','categorie_id','annee_id')->where('categorie_id','=',$id)->where('annee_id','=',$annee_id)->with('categories','classes','années','niveaus')->groupBy('classe_id')->get(),true);

        $classes = array();
        //dd($inscriptions);
        foreach ($inscriptions as $key =>$inscription) {

        $nbrEtudiants = Inscription::where('categorie_id',$id)->where('classe_id',$inscription['classe_id'])
                                   ->where('annee_id',$annee_id)->count('etudiant_id');
           

        $data[] =   ['categories' => $inscription['categories']['titre'],
                     'année'  => $inscription['années']['titre'],
                     'niveau' => $inscription['niveaus']['titre'],
                     'classe' => $inscription['classes']['titre'],
                     'id_classe' => $inscription['classes']['id'],
                     'nbrEtudiants' => $nbrEtudiants
                    ];   
        $classes = $data;                                        

        }        
        return view('categorie.mesClasses',compact('classes'));
    }

     public function mesEtudiants($id){ 

        $etudiants = json_decode(Inscription::where('classe_id',$id)->where('annee_id',1)
                                    ->with('categories','classes','années','niveaus','etudiants.users')->get(),true);

        // Session::forget('etudiants');
        // Session::push('etudiants',$etudiants);

        return view('categorie.mesEtudiants',compact('etudiants'));
    }

    public function absenceEtudiants($id){        

        $matieres  = Matiere::all(); 
        $etudiants = json_decode(Inscription::where('classe_id',$id)->where('annee_id',1)
                                    ->with('categories','classes','années','niveaus','etudiants.users')->get(),true);

        return view('categorie.absence',compact('matieres','etudiants'));
    }

    public function noteEtudiants($id){

        $matieres  = Matiere::all(); 
        $etudiants = json_decode(Inscription::where('classe_id',$id)->where('annee_id',1)
                                    ->with('categories','classes','années','niveaus','etudiants.users')->get(),true);
 
        return view('categorie.note',compact('matieres','etudiants'));
    }
}
