@extends('back.master')
@section('title','Liste des étudiants')

@section('content') 
 
<div class="row justify-content-center">

   <div class="col-md-12">
      <div class="card">

        <div class="card-header card-header-icon card-header-info">
          <div class="card-icon">
            <i class="material-icons">assignment</i>
          </div>
          <h4 class="card-title ">Liste des étudiants</h4>
        </div>

        <div class="card-body">
          <div class="table-responsive">
            <table class="table">
              <thead class="text-danger" style="text-align: center;">
                <th>
                  Nom complet
                </th>
                <th>
                  Catégorie
                </th>
                <th>
                  Niveau
                </th>
                <th>
                  Classe
                </th>
                <th>
                  Tarif
                </th>
                <th>
                  Modalité
                </th>                
                <th>
                  Transport
                </th>
                <th>
                  Cantine
                </th>                
                <th>
                  Description
                </th>
                <th>
                  Année scolaire
                </th>                 
                <th> 
                  Action
                </th> 
                <th>                  
                </th>
              </thead>
              <tbody>
              @foreach($etudiants as $etudiant)
                <tr style="text-align: center;">
                  <td>
                  {{ $etudiant['etudiants']['users']['prenom'] }} {{ $etudiant['etudiants']['users']['nom'] }}                               
                  </td>
                  <td>
                    {{ $etudiant['categories']['titre'] }}
                  </td>
                  <td>
                    {{ $etudiant['niveaus']['titre'] }}
                  </td>
                  <td>
                    {{ $etudiant['classes']['titre'] }}
                  </td>
                  <td>
                    {{ $etudiant['tarif'] }}
                  </td>
                  <td>
                    {{ $etudiant['modalité'] }}
                  </td>
                  <td>
                    {{ $etudiant['transport'] }}
                  </td>
                  <td>
                    {{ $etudiant['cantine'] }}
                  </td>
                  <td>
                    {{ $etudiant['description'] }}
                  </td>
                  <td>
                    {{ $etudiant['années']['titre'] }}
                  </td> 
                  <td class="td-actions text-right">
                  <a href="{{url('/inscription/'.$etudiant['id'])}}" type="button" class="btn btn-info btn-round" title="détail"><i class="material-icons">remove_red_eye</i> 
                    </a> 
                  </td>
                  <td class="td-actions text-right">
                    <a href="{{url('/inscription/'.$etudiant['id'].'/edit')}}" type="button" class="btn btn-warning btn-round" title="Modifier"><i class="material-icons">edit</i> 
                    </a> 
                  </td>

                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>

      </div>
    </div>

</div>	

@endsection