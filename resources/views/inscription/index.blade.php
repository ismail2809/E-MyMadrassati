@extends('back.master')
@section('title','Liste Inscription')

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

     <div class="card col-md-12"> 
     	 <div class="card ">
	        <div class="card-header card-header-info card-header-icon">
	          <div class="card-icon">
	            <i class="material-icons">search</i>
	          </div>
	          <h4 class="card-title">Zone de recherche</h4>
	        </div>

          <form method="post" action="{{url('/inscription/search') }}" name="myForm" onsubmit="return validateForm()">
          {{ csrf_field() }} 
          	<div class="row">
		        <div class="col-md-4 offset-1">
		            <div class="form-group">
		              <label for="exampleMatricule" class="bmd-label-floating" >Numero d'inscription</label>
		              <input type="text" name="num_inscription" class="form-control" id="exampleMatricule">
		            </div>
	            </div>
	            <div class="col-md-4">
		            <div class="form-group">
		              <label for="exampleEmail" class="bmd-label-floating">Email </label>
		              <input type="email" name="email" class="form-control" id="exampleEmail">
		            </div>
	            </div>
	            <div class="col-md-2">
		            <div class="form-group">
                        <button type="submit" class="btn btn-info btn-round" title="détail"><i class="material-icons">search</i></button>
		            </div>
	            </div>
	            <div class="col-md-9 offset-1">
	            	<span id="msg" style="text-align: center;color: red;display: none;">Remplis une de deux champs !</span>
	            </div>
	        </div>    

          </form>
      </div>
    </div>

	<div class="col-md-12">
	  <div class="card">
	
	    <div class="card-body">
	      <div class="toolbar">
	        <!--        Here you can write extra buttons/actions for the toolbar              -->
	      </div>
	      <div class="material-datatables">
	
	      	<a href="{{url('/inscription/new')}}" type="button" class="btn btn-success btn-round" title="Ajouter">
	      		<i class="material-icons">add</i>
          	</a>
	
	        <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
	          <thead>
	            <tr>
	              <th style="color: red"><b>Numero d'inscription</b></th>
	              <th style="color: red"><b>Prénom Nom</b></th>
	              <th style="color: red"><b>Catégorie</b></th>
	              <th style="color: red"><b>Niveau</b></th>
	              <th style="color: red"><b>Classe</b></th>
	              <th style="color: red"><b>Tarif</b></th>
	              <th style="color: red"><b>Année</b></th>  
	              <th style="color: red"><b>Création</b></th>   
	              <th class="disabled-sorting"></th>
	              <th class="disabled-sorting"></th>
	              <th class="disabled-sorting"></th>
	              <th class="disabled-sorting"></th>
	              <th class="disabled-sorting"></th>
	            </tr>
	          </thead> 
	          <tbody>
	            @foreach($inscriptions as $inscription)
	            <tr>
	              <td>{{ $inscription->num_inscription }}</td> 
	              <td>{{ $inscription->etudiants->users->prenom }} {{ $inscription->etudiants->users->nom }}</td> 
	              <td>{{ $inscription->categories->titre }}</td>
	              <td>{{ $inscription->niveaus->titre }}</td> 
	              <td>{{ $inscription->classes->titre }}</td> 
	              <td>{{ $inscription->tarif }}</td> 
	              <td>{{ $inscription->années->titre }}</td> 
	              <td>{{ $inscription->created_at->format('d-m-Y') }}</td> 
	              <td class="td-actions text-right">
	               	<a href="{{url('/inscription/'.$inscription->id)}}" type="button" class="btn btn-info btn-round" title="détail"><i class="material-icons">remove_red_eye</i> 
                  	</a> 
                  </td>
                  <td class="td-actions text-center">
	               	<a href="{{url('/payment/add/'.$inscription->id)}}" id="payer" type="button" data-toggle="modal" data-target="#payer" 
	               		data-id="{{ $inscription->id }}" data-num_inscription="{{ $inscription->num_inscription }}" 
	               		data-etudiant_id="{{ $inscription->etudiant_id }}" data-tarif="{{ $inscription->tarif }}" 
	               		data-année_id="{{ $inscription->annee_id }}" class="btn btn-info btn-success" title="payer">
	               		<i class="material-icons">euro</i> 
                  	</a> 
                  </td> 
                  <td class="td-actions text-right">
	               	<a href="{{url('/inscription/renouveler/'.$inscription->id)}}" data-id="{{ $inscription->id }}" data-num_inscription="{{ $inscription->num_inscription }}" data-etudiant_id="{{ $inscription->etudiant_id }}" data-categorie_id="{{ $inscription->categorie_id }}" data-niveau_id="{{ $inscription->niveau_id }}"
	               	data-classe_id="{{ $inscription->classe_id }}" data-tarif="{{ $inscription->tarif }}" data-année_id="{{ $inscription->annee_id }}"   type="button"  data-toggle="modal" data-target="#myModal" class="btn btn-rose btn-round" title="renouveler"><i class="material-icons">cached</i> 
                  	</a> 
                  </td>
                  <td class="td-actions text-right">
                  	<a href="{{url('/inscription/'.$inscription->id.'/edit')}}" type="button" class="btn btn-warning btn-round" title="Modifier"><i class="material-icons">edit</i> 
                  	</a> 
                  </td>
                  <td class="td-actions text-right">
                  	 <form action="{{url('/inscription/'.$inscription->id)}}" method="post">
	                      {{csrf_field()}}
	                      {{method_field('DELETE')}}
	                      <button type="submit"  class="btn btn-danger btn-round" title="Suprimer" style="padding: 6px;">
	                      <i class="material-icons">close</i>
	                      </button>
                     </form>  
	              </td>
	            </tr>              
	            @endforeach       
	          </tbody>
	        </table>
	      </div>
	    </div>
	    <!-- end content-->
	  </div>
	  <!--  end card  -->
	</div>
	<!-- end col-md-12 -->
