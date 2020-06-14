@extends('back.master') 
@section('title','Absence')
@section('content')
<div class="row">
	<div class="col-md-12">
	  <div class="card">

	    <div class="card-header card-header-info card-header-icon">
              <div class="card-icon">
                <i class="material-icons">assignment</i>
              </div>
		      <h3 class="card-title text-center">Absences</h3>
        </div>

		    <div class="card-body">
		        <div class="table-responsive">
	                  <table class="table">
	                    <thead class=" text-primary">
			            <tr>
	 		              <th class="text-center" style="color: grey">Professeur</th>
			              <th class="text-center" style="color: grey">Classe</th>
			              <th class="text-center" style="color: grey">Matière</th>
		 	              <th class="text-center" style="color: grey">Début seance</th>  	              
			              <th class="text-center" style="color: grey">Fin seance</th> 
		  	              <th class="text-center" style="color: grey">Absence</th> 	              
			              <th class="text-center" style="color: grey">observation</th>  	              
			              <th class="text-center" style="color: grey">Date</th>  
			              <th class="text-center" style="color: grey">Année</th>   
			            </tr>
			          </thead> 
			          
			          <tbody>	 				
		 				@foreach($absences as $key => $absence)
		 	            <tr>
	 		              <td class="text-center" ><b>{{ $absence['professeurs']['users']['prenom'] }} {{ $absence['professeurs']['users']['prenom'] }}</b></td> 
			              <td class="text-center" ><b>{{ $absence['classes']['titre'] }}</b></td> 
			              <td class="text-center" ><b>{{ $absence['matieres']['titre'] }}</b></td> 	
			              <td class="text-center" ><b>{{ $absence['debutseance'] }}</b></td> 	
			              <td class="text-center" ><b>{{ $absence['finseance'] }}</b></td> 	
			              <td class="text-center" ><b>{{ $absence['absence'] }}</b></td> 	
			              <td class="text-center" ><b>{{ $absence['observation'] }}</b></td> 
			              <td class="text-center" ><b>{{ \Carbon\Carbon::parse($absence['created_at'])->format('d-m-Y')  }}</b></td> 
			              <td class="text-center" ><b>{{ $absence['années']['titre'] }}</b></td> 		              
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