@extends('back.master')
@section('title','Tableau de bord')

@section('content') 

<div class="row">

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

  <div class="col-lg-3 col-md-6 col-sm-6">
    <div class="card card-stats">
      <div class="card-header card-header-warning card-header-icon">
        <div class="card-icon">
          <i class="material-icons">weekend</i>
        </div>
        <p class="card-category">Bookings</p>
        <h3 class="card-title">184</h3>
      </div>
      <div class="card-footer">
        <div class="stats">
          <i class="material-icons text-danger">warning</i>
          <a href="#pablo">Get More Space...</a>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-md-6 col-sm-6">
    <div class="card card-stats">
      <div class="card-header card-header-rose card-header-icon">
        <div class="card-icon">
          <i class="material-icons">store</i>
        </div>
        <p class="card-category">Website Visits</p>
        <h3 class="card-title">75.521</h3>
      </div>
      <div class="card-footer">
        <div class="stats">
          <i class="material-icons">local_offer</i> Tracked from Google Analytics
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-md-6 col-sm-6">
    <div class="card card-stats">
      <div class="card-header card-header-success card-header-icon">
        <div class="card-icon">
          <i class="material-icons">equalizer</i>
        </div>
        <p class="card-category">Revenue</p>
        <h3 class="card-title">$34,245</h3>
      </div>
      <div class="card-footer">
        <div class="stats">
          <i class="material-icons">date_range</i> Last 24 Hours
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-md-6 col-sm-6">
    <div class="card card-stats">
      <div class="card-header card-header-info card-header-icon">
        <div class="card-icon">
          <i class="material-icons">contact_mail</i>
        </div>
        <p class="card-category">Followers</p>
        <h3 class="card-title">+245</h3>
      </div>
      <div class="card-footer">
        <div class="stats">
          <i class="material-icons">update</i> Just Updated
        </div>
      </div>
    </div>
  </div>
</div>

<div class="row">
 <div class="col-lg-10 offset-lg-1">
      <div class="panel panel-default">
          <div class="panel-body">
              {!! $chart->html() !!}
          </div>
      </div>
  </div>
</div>

<h3>Manage Listings</h3>
<br>
<div class="row">
  <div class="col-md-3">
    <div class="card card-product">
      <div class="card-header card-header-image" data-header-animation="true">
        <a href="#pablo">
          <img class="img" src="{{ asset('back/assets/img/school/crèche.jpg') }}">
        </a>
      </div>
      <div class="card-body"> 
        <h4 class="card-title">
          <a href="#pablo"> Crèche </a>
        </h4> 
      </div> 
    </div>
  </div>
  <div class="col-md-3">
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
  <div class="col-md-3">
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
  <div class="col-md-3">
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

{!! Charts::scripts() !!}
{!! $chart->script() !!}
@endsection