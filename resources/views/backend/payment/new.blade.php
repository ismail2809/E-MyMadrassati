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
					<form method="post" action="{{url('/payment')}}" class="form-horizontal">
                  		{{ csrf_field() }}  
				 		<!-- Row -->
						<div class="row with-forms">
							<!-- Status -->
							<div class="col-md-6">
								<h5>Etudiant</h5>
								<select class="chosen-select-no-single" name="etudiant_id">
									<option label="blank">Select Etudiant</option>
									@php
		                            $etudiants = App\Etudiant::all();               
		                            @endphp

		                            @foreach($etudiants as $etudiant)
		                            <option value="{{$etudiant->user_id}}">
		                            	{{$etudiant->user_id}}
		                            </option>
		                            @endforeach	
								</select>
							</div>

							<div class="col-md-6">
								<h5>Année</h5>
								<select class="chosen-select-no-single" name="année_id">
									<option label="blank">Select Année</option>	
									@php
		                            $années = App\Année::all();               
		                            @endphp

		                            @foreach($années as $année)
		                            <option value="{{$année->id}}">
		                            	{{$année->année}}
		                            </option>
		                            @endforeach	
								</select>
							</div> 
							
							<div class="col-md-6">
								<h5>Mode payment</h5>
								<select class="chosen-select-no-single" name="modalité">
									<option label="blank">Selectionner ... </option>	
									<option>Liquide </option>
									<option>Carte bancaire </option>
									<option>Chèque </option>
									<option>Autre mode </option>
								</select>
							</div>

							<!-- Phone -->
							<div class="col-md-6">
								<h5>Montant payé</h5>
								<input type="number" name="montantpayé" placeholder="montant payé">
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