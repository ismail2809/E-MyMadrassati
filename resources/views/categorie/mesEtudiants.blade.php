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
                        <thead class=" text-primary">
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
                            Année scolaire
                          </th> 
                          <th>
                          	Absence
                          </th>
                          <th>
                            Note
                          </th>
                        </thead>
                        <tbody>

                          <tr>
                            <td>
                              Ismail abbbb
                            </td>
                            <td>
                              College
                            </td>
                            <td>
                              Niveau 1
                            </td>
                            <td>
                              Classe 1
                            </td>
                            <td>
                              2019 / 2020
                            </td>
                            <td>
                              32
                            </td>
                            <td>
                              2
                            </td> 

                            <td>
                              <a href="#" class="btn btn-info">Voir</a>
                            </td> 

                          </tr>
 
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>

</div>	

@endsection