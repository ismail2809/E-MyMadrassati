<!-- Navigation
	================================================== -->

	
<div class="dashboard-nav-inner">

	<ul data-submenu-title="Main">
		<li><a href="{{ url('/') }}"><i class="sl sl-icon-settings"></i> Dashboard</a></li>
		<li><a href="{{ url('/') }}"><i class="sl sl-icon-envelope-open"></i> Messages <span class="nav-tag messages">2</span></a></li>
		<li><a href="{{ url('/') }}"><i class="fa fa-calendar-check-o"></i> Bookings</a></li>
	</ul>
	
	<ul data-submenu-title="Listings">
		<li><a><i class="sl sl-icon-layers"></i> Mes utilisateurs</a>
			<ul>
				<li><a href="{{ url('/') }}">Active <span class="nav-tag green">6</span></a></li>
				<li><a href="{{ url('/') }}">Bloqués <span class="nav-tag red">1</span></a></li>
				<li><a href="{{ url('/') }}">Archives <span class="nav-tag yellow">2</span></a></li>
			</ul>	
		</li>
		<li class="active"><a href="{{ url('/inscriptions') }}"><i class="sl sl-icon-star"></i> Inscriptions</a></li>
		<li><a href="{{ url('/') }}"><i class="sl sl-icon-heart"></i>  Payments</a></li>
		<li><a href="{{ url('/') }}"><i class="sl sl-icon-plus"></i> Absence</a></li>
		<li><a href="{{ url('/') }}"><i class="sl sl-icon-plus"></i> Emploi du temps</a></li>
		<li><a href="{{ url('/') }}"><i class="sl sl-icon-plus"></i> Notes</a></li>
		<li><a href="{{ url('/') }}"><i class="sl sl-icon-plus"></i> Demande Document</a></li>
		<li><a href="{{ url('/années') }}"><i class="sl sl-icon-plus"></i> Année</a></li>
		<li><a href="{{ url('/classes') }}"><i class="sl sl-icon-plus"></i> Classe</a></li>
		<li><a href="{{ url('/matieres') }}"><i class="sl sl-icon-plus"></i> Matières</a></li>
		<li><a href="{{ url('/') }}"><i class="sl sl-icon-plus"></i> Contacté-Nous</a></li>
	</ul>	

	<ul data-submenu-title="Account">
		<li><a href="{{ url('/profile') }}"><i class="sl sl-icon-user"></i> My Profile</a></li>
		<li><a href="{{ url('/logout') }}"><i class="sl sl-icon-power"></i> Logout</a></li>
	</ul>

</div>
	<!-- Navigation / End -->