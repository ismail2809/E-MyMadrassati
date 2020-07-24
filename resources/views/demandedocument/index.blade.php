@extends('back.master') 
@section('title','Demandes documents')

@section('content') 

<div class="row">
	<div class="col-md-12">
	  <div class="card">
	    <div class="card-header card-header-info card-header-icon">
	      <div class="card-icon">
	        <i class="material-icons">assignment</i>
	      </div>
	      <h4 class="card-title">Documents</h4>
	    </div>
	    <div class="card-body">
	      <div class="toolbar">
	        <!--        Here you can write extra buttons/actions for the toolbar              -->
	      </div>
	      <div class="material-datatables">
	           <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
	          <thead>
	            <tr style="text-align: center;">
 	              <th style="color: red"><b>Prénom Nom</b></th> 
 	              <th style="color: red"><b>Sujet</b></th>
 	              <th style="color: red"><b>Date</b></th>   	              
	              <th style="color: red"><b>Année</b></th>  
	              <th style="color: red"><b>actions</b></th>
	            </tr>
	          </thead> 
	          <tbody>
	            @foreach($demandes as $demande)
	            <tr style="text-align: center;">
 	              <td>{{ $demande->users->prenom }} {{ $demande->users->nom }}</td> 
 	              <td>{{ $demande->sujet }}</td> 
	              <td>{{ isset($demande->created_at)?$demande->created_at->format('d-m-Y'):$demande->created_at }}</td> 
 	              <td>{{ $demande->années->titre }}</td> 
	              <td class="td-actions text-center">
                      <button class="btn btn-info btn-round" data-toggle="modal" data-target="#myModal" data-id="{{ $demande->id }}" data-sujet="{{ $demande->sujet }}" data-description="{{ $demande->description }}" data-année="{{ $demande->années->titre }}" class="btn btn-info btn-success" title="Détail">
                         <i class="material-icons">remove_red_eye</i>
                      </button>
                       
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
          <h4 class="modal-title"><b>Détail de la demande </b></h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
            <i class="material-icons">clear</i>
          </button>
        </div>
        <div class="modal-body">
        	<div class="row">
        		<div class="col-md-12">
		            <p style="text-align: center;" id="sujet">{{ $demande->sujet }}</p>          	
        		</div>
        		<br>
	           	<div class="col-md-12">
	           		<p>{{ $demande->description }}</p> 
	           	</div>    	           	        		
        	</div>      
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger btn-link" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
<!--  End Modal -->

<script language="javascript" type="text/javascript">
    $(document).ready(function() {

	  $('button[data-toggle=modal]').click(function () {

	    data_id 		 = $(this).data('id');	
	    data_sujet  	 = $(this).data('sujet');	
	    data_description = $(this).data('description');
	    data_année 		 = $(this).data('année');

	    $('#id').val(data_id);
	    $('#sujet').val(data_sujet);
	    $('#description').val(data_description); 
	    $('#année_id').val(data_année);	     		

	  });

});
</script>	  
@endsection