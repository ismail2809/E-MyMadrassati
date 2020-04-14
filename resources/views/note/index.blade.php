@extends('back.master') 
@section('title','Notes')

@section('content')
<div class="row">
	<div class="col-lg-12">
	  
	  <div class="card">

	    <div class="card-header card-header-warning card-header-text">
	      <div class="card-icon">
	        <i class="material-icons">create</i>
	      </div>
	      <h4 class="card-title">Notes </h4>
	    </div>

	    <div class="card-body">
		   <form action="" method="post">
		   <div class="row" style="text-align: center">

		     <div class="col-md-3">
		       <div class="form-group select-wizard">
	                <select class="selectpicker" data-size="7" data-style="select-with-transition" title="Année Scholaire"> 
	                  <option value="Albania"> 2019 / 2020 </option>
	                  <option value="Algeria"> 2020 / 2021 </option> 
	                </select>
	           </div>
		 	 </div>

		 	 <div class="col-md-3">
		       <div class="form-group select-wizard">
	                <select class="selectpicker" data-size="7" data-style="select-with-transition" title="Classe"> 
	                  <option value="Albania"> Classe 1</option>
	                  <option value="Algeria"> Classe 2</option> 
	                </select>
	           </div>
		 	 </div>	

		 	 <div class="col-md-3">
		       <div class="form-group select-wizard">
	                <select class="selectpicker" data-size="7" data-style="select-with-transition" title="Matière"> 
	                  <option value="Albania"> Math</option>
	                  <option value="Algeria"> Informatique</option> 
	                </select>
	           </div>
		 	 </div>	 
	 			
	 		<div class="col-md-3">
		      <div class="form-group">
		         <button class="btn btn-info btn-round" type="submit">
	                    Recherche &nbsp;<i class="material-icons">search</i> 
	             </button>
		      </div>
		     </div>

		   </div>
		   </form>

	  </div>
	 </div>
	</div>
</div>
@endsection