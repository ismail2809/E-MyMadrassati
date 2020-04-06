@extends('back.master') 
@section('title','Nouveau payment')

@section('content') 

<div class="col-md-12">
  <div class="card ">
    <div class="card-header card-header-success card-header-text">
      <div class="card-text">
        <h4 class="card-title">Nouveau Nayment</h4>
      </div>
    </div>
    <div class="card-body">
      <form method="get" action="https://demos.creative-tim.com/" class="form-horizontal">         
       
         <div class="row">
          <label class="col-sm-2 col-form-label">Numéro d'inscription</label>
          <div class="col-sm-10">
            <div class="form-group">
              <input type="text" class="form-control" readonly="true" value="id_inscription">
            </div>
          </div>
        </div>

         <div class="row"> 
            <label class="col-sm-2 col-form-label">Année Scholaire</label>
            <div class="col-sm-10">
              <div class="form-group select-wizard">
                <select class="selectpicker" data-size="7" data-style="select-with-transition" title="Single Select"> 
                  <option value="Albania"> 2019 / 2020 </option>
                  <option value="Algeria"> 2020 / 2021 </option> 
                </select>
              </div>
            </div> 
        </div>

         <div class="row"> 
           <label class="col-sm-2 col-form-label">Mode payment</label>
            <div class="col-sm-10">
              <div class="form-group select-wizard">
                 <select class="selectpicker" data-size="7" data-style="select-with-transition" title="Choisir mode payment">
                    <option disabled selected>Choisir mode payment</option>
                    <option value="1">Cache</option>
                    <option value="2">Chèque<option> 
                  </select>
              </div>
            </div> 
        </div>


         <div class="row">
          <label class="col-sm-2 col-form-label">Montant payé</label>
          <div class="col-sm-10">
            <div class="form-group">
              <input type="number" class="form-control">
            </div>
          </div>
        </div>

         <div class="row">
          <label class="col-sm-2 col-form-label">Description </label>
          <div class="col-sm-10">
            <div class="form-group">
                <textarea class="form-control" rows="5"></textarea>
            </div>
          </div>
        </div> 

        <div class="row">
          <label class="col-sm-2 col-form-label label-checkbox">Inline checkboxes</label>
          <div class="col-sm-10 checkbox-radios">
            <div class="form-check form-check-inline">
              <label class="form-check-label">
                <input class="form-check-input" type="checkbox" value=""> a
                <span class="form-check-sign">
                  <span class="check"></span>
                </span>
              </label>
            </div>
            <div class="form-check form-check-inline">
              <label class="form-check-label">
                <input class="form-check-input" type="checkbox" value=""> b
                <span class="form-check-sign">
                  <span class="check"></span>
                </span>
              </label>
            </div>
            <div class="form-check form-check-inline">
              <label class="form-check-label">
                <input class="form-check-input" type="checkbox" value=""> c
                <span class="form-check-sign">
                  <span class="check"></span>
                </span>
              </label>
            </div>
          </div>
        </div>
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

@endsection