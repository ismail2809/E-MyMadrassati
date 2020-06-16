@extends('back.master') 
@section('title','Liste des notes')
@section('content')

<div class="row">
	<div class="col-md-12">
	  <div class="card">
	    <div class="card-header card-header-warning card-header-icon">
	      <div class="card-icon">
	        <i class="material-icons">assignment</i>
	      </div>
	      <h4 class="card-title">Liste des notes étudiant</h4>
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
	              <th style="color: red">Notes </th>   
	              <th style="color: red">Année</th>  
	              <th style="color: red" class="disabled-sorting text-center">Actions</th>
	            </tr>
 
	          </thead> 
	          <tbody>
				
				@foreach($results['note'] as $key => $result) 
		            <tr> 
 		              <td>{{ $results['inscription']['num_inscription'] }}</td>
 		              <td>{{ $results['user']['prenom'] }} {{ $results['user']['nom'] }}</td>
		              <td>{{ $results['inscription']['classes']['titre'] }}</td> 					
 		              <td>{{ $results['matiere']['titre'] }}</td> 					
 		              <td>{{ $result['note'] }}</td>  		              
 		              <td>{{ $results['inscription']['années']['titre'] }}</td> 
		              <td class="td-actions text-right">
		              	<a href="{{ url('note/'.$result['id'].'/détail') }}"  class="btn btn-info btn-round" title="Détail"><i class="material-icons">remove_red_eye</i></a> 
		              </td>
		            </tr>    
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