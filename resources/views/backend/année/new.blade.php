@extends('layouts.master')
@section('title','Nouvelle Année')

@section('content') 

<!-- Titlebar -->
<div id="titlebar">
	<div class="row">
		<div class="col-md">
			<h2>Année</h2>
			<!-- Breadcrumbs -->
			<nav id="breadcrumbs">
				<ul>
					<li><a href="#">Home</a></li>
					<li><a href="#">Année</a></li>
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

					<form method="post" action="{{url('/année')}}" class="form-horizontal">
	              		{{ csrf_field() }}  
				 		<!-- Row -->
						<div class="row with-forms">
							<!-- Status -->
							<div class="col-md-12">
								<h5>Année</h5>
								<input type="text" name="année" placeholder="Entrer une année">
							</div>

							<button class="button preview">Enregistrer<i class="fa fa-arrow-circle-right"></i>
							</button>
							
						</div>
					</form>
				</div>
			<!-- Section / End -->			 

			</div>
		</div>

	</div>
 
@endsection