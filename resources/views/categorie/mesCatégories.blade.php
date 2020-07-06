@extends('back.master')
@section('title','Mes Catégories')

@section('content') 
 
<div class="row justify-content-center">
 
 @foreach($categories as $categorie)
  <div class="col-md-4">
    <div class="card card-product">
      <div class="card-header card-header-image" data-header-animation="true">
        <a href="{{ url('/categorie/'.$categorie->categories->id.'/classes') }}">
          <img class="img" src="{{ asset($categorie->categories->image) }}">
        </a>
      </div>
      <div class="card-body"> 
        <h4 class="card-title">
          <a href="{{ url('/categorie/'.$categorie->categories->id.'/classes') }}"> {{ $categorie->categories->titre }} </a>
        </h4> 
      </div> 
    </div>
  </div>
  @endforeach

</div>	
@endsection