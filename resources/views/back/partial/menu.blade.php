 <div class="sidebar" data-color="azure" data-background-color="black" data-image="{{ asset('back/assets/img/sidebar-3.jpg') }}">
  
      <div class="logo"><a href="http://www.creative-tim.com/" class="simple-text logo-mini">
          CT
        </a>
        <a href="http://www.creative-tim.com/" class="simple-text logo-normal">
          louis massignon
        </a></div>
      <div class="sidebar-wrapper">
        <div class="user">
          <div class="photo">
            <img src="{{ asset('back/assets/img/faces/avatar.jpg') }}" />
          </div>
          <div class="user-info">
            <a data-toggle="collapse" href="#collapseExample" class="username">
              <span>
                Tania Andrew
                <b class="caret"></b>
              </span>
            </a>
            <div class="collapse" id="collapseExample">
              <ul class="nav">
                <li class="nav-item">
                  <a class="nav-link" href="{{ url('/profile') }}">
                    <span class="sidebar-mini"> MP </span>
                    <span class="sidebar-normal"> Mon Profile </span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ url('/updateprofile') }}">
                    <span class="sidebar-mini"> EP </span>
                    <span class="sidebar-normal"> Edit Profile </span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">
                    <span class="sidebar-mini"> S </span>
                    <span class="sidebar-normal"> Settings </span>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <ul class="nav">
          <li class="nav-item ">
            <a class="nav-link" href="{{ url('/dashboard') }}">
              <i class="material-icons">dashboard</i>
              <p> Dashboard </p>
            </a>
          </li>  
          <li class="nav-item ">
            <a class="nav-link" data-toggle="collapse" href="#a1">
              <i class="material-icons">create_new_folder</i>
              <p> Inscriptions
                <b class="caret"></b>
              </p>
            </a>
            <div class="collapse" id="a1">
              <ul class="nav"> 
                <li class="nav-item ">
                  <a class="nav-link" href="{{ url('/inscription/new') }}">
                    <span class="sidebar-mini"> N </span>
                    <span class="sidebar-normal"> Nouvelle </span>
                  </a>
                </li>
                <li class="nav-item ">
                  <a class="nav-link" href="{{ url('/inscriptions') }}">
                    <span class="sidebar-mini"> L </span>
                    <span class="sidebar-normal"> Liste </span>
                  </a>
                </li> 
              </ul>
            </div>
          </li>

           <li class="nav-item ">
            <a class="nav-link" data-toggle="collapse" href="#a2">
              <i class="material-icons">local_atm</i>
              <p> Payements
                <b class="caret"></b>
              </p>
            </a>
            <div class="collapse" id="a2">
              <ul class="nav"> 
                <li class="nav-item ">
                  <a class="nav-link" href="{{ url('/payment/new') }}">
                    <span class="sidebar-mini"> N </span>
                    <span class="sidebar-normal"> Nouvelle </span>
                  </a>
                </li>
                <li class="nav-item ">
                  <a class="nav-link" href="{{ url('/payments') }}">
                    <span class="sidebar-mini"> L </span>
                    <span class="sidebar-normal"> Liste </span>
                  </a>
                </li> 
              </ul>
            </div>
          </li>

          <li class="nav-item ">
            <a class="nav-link" data-toggle="collapse" href="#a3">
              <i class="material-icons">people_alt</i>
              <p> Utilisateurs
                <b class="caret"></b>
              </p>
            </a>
            <div class="collapse" id="a3">
              <ul class="nav"> 
                <li class="nav-item ">
                  <a class="nav-link" href="#">
                    <span class="sidebar-mini"> E </span>
                    <span class="sidebar-normal"> Etudiants </span>
                  </a>
                </li> 
                <li class="nav-item ">
                  <a class="nav-link" href="#">
                    <span class="sidebar-mini"> P </span>
                    <span class="sidebar-normal"> Professeurs </span>
                  </a>
                </li> 
                <li class="nav-item ">
                  <a class="nav-link" href="#">
                    <span class="sidebar-mini"> A </span>
                    <span class="sidebar-normal"> Admin </span>
                  </a>
                </li> 
              </ul>
            </div>
          </li>

          <li class="nav-item ">
            <a class="nav-link" href="../widgets.html">
              <i class="material-icons">build</i>
              <p> Paramètre </p>
            </a>
          </li> 
          
        </ul>
      </div>
    </div>