</div> 

<!-- Classic Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <h4 class="modal-title"><b>Renouvelé l'inscirption</b> </h4>
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true" >
        <i class="material-icons">clear</i>
      </button>
    </div>

  <form method="post" action="{{route('inscription_renouveler')}}">
  {{ csrf_field() }} 
    <div class="modal-body">
	<div class="row justify-content-center"> 
    	<input type="hidden" id="id" name="id">
    	<input type="hidden" id="num_inscription" name="num_inscription">
    	<input type="hidden" id="etudiant_id" name="etudiant_id">
    	<input type="hidden" id="categorie_id" name="categorie_id">
    	<input type="hidden" id="niveau_id" name="niveau_id">
    	<input type="hidden" id="classe_id" name="classe_id"> 
    	<input type="hidden" id="tarif" name="tarif"> 
    	<input type="hidden" value="Oui"  name="transport"> 
    	<input type="hidden" value="Oui" name="cantine"> 

        <div class="col-sm-12">
          <div class="form-group select-wizard">
            <label>Année Scholaire</label>
            <select class="selectpicker" data-size="7" data-style="select-with-transition" name="année_id" id="année_id" title="Single Select"> 
              @foreach($années as $année)
              <option value="{{ $année->id }}" > {{ $année->titre}} </option> 
              @endforeach
            </select>
          </div>
        </div>
       
      </div>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-danger btn-link" data-dismiss="modal">Close</button>
      <button type="submit" class="btn btn-rose" >Enregistrer</button>
    </div>
   </form>
  </div>
</div>
</div>
<!--  End Modal -->

   <!-- notice modal -->
