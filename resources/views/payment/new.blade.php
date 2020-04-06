@extends('back.master') 
@section('title','Nouveau payment')

@section('content') 

<div class="row">
	<div class="col-md-12">
	  <div class="card">
	    <div class="card-header card-header-primary card-header-icon">
	      <div class="card-icon">
	        <i class="material-icons">assignment</i>
	      </div>
	      <h4 class="card-title">Payment</h4>
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
	              <th>Niveau</th>
	              <th>Année</th>  
	              <th>Création</th>  
	              <th class="disabled-sorting text-right">Actions</th>
	            </tr>
	          </thead> 
	          <tbody>
	            <tr>
	              <td>Gavin Cortez</td>
	              <td>Team Leader</td>
	              <td>3ème année</td>
	              <td>2020</td> 
	              <td>27-03-2020</td> 
	               <td class="td-actions text-right">
	                <a href="{{ url('/payment/id_inscription') }}" class="btn btn-info btn-round">
	                	<i class="material-icons">euro_symbol</i>
	                </a>             
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