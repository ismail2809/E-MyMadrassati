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
					<li>Liste</li>
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
					<h4 class="headline margin-top-70 margin-bottom-30">
						<i class="sl sl-icon-doc"></i> Liste Inscriptions
					</h4>

					<table class="basic-table">

						<tr>
							<th>Column 1</th>
							<th>Column 2</th>
						</tr>

						<tr>
							<td data-label="Column 1">Item</td>
							<td data-label="Column 2">Description</td>
						</tr>

						<tr>
							<td data-label="Column 1">Item</td>
							<td data-label="Column 2">Description</td>
						</tr>

						<tr>
							<td data-label="Column 1">Item</td>
							<td data-label="Column 2">Description</td>
						</tr>

						<tr>
							<td data-label="Column 1">Item</td>
							<td data-label="Column 2">Description</td>
						</tr>
					</table>
				</div>
				
			</div>
			<!-- Section / End -->			 
		</div>
	</div>
</div>
 
@endsection