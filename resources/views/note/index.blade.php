@extends('back.master') 
@section('title','Toutes les Notes Des Etudiants')
@section('content')

<div class="row">
	<div class="col-md-12">
	  <div class="card">
	    <div class="card-header card-header-warning card-header-icon">
	      <div class="card-icon">
	        <i class="material-icons">assignment</i>
	      </div>
	      <h4 class="card-title">Toutes les Notes Des Etudiants</h4>
	    </div>
	    <div class="card-body">
	      <div class="toolbar">
	        <!--        Here you can write extra buttons/actions for the toolbar              -->
	      </div>
	      <div class="material-datatables"> 

	        <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
	          <thead>
	               <tr>
	              <th style="color: red">Numero d'inscription</th>
	              <th style="color: red">Prénom Nom</th>
	              <th style="color: red">Classe</th>
	              <th style="color: red">Matière</th>   
	              <th style="color: red">Nbr notes</th>   
	              <th style="color: red">Année</th>  
	              <th style="color: red" class="disabled-sorting text-center">Actions</th>
	              <th style="color: red" class="disabled-sorting text-center"></th>
	            </tr>
	          </thead> 
	          <tbody>
	          	@foreach($notes as $result)
	          	
	          		@if(isset($result['etudiants']['user_id']))
              		@php
              		$users = App\User::where('id',$result['etudiants']['user_id'])->get();
                	@endphp

                	@if(isset($result['matiere_id']))
              		@php
              		$matiere = App\Matiere::where('id',$result['matiere_id'])->first();
                	@endphp
			
                	@php
					$inscriptions = json_decode(App\Inscription::where('classe_id',$result['classe_id'])->where('annee_id',$result['annee_id'])->with('années','classes','etudiants')->get(),true);
					@endphp

                	@foreach($users as $user)
		            	@if($result['etudiants']['user_id'] == $user->id)

		            		@foreach($inscriptions as $inscription)
		            			@if($result['etudiants']['id'] == $inscription['etudiant_id'] && $result['années']['id'] == $inscription['annee_id'])
						          
						            <tr>
						              <td>{{ $inscription['num_inscription']}}</td>
						              <td>{{ $user->prenom }} {{ $user->nom }}</td> 
						              <td>{{ $result['classes']['titre'] }}</td>
						              <td>{{ $matiere->titre }}</td>   
						              <td>nbr</td> 
						              <td>{{ $result['années']['titre'] }}</td>
						              <td class="td-actions text-right">
						              	<a href="{{ route('note_add')}}"  class="btn btn-warning btn-round" title="Ajouter note"><i class="material-icons">add</i></a> 
						              </td>
						              <td class="td-actions text-right">
						              	<a href="{{ url('note/'.$result['id'].'/détail') }}"  class="btn btn-info btn-round" title="Détail"><i class="material-icons">remove_red_eye</i></a> 
						              </td>
						            </tr>

			            		@endif
			           		@endforeach 

						@endif
       				@endforeach                    		            
	            		
	            	@endif
	            	@endif

	            @endforeach                    
	          </tbody>
	        </table>
	      </div>
	    </div>
	    <!-- end content-->
	  </div>
	  <!--  end card  -->
	</div>
	<!-- end col-md-12 -->
</div> 
 
@endsection