@extends('back.master') 
@section('title','Payment')
@section('content')

@php
$mois =['1'=> 'Janvier','2'=> 'Février','3'=> 'Mars','4'=> 'Avril','5'=> 'Mai','6'=> 'Juin',
		'7'=> 'Juillet','8'=> 'Aout','9'=> 'Septembre','10'=>'Octobre','11'=> 'Janvier','12'=> 'Décembre'];     
                                      
@endphp
<div class="row">
	<div class="col-md-12">
	  <div class="card">

	    <div class="card-header card-header-info card-header-icon">
              <div class="card-icon">
                <i class="material-icons">assignment</i>
              </div>
		      <h3 class="card-title text-center">Payments</h3>
        </div>

		    <div class="card-body">

		    	<div class="row text-center"> 

	                    <div class="col-sm-3">                   
	                        <div class="form-group">
	                          <p><label class="bmd-label-floating">Tarif : </label> <b>{{ $info['tarif'] }}</b></p>
	                         </div>
	                    </div> 

	                    <div class="col-sm-3">                   
	                        <div class="form-group">
	                          <p><label class="bmd-label-floating">Modalité : </label> <b>{{ $info['modalité'] }}</b></p>
	                         </div>
	                    </div>

	                    @if($info['transport'] == "Oui")
	                    <div class="col-sm-3">                   
	                        <div class="form-group">
	                          <p><label class="bmd-label-floating">Transport : </label> <b>{{ $info['transport'] }}</b></p>
	                         </div>
	                    </div> 
	                    @endif
	                    
	                    @if($info['cantine'] == "Oui")
	                     <div class="col-sm-3">                   
	                        <div class="form-group">
	                          <p><label class="bmd-label-floating">Cantine : </label> <b>{{ $info['cantine'] }}</b></p>
	                         </div>
	                    </div> 
	                    @endif
				</div>	

		        <div class="table-responsive">
	                  <table class="table">
	                    <thead class=" text-primary">
			            <tr>
	 		              <th class="text-center" style="color: grey">Date Versement</th> 
			              <th class="text-center" style="color: grey">Mois</th>   			
			              <th class="text-center" style="color: grey">Versement</th>
			              <th class="text-center" style="color: grey">Reste à payer</th>
		 	              <th class="text-center" style="color: grey">Montant Payé</th>  	              
			              <th class="text-center" style="color: grey">Mode Paiement</th>
			            </tr>
			          </thead> 
			          
			          <tbody>	 				
		 				@foreach($payments as $payment)
		 	            <tr>
			              <td class="text-center" ><b>{{ \Carbon\Carbon::parse($payment['created_at'])->format('d-m-Y')  }}</b></td> 
			              <td class="text-center" ><b>{{ $mois[$payment['mois']] }}</b></td> 
			              <td class="text-center" ><b>{{ $payment['versement'] }}</b></td> 	
			              <td class="text-center" ><b>{{ $payment['inscriptions']['tarif'] }} - {{ $sumPayment }}</b></td> 	
 			              <td class="text-center" ><b>{{ $payment['description'] }}</b></td> 
			              <td class="text-center" ><b>{{ $payment['mode'] }}</b></td> 		              
			            </tr>          
			            @endforeach
			          </tbody>

			        </table>
			      </div>
			    <!-- end content-->

			     

			  </div>
	  <!--  end card  -->
  		</div>
	<!-- end col-md-12 -->
	</div>
	<!-- end col-md-12 -->
</div> 
 
@endsection	      