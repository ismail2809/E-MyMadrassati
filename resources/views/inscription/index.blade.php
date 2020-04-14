@extends('back.master')
@section('title','Liste Inscription')

@section('content') 

<div class="row">
	<div class="col-md-12">
	  <div class="card">
	    <div class="card-header card-header-primary card-header-icon">
	      <div class="card-icon">
	        <i class="material-icons">assignment</i>
	      </div>
	      <h4 class="card-title">Liste des inscriptions</h4>
	    </div>
	    <div class="card-body">
	      <div class="toolbar">
	        <!--        Here you can write extra buttons/actions for the toolbar              -->
	      </div>
	      <div class="material-datatables">
	        <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
	          <thead>
	            <tr>
	              <th>Numero d'inscription</th>
	              <th>Prénom Nom</th>
	              <th>Catégorie</th>
	              <th>Niveau</th>
	              <th>Classe</th>
	              <th>Tarif</th>
	              <th>Année</th>  
	              <th>Création</th>  
	              <th class="disabled-sorting text-right">Actions</th>
	            </tr>
	          </thead> 
	          <tbody>
	            @foreach($inscriptions as $inscription)
	            <tr>
	              <td>{{ $inscription->num_inscription }}</td> 
	              <td>{{ $inscription->etudiant_id }}</td> 
	              <td>{{ $inscription->categorie_id }}</td>
	              <td>{{ $inscription->niveau_id }}</td> 
	              <td>{{ $inscription->classe_id }}</td> 
	              <td>{{ $inscription->tarif }}</td> 
	              <td>{{ $inscription->année_id }}</td> 
	              <td>{{ $inscription->created_at->format('d-m-Y') }}</td> 
	               <td class="td-actions text-right">
	                <button type="button" rel="tooltip" class="btn btn-info btn-round">
	                  <i class="material-icons">person</i>
	                </button>
	                <button type="button" rel="tooltip" class="btn btn-success btn-round">
	                  <i class="material-icons">edit</i>
	                </button>
	                <button type="button" rel="tooltip" class="btn btn-danger btn-round">
	                  <i class="material-icons">close</i>
	                </button>
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