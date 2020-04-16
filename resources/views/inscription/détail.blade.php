@extends('back.master')
@section('title','Détail Inscription')

@section('content') 

<div class="row">
	<div class="col-md-12">
	  <div class="card">
	    <div class="card-header card-header-info card-header-icon">
	      <div class="card-icon">
	        <i class="material-icons">assignment</i>
	      </div>
	      <h4 class="card-title">Détail inscription</h4>
	    </div>
	    <div class="card-body">
	      <div class="toolbar">
	        <!--        Here you can write extra buttons/actions for the toolbar              -->
	      </div>
	      <div class="material-datatables">
	        <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
	          <thead>
	            <tr>
	              <th style="color: red"><b>Numero d'inscription</b></th>
	              <th style="color: red"><b>Prénom Nom</b></th>
	              <th style="color: red"><b>Catégorie</b></th>
	              <th style="color: red"><b>Niveau</b></th>
	              <th style="color: red"><b>Classe</b></th>
	              <th style="color: red"><b>Tarif</b></th>
	              <th style="color: red"><b>Modalité</b></th>  
	              <th style="color: red"><b>Transport</b></th>  
	              <th style="color: red"><b>Cantine</b></th>  
	              <th style="color: red"><b>Année</b></th>  
	              <th style="color: red"><b>Description</b></th>  
	              <th style="color: red"><b>Création</b></th>   			
	              <th class="disabled-sorting text-center" colspan="2" >
	              </th>
	            </tr>
	          </thead> 
	          <tbody>
	            <tr>
	              <td>{{ $inscription->num_inscription }}</td> 
	              <td>{{ $user->prenom }} {{ $user->nom }}</td> 
	              <td>{{ $categorie->titre }}</td>
	              <td>{{ $niveau->titre }}</td> 
	              <td>{{ $classe->titre }}</td> 
	              <td>{{ $inscription->tarif }}</td> 
	              <td>{{ $inscription->modalité }}</td>  
	              <td>{{ $inscription->transport }}</td> 
	              <td>{{ $inscription->cantine }}</td> 
	              <td>{{ $année->titre }}</td> 
	              <td>{{ $inscription->description }}</td>
	              <td>{{ $inscription->created_at->format('d-m-Y') }}</td>  
                  <td class="td-actions text-right">
                  	<a href="{{url('/inscription/'.$inscription->id.'/edit')}}" type="button" class="btn btn-warning btn-round" title="Modifier"><i class="material-icons">edit</i> 
                  	</a> 
                  </td>
                  <td class="td-actions text-right">
                  	 <form action="{{url('/inscription/'.$inscription->id)}}" method="get">
	                      {{csrf_field()}}
	                      {{method_field('DELETE')}}
	                      <button type="submit"  class="btn btn-danger btn-round" title="Suprimer" style="padding: 6px;">
	                      <i class="material-icons">close</i>
	                      </button>
                     </form>  
	              </td>
	            </tr>  	            
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