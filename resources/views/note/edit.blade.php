@extends('back.master') 
@section('title','Nouveau payment')

@section('content') 
<div class="row">

<div class="col-md-12">
 <div class="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <i class="material-icons">close</i>
    </button>
    <span style="text-align: center;">
      <b>Numéro d'inscription : </b> be123456 &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;
      <b>Prénom Nom : </b> Ismail ABOUNASR    &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;
      <b>Matière: </b> Mathématique          &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;
      <b>Année:</b> 2019/2020  &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;
    </span>
 </div>
</div>

<div class="col-md-12">
  <div class="card ">
    <div class="card-header card-header-warning card-header-text">
      <div class="card-text">
        <h4 class="card-title">Modification Note</h4>
      </div>
    </div>
    <div class="card-body">
      <form method="get" action="https://demos.creative-tim.com/" class="form-horizontal">         
       
         <div class="row">
          <label class="col-sm-2 col-form-label">Numéro d'inscription</label>
          <div class="col-sm-10">
            <div class="form-group">
              <input type="text" class="form-control" readonly="true" name="id_inscription" value="id_inscription">
            </div>
          </div>
        </div>

         <div class="row"> 
            <label class="col-sm-2 col-form-label">Année Scholaire</label>
            <div class="col-sm-10">
              <div class="form-group select-wizard">
                <select class="selectpicker" data-size="7" data-style="select-with-transition" title="Année" name="Année_id"> 
                  <option value="Albania"> 2019 / 2020 </option>
                  <option value="Algeria"> 2020 / 2021 </option> 
                </select>
              </div>
            </div> 
        </div>

         <div class="row"> 
           <label class="col-sm-2 col-form-label">Classe</label>
            <div class="col-sm-10">
              <div class="form-group select-wizard">
                 <select class="selectpicker" data-size="7" data-style="select-with-transition" title="Choisir Classe" name="classe_id">
                    <option disabled selected>Choisir Classe</option>
                    <option value="1">Classe1</option>
                    <option value="2">Classe2<option> 
                  </select>
              </div>
            </div> 
        </div>

        <div class="row"> 
           <label class="col-sm-2 col-form-label">Matière</label>
            <div class="col-sm-10">
              <div class="form-group select-wizard">
                 <select class="selectpicker" data-size="7" data-style="select-with-transition" title="Choisir Matière">
                    <option disabled selected>Choisir Matière</option>
                    <option value="1">Math</option>
                    <option value="2">php<option> 
                  </select>
              </div>
            </div> 
        </div>

         <div class="row">
          <label class="col-sm-2 col-form-label">Note</label>
          <div class="col-sm-10">
            <div class="form-group">
              <input type="number" class="form-control" name="note">
            </div>
          </div>
        </div>

         <div class="row">
          <label class="col-sm-2 col-form-label">Observation </label>
          <div class="col-sm-10">
            <div class="form-group">
                <textarea class="form-control" rows="3" name="observation"></textarea>
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