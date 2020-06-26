@extends('back.master')
@section('title','Mes Classes')

@section('content') 
 
<div class="row justify-content-center">

	     <div class="col-md-12">
                <div class="card">
                  <div class="card-header card-header-icon card-header-info">
                    <div class="card-icon">
                      <i class="material-icons">assignment</i>
                    </div>
                    <h4 class="card-title ">Les classes</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table">
                        <thead class=" text-primary">
                          <th>
                            Classe
                          </th>
                          <th>
                            Nbr etudiants
                          </th>
                          <th>
                            Année scolaire
                          </th> 
                          <th>
                          	
                          </th>
                        </thead>
                        <tbody>

                          <tr>
                            <td>
                              Classe 1
                            </td>
                            <td>
                              32
                            </td>
                            <td>
                              2019 / 2020
                            </td> 

                            <td>
                              <a href="#" class="btn btn-info">Voir</a>
                            </td> 

                          </tr>


                          <tr>
                            <td>
                              Classe 2
                            </td>
                            <td>
                              32
                            </td>
                            <td>
                              2019 / 2020
                            </td> 
                          </tr>


                          <tr>
                            <td>
                              Classe 3
                            </td>
                            <td>
                              32
                            </td>
                            <td>
                              2019 / 2020
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