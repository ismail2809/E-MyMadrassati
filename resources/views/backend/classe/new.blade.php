@extends('layouts.master')
@section('title','Nouvelle Inscription')

@section('content') 

<!-- Titlebar -->
<div id="titlebar">
	<div class="row">
		<div class="col-md">
			<h2>Classes</h2>
			<!-- Breadcrumbs -->
			<nav id="breadcrumbs">
				<ul>
					<li><a href="#">Home</a></li>
					<li><a href="#">Classe</a></li>
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
					<form method="post" action="{{url('/classe')}}" class="form-horizontal">
                  		{{ csrf_field() }}  
				 		<!-- Row -->
						<div class="row with-forms">
							<div class="col-md-8">
								<h5>Titre</h5>
								<input type="text" name="titre" placeholder="Titre">
							</div>

							<div class="col-md-4">
								<h5>niveau</h5>
								<select class="chosen-select-no-single" name="niveau_id">
									<option label="blank">Select Niveau</option>							
									
		                            @foreach($niveaux as $niveau)
		                            <option value="{{$niveau->id}}">
		                            	{{$niveau->titre}}
		                            </option>
		                            @endforeach	
								</select>
							</div>

						</div>
						<!-- Row / End -->

						<!-- Description -->
						<div class="form">
							<h5>Description</h5>
							<textarea class="WYSIWYG" name="description" cols="15" rows="3" id="summary" spellcheck="true"></textarea>
						</div>					 
					</form>
				</div>
				<!-- Section / End -->			 

				<a href="#" class="button preview">Enregistrer <i class="fa fa-arrow-circle-right"></i></a>

			</div>
		</div>

	</div>
 
@endsection