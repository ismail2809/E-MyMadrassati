@extends('back.master')
@section('content') 
 <div class="row">

	<div class="col-md-8">
	  <div class="card">
	    <div class="card-header card-header-icon card-header-rose">
	      <div class="card-icon">
	        <i class="material-icons">perm_identity</i>
	      </div>
	      <h4 class="card-title">Edit Profile -
	        <small class="category">Info étudiant</small>
	      </h4>
	    </div>
	    <div class="card-body">
	      <form>  

	        <div class="row">
	          <div class="col-lg-4">
	            <div class="form-group">
	              <label class="bmd-label-floating">Numéro d'inscription</label>
	              <input type="text" class="form-control" readonly="true">
	            </div>
	          </div>
	          <div class="col-lg-4">
	            <div class="form-group">
	              <label class="bmd-label-floating">Prénom</label>
	              <input type="text" class="form-control">
	            </div>
	          </div>
	          <div class="col-lg-4">
	            <div class="form-group">
	              <label class="bmd-label-floating">Nom</label>
	              <input type="text" class="form-control">
	            </div>
	          </div> 
	        </div> 

	        <br>
	        <div class="row">
	          <div class="col-lg-6">
	            <div class="form-group">
	              <label class="bmd-label-floating">Email</label>
	              <input type="email" class="form-control">
	            </div>
	          </div>
	          <div class="col-lg-6">
	            <div class="form-group">
	              <label class="bmd-label-floating">Tél</label>
	              <input type="number" class="form-control">
	            </div>
	          </div>
	        </div> 

	        <br>
	        <div class="row">
	          <div class="col-lg-4">
	            <div class="form-group"> 
	              <input type="text" class="form-control datepicker"  value="31/03/2020">
	            </div>
	          </div>
	          <div class="col-lg-4">
	            <div class="form-group">
	              <label class="bmd-label-floating">Lieu Naissance</label>
	              <input type="text" class="form-control">
	            </div>
	          </div>                        
	          <div class="col-lg-4">
	            <div class="form-group"> 
	              <select class="selectpicker" data-style="select-with-transition" title="Sexe"> 
	                <option value="Homme"> Homme </option>
	                <option value="Femme"> Femme </option> 
	              </select> 
	            </div>
	          </div> 
	        </div>

	        <br>
	        <h4><small class="category">Info parent</small></h4>
	        <div class="row">
	          <div class="col-lg-4">
	            <div class="form-group">
	              <label class="bmd-label-floating">Prénom</label>
	              <input type="text" class="form-control">
	            </div>
	          </div>
	          <div class="col-lg-4">
	            <div class="form-group">
	              <label class="bmd-label-floating">Nom</label>
	              <input type="text" class="form-control">
	            </div>
	          </div>
	          <div class="col-lg-4">
	            <div class="form-group">
	              <label class="bmd-label-floating">Tél</label>
	              <input type="number" class="form-control">
	            </div>
	          </div> 
	        </div> 

	        <br>
	        <div class="row">
	          <div class="col-lg-4">
	            <div class="form-group">
	              <label class="bmd-label-floating">Email</label>
	              <input type="email" class="form-control">
	            </div>
	          </div>
	          <div class="col-lg-4">
	            <div class="form-group"> 
	              <select class="selectpicker" data-style="select-with-transition" title="Sexe"> 
	                      <option value="Homme"> Homme </option>
	                      <option value="Femme"> Femme </option> 
	              </select> 
	            </div>
	          </div>
	          <div class="col-lg-4">
	            <div class="form-group">
	              <label class="bmd-label-floating">Profession</label>
	              <input type="text" class="form-control">
	            </div>
	          </div> 
	        </div>  
	        <button type="submit" class="btn btn-rose pull-right">Update Profile</button>
	        <div class="clearfix"></div>
	      </form>
	    </div>
	  </div>
	</div>             

	<div class="col-md-4">
	  <h4 class="title text-center">Photo de profil</h4>
	  <div class="fileinput fileinput-new text-center" data-provides="fileinput" style="display: block;">
	    <div class="fileinput-new thumbnail">
	      <img src="{{ asset('back/assets/img/placeholder.jpg') }}" alt="...">
	    </div>
	    <div class="fileinput-preview fileinput-exists thumbnail"></div>
	    <div>
	      <span class="btn btn-round btn-rose btn-file">
	        <span class="fileinput-new">Add Photo</span>
	        <span class="fileinput-exists">Change</span>
	        <input type="file" name="..." />
	      </span>
	      <br />
	      <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
	    </div>
	  </div>
	</div>

</div> 
@endsection