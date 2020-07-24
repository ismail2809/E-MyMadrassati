@extends('back.master')
@section('title','Profile')

@section('content') 
<div class="row">

    <div class="col-md-9">
      <div class="card">
      <div class="card-header card-header-icon card-header-rose">
        <div class="card-icon">
          <i class="material-icons">perm_identity</i>
        </div>
        <h4 class="card-title">Edit Profile -
          <small class="category">Info étudiant</small>
        </h4>
      </div> 

      <div class="card-body">
        <div class="row">
          <div class="col-lg-3 col-md-6">
            <!--
                      color-classes: "nav-pills-primary", "nav-pills-info", "nav-pills-success", "nav-pills-warning","nav-pills-danger"
                  -->
            <ul class="nav nav-pills nav-pills-rose nav-pills-icons flex-column" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#link110" role="tablist">
                  <i class="material-icons">dashboard</i> Home
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#link111" role="tablist">
                  <i class="material-icons">schedule</i> Settings
                </a>
              </li>
            </ul>
          </div>
          <div class="col-md-9">
            <div class="tab-content">
              <div class="tab-pane active" id="link110">
                Collaboratively administrate empowered markets via plug-and-play networks. Dynamically procrastinate B2C users after installed base benefits.
                <br>
                <br> Dramatically visualize customer directed convergence without revolutionary ROI. Collaboratively administrate empowered markets via plug-and-play networks. Dynamically procrastinate B2C users after installed base benefits.
                <br />
                <br /> Dramatically visualize customer directed convergence without revolutionary ROI. Collaboratively administrate empowered markets via plug-and-play networks. Dynamically procrastinate B2C users after installed base benefits.
              </div>
              <div class="tab-pane" id="link111">
                Efficiently unleash cross-media information without cross-media value. Quickly maximize timely deliverables for real-time schemas.
                <br>
                <br>Dramatically maintain clicks-and-mortar solutions without functional solutions.
              </div>
            </div>
          </div>
        </div>
      </div> 

      </div>
    </div>
    
    <div class="col-md-3">
      <div class="card card-profile">
        <div class="card-avatar">
          <a href="#pablo">
            <img class="img" src="{{ asset('storage/'.$etudiant['users']['avatar']) }}" />
          </a>
        </div>
        <div class="card-body">
          <h6 class="card-category text-gray">{{ $etudiant['users']['role'] }}</h6>
          <h4 class="card-title">{{ $etudiant['users']['prenom'] }} {{ $etudiant['users']['nom'] }}</h4>
          <p class="card-description">
            Don't be scared of the truth because we need to restart the human foundation in truth And I love you like Kanye loves Kanye I love Rick Owens’ bed design but the back is...
          </p>
         </div>
      </div>
    </div>

</div>              

@endsection