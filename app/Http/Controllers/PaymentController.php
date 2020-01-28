<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Payement;

class PaymentController extends Controller
{
    public function index()
    {
        $payements = Payement::all();
        return view('payment.index',compact('payements'));
    }

    public function create(){
     
        return view('payement.new');
    }

    public function store(Request $request){
        
        $payement                  = new Payement();  
        $payement->etudiant_id     = $request->etudiant_id;
        $payement->année_id        = $request->année_id;
        $payement->versement       = $request->versement;
        $payement->montantpayé     = $request->montantpayé;
        $payement->mode            = $request->mode;
        $payement->description     = $request->description;


        $payement->save();

        return redirect('payements');
    }

    public function edit($id){

        $payement = Payement::find($id);
        return view('payement.edit',['payement'=>$payement]);
    }
    
    public function update(Request $request){
        
        $payement                  = new Payement();  
        $payement->etudiant_id     = $request->etudiant_id;
        $payement->année_id        = $request->année_id;
        $payement->versement       = $request->versement;
        $payement->montantpayé     = $request->montantpayé;
        $payement->mode            = $request->mode;
        $payement->description     = $request->description;

        
        $payement->save();

        return redirect('/payements');
    }

    public function destroy(Request $request,$id){

        $payement = Payement::find($id);
        $payement->delete();

        return redirect('/payements');
        
    }
}
