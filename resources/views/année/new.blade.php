@extends('back.master') 
@section('title','Ajouter Année scolaire')

@section('content') 

<div class="row">
	<div class="col-md-12">
	  <div class="card">
	    <div class="card-header card-header-success card-header-icon">
	      <div class="card-icon">
	        <i class="material-icons">assignment</i>
	      </div>
	      <h4 class="card-title">Ajouter Année scolaire</h4>
	    </div>
	    <div class="card-body">
		  <div class="col-md-12">
		     <form method="post" action="{{url('/annee')}}" class="form-horizontal">         
		     {{ csrf_field() }}  

		      <div class="card-body">             
		         <div class="row">
		          <label class="col-sm-2 col-form-label">Titre</label>
		          <div class="col-sm-10">
		            <div class="form-group">
		              <input type="text" class="form-control" name="titre" placeholder="2020/2019">
		            </div>
		          </div>
		        </div>  
		     </div>

		     <div class="card-footer">
		        <div class="ml-auto">
		          <input type="submit" class="btn btn-info" value="Valider">
		        </div>
		        <div class="clearfix"></div>
		    </div>
		  </form>

		 </div>
        </div>
      </div>

	    <!-- end content-->
	  </div>
	  <!--  end card  -->
	</div>
	<!-- end col-md-12 -->
</div> 
 
@endsection