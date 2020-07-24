<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Payment;
use App\Inscription;
use App\Année;

class PaymentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $payments = Payment::with('etudiants.users','inscriptions','années')->get();
        //dd($payments);
        return view('payment.index',compact('payments'));
    }

    public function show($id){

        $payment = Payment::where('id',$id)->with('etudiants.users','inscriptions','années')->first();
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
        $etudiants    = $request->etudiant_id;  
        $inscription   = $request->inscription_id;        
        $année        = $request->annee_id;
        $versement    = $request->versement;    
        $mois         = $request->mois;   
        $mode         = $request->mode;         
        $descriptions = $request->description; 
        
        foreach($etudiants as $key => $etudiant){ 

            if(isset($versement[$key])){       
                $payment                 = new Payment(); 
                $payment->etudiant_id    = $etudiant;    
                $payment->inscription_id = $inscription[$key];    
                $payment->annee_id       = $année[$key];        
                $payment->versement      = $versement[$key];
                $payment->mois           = $mois[$key]; 
                $payment->mode           = $mode[$key]; 
                $payment->description    = $descriptions[$key];
                $payment->save(); 
            }
        }        
         
        return back()->with('success','Payment est bien ajouté !');
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
        $payment->mois            = $request->mois;
        $payment->mode            = $request->mode;
        $payment->description     = $request->description;        
        $payment->save();

        return redirect()->to('inscription/'.$request->inscription_id)->with('warning','Payement est modifié avec succès');

    }

    public function destroy(Request $request,$id){

        $payment = Payment::find($id);
        $payment->delete();

        return redirect('/payments')->with('error','Payement est supprimé avec succès');        
    }

    public function getPaymentsEtudiant($id=11,$annee_id=1){
        $payments = json_decode(Payment::where('etudiant_id',$id)->where('annee_id',$annee_id)->with('années','inscriptions.niveaus','inscriptions.categories','inscriptions.classes','etudiants.users')->get(),true); 
        return $payments;
    }

     public function getPaymentsEtudiantEp($id=11,$annee_id=1){

        $payments = $this->getPaymentsEtudiant($id,$annee_id);
        $sumPayment = Payment::where('etudiant_id',$id)->where('annee_id',$annee_id)->sum('versement');
        $info = $payments[0]['inscriptions'];
        //dd($info); 
        return view('payment.etudiantEp',compact('payments','sumPayment','info'));
    }

}