<div class="modal fade" id="payer" tabindex="-1" role="dialog" aria-labelledby="payerLabel" aria-hidden="true">
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="myModalLabel"><b>Payement</b></h5>
    
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
        <i class="material-icons">close</i>
      </button>
    </div>

    <div class="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <i class="material-icons">close</i>
        </button>
        <span style="text-align: center;">
          <b>Modalité:</b> {{ $inscription->modalité }}  &nbsp; | &nbsp; 
          <b>Tarif: </b> {{ $inscription->tarif }}       &nbsp; | &nbsp; 
          <b> Numéro: </b> {{ ($inscription->num_inscription ) }} 
        </span>
    </div>	

  <form method="post" action="{{url('/payment')}}">
  {{ csrf_field() }} 
    <div class="modal-body">
 
		<div class="row"> 
	    	<input type="hidden" id="id" name="inscription_id">
	     	<input type="hidden" id="etudiant_id" name="etudiant_id">
 	 
		    <div class="col-sm-6">
		      <div class="form-group select-wizard">
 		        <select class="selectpicker" data-size="7" data-style="select-with-transition" name="année_id" id="année_id" title="Année Scholaire">
		          @foreach($années as $année)
		          <option value="{{ $année->id }}" > {{ $année->titre}} </option> 
		          @endforeach
		        </select>
		      </div>
		    </div>

		     <div class="col-sm-6">
		      <div class="form-group select-wizard">
 		        <select class="selectpicker" data-size="7" data-style="select-with-transition" name="mois" title="Mois"> 
		          <option value="1"> Janvier </option>  
		          <option value="2"> Février </option>  
		          <option value="3"> Mars </option>  
		          <option value="4"> Avril </option>  
		          <option value="5"> Mai </option>  
		          <option value="6"> Juin </option>  
		          <option value="7"> Juillet</option>  
		          <option value="8"> Aout </option>  
		          <option value="9"> Septembre </option>  
		          <option value="10"> Octobre </option>  
		          <option value="11"> Novembre </option>  
		          <option value="12"> Décembre </option>  
	 	        </select>
		      </div>
		    </div>

		    <div class="col-sm-6">
		      <div class="form-group select-wizard">
 		        <select class="selectpicker" data-size="7" data-style="select-with-transition" name="mode" title="Mode"> 
		          <option value="cb"> Carte Bancaire </option> 
		          <option value="cheque"> Chèque </option> 
		          <option value="liquide" > Liquide </option> 
	 	        </select>
		      </div>
		    </div>

 	          <div class="col-sm-6">
	            <div class="form-group">
	              <input type="number" class="form-control" name="versement" placeholder="Versement : 1500 ">
	            </div>
	          </div>

	          <div class="col-sm-12">
	            <div class="form-group">
	                <textarea class="form-control" rows="5" name="description" placeholder="Description"></textarea>
	            </div>
	          </div>
 
	    </div>
 	
 	</div>

 </form>

    <div class="modal-footer justify-content-right">
      <button type="button" class="btn btn-danger btn-link" data-dismiss="modal">Close</button>
      <button type="submit" class="btn btn-rose" >Enregistrer</button>
    </div>
  
  
</div>
</div>
</div>

<!-- end notice modal -->

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<script>

function validateForm() {
  var x = document.forms["myForm"]["email"].value;
  var y = document.forms["myForm"]["num_inscription"].value;
  if (x == "" && y =="") {
    //alert("Remplis une de deux champs !"); 
        document.getElementById('msg').style.display='block';

    return false;
  }
}
</script>
 
<script language="javascript" type="text/javascript">
    $(document).ready(function() {

	  $('a[data-toggle=modal], button[data-toggle=modal]').click(function () {

	    var id = '';
	    var num_inscription = '';
		var etudiant_id = '';
		var categorie_id = '';
		var niveau_id = '';
		var classe_id = '';
		var	tarif = '';
		var	année_id = '';

	    //if (typeof $(this).data('id') !== 'undefined') {

	      data_id = $(this).data('id');
	      data_num_inscription = $(this).data('num_inscription');
	      data_etudiant_id = $(this).data('etudiant_id');
	      data_categorie_id = $(this).data('categorie_id');
	      data_niveau_id = $(this).data('niveau_id');
	      data_classe_id = $(this).data('classe_id');
	      data_tarif = $(this).data('tarif');
	      data_année_id = $(this).data('année_id');
	    //}


	    $('#id').val(data_id);
	    $('#num_inscription').val(data_num_inscription);
	    $('#etudiant_id').val(data_etudiant_id);
	    $('#categorie_id').val(data_categorie_id);
	    $('#niveau_id').val(data_niveau_id);
	    $('#classe_id').val(data_classe_id); 
	    $('#tarif').val(data_tarif);
	    $('#année_id').val(data_année_id);
	    //alert(data_num_inscription);

 		$('#année_id option[value="'+data_année_id+'"]').attr("disabled", true);

	  });

	  $('a[data-target=payer], button[data-target=payer]').click(function () {

	    var id = '';
	    var num_inscription = '';
		var etudiant_id = ''; 
 		var	année_id = '';

 
	      data_id = $(this).data('id');
	      data_num_inscription = $(this).data('num_inscription');
	      data_etudiant_id = $(this).data('etudiant_id'); 
 	      data_année_id = $(this).data('année_id');
 

	    $('#id').val(data_id);
	    $('#num_inscription').val(data_num_inscription);
	    $('#etudiant_id').val(data_etudiant_id);  
 	    $('#année_id').val(data_année_id);
 
	  })
	});
</script>
<script type="text/javascript">
    $(function () {
        $("#payer").click(function () {
            var id = $(this).data('id');
           alert('ici');

        })
    });
</script>
@endsection