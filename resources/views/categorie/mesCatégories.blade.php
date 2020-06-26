@extends('back.master')
@section('title','Mes Niveaux')

@section('content') 
 
<div class="row justify-content-center">
  <div class="col-md-4">
    <div class="card card-product">
      <div class="card-header card-header-image" data-header-animation="true">
        <a href="#">
          <img class="img" src="{{ asset('back/assets/img/school/crèche.jpg') }}">
        </a>
      </div>
      <div class="card-body"> 
        <h4 class="card-title">
          <a href="#"> Crèche </a>
        </h4> 
      </div> 
    </div>
  </div>

  <div class="col-md-4">
    <div class="card card-product">
      <div class="card-header card-header-image" data-header-animation="true">
        <a href="#pablo">
          <img class="img" src="{{ asset('back/assets/img/school/primaire.jpg') }}">
        </a>
      </div>
      <div class="card-body"> 
        <h4 class="card-title">
          <a href="#pablo"> Primaire </a>
        </h4> 
      </div> 
    </div>
  </div>
</div>

<div class="row justify-content-center">

  <div class="col-md-4">
    <div class="card card-product">
      <div class="card-header card-header-image" data-header-animation="true">
        <a href="#pablo">
          <img class="img" src="{{ asset('back/assets/img/school/collège.jpg') }}">
        </a>
      </div>
      <div class="card-body"> 
        <h4 class="card-title">
          <a href="#pablo"> Collège </a>
        </h4> 
      </div> 
    </div>
  </div>

  <div class="col-md-4">
    <div class="card card-product">
      <div class="card-header card-header-image" data-header-animation="true">
        <a href="#pablo">
          <img class="img" src="{{ asset('back/assets/img/school/lycée.jpg') }}">
        </a>
      </div>
      <div class="card-body"> 
        <h4 class="card-title">
          <a href="#pablo"> Lycée </a>
        </h4> 
      </div> 
    </div>
  </div>
 
</div>	
@endsection