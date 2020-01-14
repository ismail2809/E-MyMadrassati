<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Année;

class AnnéeController extends Controller
{
   public function index()
    {
        $années = Année::all();
        return view('année.index',compact($années));
    }

    public function create()
    { 
        return view('année.new');
    }
    
    public function store(Request $request){
        
        $Année              = new Année();
        $année->Année = $request->Année;        
        $année->save();

        return redirect('année');
    }

    public function edit($id){

        $année = Année::find($id);
        return view('année.edit',['année'=>$année]);
    }
    
    public function update(Request $request,$id){
        
        $Année  = Année::find($id);
        $année->Année = $request->Année;        
        $année->save();

        return redirect('/années');
    }

    public function destroy(Request $request,$id){

        $année=année::find($id);
        $année->delete();

        return redirect('/années');
        
    }
}
