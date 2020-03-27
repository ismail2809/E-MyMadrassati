@extends('layouts.master')
@section('title','Nouvelle Inscription')

@section('content') 

<!-- Titlebar -->
<div id="titlebar">
	<div class="row">
		<div class="col-md">
			<h2>Matières</h2>
			<!-- Breadcrumbs -->
			<nav id="breadcrumbs">
				<ul>
					<li><a href="#">Home</a></li>
					<li><a href="#">Matière</a></li>
					<li>Nouvelle</li>
				</ul>
			</nav>
		</div>
	</div>
</div> 
<!-- Content / End -->

<!-- Container -->
	<div class="row">
		<div class="col-lg">

			<div id="add-listing" class="separated-form">

				<!-- Section -->
				<div class="add-listing-section">

					<!-- Headline -->
					<div class="add-listing-headline">
						<h3><i class="sl sl-icon-doc"></i> Basic Informations</h3>
					</div>
					<form method="post" action="{{url('/cour')}}" class="form-horizontal">
                  		{{ csrf_field() }}  
				 		<!-- Row -->
						
	 
					</form>
				</div>
				<!-- Section / End -->			  

			</div>
		</div>

	</div>
 
@endsection