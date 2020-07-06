@extends('back.master')
@section('title','Absence des étudiants')

@section('content') 
 
<div class="row justify-content-center">

  @if ($message = Session::get('info'))
  <div class="alert alert-info col-12 text-center">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <i class="material-icons">close</i>
      </button>
      <span><b> {{ $message }} </b></span>
  </div>
  @endif
  @if ($message = Session::get('success'))
  <div class="alert alert-success col-12 text-center">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <i class="material-icons">close</i>
      </button>
      <span><b> {{ $message }} </b></span>
  </div>
  @endif
  @if ($message = Session::get('error'))
  <div class="alert alert-danger col-12 text-center">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <i class="material-icons">close</i>
      </button>
      <span><b> {{ $message }} </b></span>
  </div>
  @endif
  @if ($message = Session::get('warning'))
  <div class="alert alert-warning col-12 text-center">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <i class="material-icons">close</i>
      </button>
      <span><b> {{ $message }} </b></span>
  </div>
  @endif 

   <div class="col-md-12">
      <div class="card">

        <div class="card-header card-header-icon card-header-info">
          <div class="card-icon">
            <i class="material-icons">assignment</i>
          </div>
          <h4 class="card-title ">Absence des étudiants</h4>
        </div>

        <div class="card-body">

          <form action="{{url('/storeAbsence')}}" method="post">
              {{ csrf_field() }} 

          <div class="table-responsive">
            <table class="table">
              <thead class="text-danger" style="text-align: center;">
                <th>
                </th>
                <th>
                  Nom complet
                </th>
                <th>
                  MOIS
                </th>
                <th>
                  VERSEMENT
                </th>
                <th>
                   MODE
                </th>
                <th>
                   DESCRIPTION
                </th> 
              </thead>
              <tbody>
              @foreach($etudiants as $etudiant)
                <tr style="text-align: center;">
                  <td>
                    <div class="img-container" style="width: 50px;">
                      <img src="{{ asset('back/assets/img/product1.jpg') }}" alt="...">
                    </div>
                  </td>
                  <td class="td-name">                     
                      {{ $etudiant['etudiants']['users']['prenom'] }} {{ $etudiant['etudiants']['users']['nom'] }} 
                      <input type="hidden" name="etudiant_id[]" value="{{ $etudiant['etudiant_id'] }}">                
                  </td>
                  <td>
                    <select class="selectpicker" data-size="7" data-style="select-with-transition" name="mois" title="Mois"> 
                      <option value="1"> Janvier </option>  
                      <option value="2"> Février </option>  
                      <option value="3"> Mars </option>  
                      <option value="4"> Avril </option>  
                      <option value="5"> Mai </option>  
                      <option value="6"> Juin </option>  
                      <option value="7"> Juillet</option>  
                      <option value="8"> Aout </option>  
                      <option value="9"> Septembre </option>  
                      <option value="10"> Octobre </option>  
                      <option value="11"> Novembre </option>  
                      <option value="12"> Décembre </option>  
                    </select>
                  </td>
                  <td>
                    <input type="number" name="versement[]" class="form-control">
                  </td>
                  <td>
                    <select class="selectpicker" data-style="select-with-transition" name="modalité" title="Modalité"> 
                          <option value="Mensuel"> Mensuel </option>
                          <option value="Trimestriel"> Trimestriel </option> 
                          <option value="Annuel"> Annuel </option> 
                    </select>
                  </td> 
                  <td class="td-text">
                    <textarea class="form-control" rows="2" name="observation[]" placeholder="Ecrire ici votre observation"></textarea>   
                  </td>  
              </tr>  

              <input type="hidden" name="année_id[]"   value="{{ $etudiant['années']['id'] }}">                      
              <input type="hidden" name="classe_id[]"  value="{{ $etudiant['classes']['id'] }}">                       
              <input type="hidden" name="professeur_id[]"  value="1">

              @endforeach

              <tr>
                <td colspan="2"></td>
                <td colspan="2"></td>
                <td colspan="2" class="text-right">
                  <button type="submit" class="btn btn-info btn-round">Valider <i class="material-icons">done</i></button>
                </td>
              </tr>

              </tbody>
            </table>            
          </div>

          </form>

        </div>

      </div>
    </div>

</div>	

@endsection