@extends('back.master') 
@section('title','Les notes de la classe')
@section('content')

<div class="row">
	<div class="col-md-12">
	  <div class="card">
	    <div class="card-header card-header-warning card-header-icon">
	      <div class="card-icon">
	        <i class="material-icons">assignment</i>
	      </div>
	      <h4 class="card-title">La classe</h4>
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
	              <th>Classe</th>
	              <th>Matière</th>  
	              <th>Nbr Note</th>  	    
	              <th>Année</th>  
	              <th class="disabled-sorting text-right">Actions</th>
	            </tr>
	          </thead> 
	          <tbody>
	            <tr>
	              <td>BE197328</td>
	              <td>Team Leader</td>
	              <td>3ème année</td>
	              <td>PHP</td> 
	              <td>18</td> 
	              <td>2019/2020</td> 
	              <td class="td-actions text-right">
	                <button type="button" rel="tooltip" class="btn btn-info btn-round" title="Détail">
	                  <i class="material-icons">remove_red_eye</i>
	                </button>
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