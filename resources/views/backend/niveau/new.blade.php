@extends('layouts.master')
@section('title','Nouvelle Inscription')

@section('content') 

<!-- Titlebar -->
<div id="titlebar">
	<div class="row">
		<div class="col-md">
			<h2>Inscriptions</h2>
			<!-- Breadcrumbs -->
			<nav id="breadcrumbs">
				<ul>
					<li><a href="#">Home</a></li>
					<li><a href="#">Inscription</a></li>
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
					<form method="post" action="{{url('/inscription')}}" class="form-horizontal">
                  		{{ csrf_field() }}  
				 		<!-- Row -->
						
						<div class="row with-forms">
							<!-- Status -->

							<div class="col-md-4">
								<h5>Titre</h5>
								<input type="text" name="titre" placeholder="Titre">
							</div>
													
							<div class="col-md-4">
								<h5>Type</h5>
								<select class="chosen-select-no-single" name="type_id">
									<option label="blank">Select Type</option>	
									@php
		                            $types = App\Type::all();               
		                            @endphp

		                            @foreach($types as $type)
		                            <option value="{{$type->id}}">
		                            	{{$type->titre}}
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

						<button class="button preview">Enregistrer <i class="fa fa-arrow-circle-right"></i>
						</button>
						
					</form>
				</div>
				<!-- Section / End -->			 

			</div>
		</div>

	</div>
 
@endsection