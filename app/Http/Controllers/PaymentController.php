<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Payment;
use App\Inscription;
use App\Année;

class PaymentController extends Controller
{
    public function index()
    {
        $payments = Payment::with('etudiants','inscriptions')->get();
        return view('payment.index',compact('payments'));
    }

    public function show($id){

        $payment = Payment::where('id',$id)->with('etudiants','inscriptions')->first();
        return view('payment.show',['payment'=>$payment]);
    }

    public function create(){
        $inscriptions= Inscription::with('classes','categories','niveaus','etudiants','années')->get(); 
        //dd($inscriptions);
        return view('payment.new',compact('inscriptions'));
    }
    
    public function form_payment(Request $request,$id){
 
        $inscription = Inscription::where('id',$id)->with('classes','categories','niveaus','etudiants','années')->first(); 
        $sum = Payment::where('inscription_id','=',$id)->sum('versement');
        //dd($sum);
        $années = Année::all();

        return view('payment.insert',compact('inscription','années','sum'));
    }

    public function store(Request $request){
        //dd($request);
        $payment                  = new payment();  
        $payment->etudiant_id     = $request->etudiant_id;
        $payment->annee_id        = $request->annee_id;
        $payment->inscription_id  = $request->inscription_id;   
        $payment->versement       = $request->versement;
        $payment->mode            = $request->mode;
        $payment->description     = $request->description;
        
        $payment->save();

        return redirect('payments');
    }

    public function edit($id){

        $payment = Payment::find($id);
        $inscription = Inscription::where('id',$payment->inscription_id)->with('classes','categories','niveaus','etudiants','années')->first(); 
        $sum = Payment::where('inscription_id','=',$id)->sum('versement');
        $années = Année::all();

        return view('payment.edit',compact('inscription','années','sum','payment'));
    }
    
    public function update(Request $request,$id){
        
 
        $payment                  = Payment::where('id',$id)->first();
        $payment->etudiant_id     = $request->etudiant_id;
        $payment->annee_id        = $request->annee_id;
        $payment->inscription_id  = $request->inscription_id;           
        $payment->versement       = $request->versement;
        $payment->mode            = $request->mode;
        $payment->description     = $request->description;        
        $payment->save();

        return redirect('/payments');
    }

    public function destroy(Request $request,$id){

        $payment = Payment::find($id);
        $payment->delete();

        return redirect('/payments');        
    }
}
