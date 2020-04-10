@extends('back.master') 
@section('title','Nouvelle absence')

@section('content')
<div class="row">
	 <div class="col-sm-12">
	     
	      <div class="card">
	        <div class="card-header card-header-warning card-header-icon">
	          <div class="card-icon">
	            <i class="material-icons">assignment</i>
	          </div>
	          <h4 class="card-title">Classe</h4>
	        </div>
	        <div class="card-body">
	          <div class="table-responsive">
	          	<form action="" method="post">
	            <table class="table table-shopping">
	              <thead>
	                <tr>
	                  <th class="text-center"></th>
	                  <th>Etudiant</th>
	                  <th class="th-description">Absence / Retard</th>
	                  <th class="th-description">Observation</th>  
	                </tr>
	              </thead>
	              <tbody>
	                <tr>
	                  <td>
	                    <div class="img-container" style="width: 50px;">
	                      <img src="{{ asset('back/assets/img/product1.jpg') }}" alt="...">
	                    </div>
	                  </td>
	                  <td class="td-name"> 
	                    <small>Ismail ABOUNASR</small>
	                  </td>
	                  <td>
	                    <select class="selectpicker" data-size="7" data-style="select-with-transition" title="Single Select"> 
	                 		 <option value="Albania"> Absence </option>
	                  		 <option value="Algeria"> Retartd </option> 
	                	</select>
	                  </td> 
	                  <td class="td-text">
	                    <textarea class="form-control" rows="2" placeholder="Ecrire ici votre observation"></textarea>	                  		
	                  </td> 
	                </tr>	             
	                <tr>
	                  <td colspan="2"></td>
	                  <td colspan="2" class="text-right">
	                    <button type="button" class="btn btn-info btn-round">Enregistrer <i class="material-icons">done</i></button>
	                  </td>
	                </tr>
	              </tbody>
	            </table>
	        	</form>
	          </div>
	        </div>
	      </div>

      </div>
</div> 
@endsection