@extends('back.master') 
@section('title','Nouvelle demande')

@section('content') 
<div class="row"> 
<div class="col-md-12">
  <div class="card ">
    <div class="card-header card-header-success card-header-text">
      <div class="card-text">
        <h4 class="card-title">Demandes Documents</h4>
      </div>
    </div>
    <div class="card-body">
      <form method="get" action="https://demos.creative-tim.com/" class="form-horizontal">         

         <div class="row"> 
            
           <label class="col-sm-2 col-form-label">Sujet</label>
            <div class="col-sm-4">
              <div class="form-group select-wizard">
                 <select class="selectpicker" data-size="7" data-style="select-with-transition" title="Choisir Sujet" name="Sujet">
                    <option disabled selected>Choisir Sujet </option>
                    <option value="1">Sujet 1</option>
                    <option value="2">Sujet 2<option> 
                  </select>
              </div>
            </div> 

           <label class="col-sm-2 col-form-label">Année Scholaire</label>
            <div class="col-sm-4">
              <div class="form-group select-wizard">
                <select class="selectpicker" data-size="7" data-style="select-with-transition" title="Année" name="Année_id"> 
                  <option value="Albania"> 2019 / 2020 </option>
                  <option value="Algeria"> 2020 / 2021 </option> 
                </select>
              </div>
            </div>  
        </div>

         <div class="row">
          <label class="col-sm-2 col-form-label">Description </label>
          <div class="col-sm-10">
            <div class="form-group">
                <textarea class="form-control" rows="7" name="observation" placeholder="Ecris ..."></textarea>
            </div>
          </div>
        </div> 
        <input type="hidden" class="form-control" name="etudiant_id">
        <input type="hidden" class="form-control" name="professeur_id">
        <input type="hidden" class="form-control" name="etudiant_id">
        
      </form>
    </div>

   <div class="card-footer">
      <div class="ml-auto">
        <input type="button" class="btn btn-next btn-fill btn-info btn-wd" value="Valider">
      </div>
      <div class="clearfix"></div>
  </div>

  </div>
</div>

</option>
@endsection