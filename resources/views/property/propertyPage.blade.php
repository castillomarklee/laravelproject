@extends('layouts.app')

<!-- Scripts -->
<script type="text/javascript" src="{{ asset('public/bower_components/jquery/dist/jquery.min.js') }}"></script>
<script type="text/javascript">
	var baseURL = "{{ url('/')}}";
	var GlobalID ="";
		function getPropertiesDetails(uid) {
			
				$.get("property/" + uid , function(data) {
					console.log(data);
					$('propertyDetails').modal('show');
					$('#listingName').html("<b>"+"Listing Name: " + "</b>" + data[0].listingname);
					$('#agentName').html("<b>"+"Agent: " + "</b>" + data[0].agent);
					$('#agentEmail').html("<b>"+"Agent Email: " + "</b>" + data[0].agentemail);
					$('#clientEmail').html("<b>"+"Client Email: " + "</b>" + data[0].clientemail);
					$('#propertyAddess').html("<b>"+"Property Address: " + "</b>" + data[0].propertyaddress);
					$('#createdAt').html("<b>"+"Created At: " + "</b>" + data[0].created_at);
					$('#propertyId').val(data[0].uid);
					GlobalID = data[0].uid;
				});

		}

		function editProperty() {
			window.location.href =baseURL+"/property/edit/"+GlobalID;	
		}

		function deleteProperty() {
			// $.post(baseURL+ "/property/delete/" + GlobalID, function(data) {
			// 	console.log(data);
			// });
			$.ajax({
			    type: "POST",
			    url: baseURL+ "/property/delete/" + GlobalID,
			    data: { somefield: "Some field value", _token: '{{csrf_token()}}' },
			    success: function (data) {
			       if(data == 1) {
			       		location.reload();
			       } else {
			       	location.reload();
			       }
			    },
			    error: function (data, textStatus, errorThrown) {
			        if(data == 1) {
			       		location.reload();
			       } else {
			       	location.reload();
			       }
			    },
			});
		}

		$(document).ready(function() {
		    $('#propertyTable').DataTable({
		    	"lengthChange": false,
	            "pageLength": 10
		    });
		} );
	
</script>

@section('content')
<div class="container">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	 <div class="panel panel-default">
	 	<div class="panel-heading" style="font-size: 20px;"><i class="fa fa-box"></i>  Property</div>
	 	<div class="panel-body">
	 			<button class="btn btn-primary btn-md col-md-1" onclick="window.location='{{ url("/home") }}'"><span class="glyphicon glyphicon-arrow-left"></span> Back</button>
	 			<button class="btn btn-warning btn-md col-md-1 pull-right" onclick="window.location='{{ url("/property/create") }}'"><i class="fas fa-plus-circle"></i> Add</button>
	 			<br><br><br><br>
	 			<div class="row">
	 				<div class="col-md-8 col-md-offset-2">
	 					<h1>Property List</h1>

	 					<br><br>

	 					@if(count($properties) > 0)

	 						

	 							<div class="well">
	 								
	 								<div class="table-responsive">          
									  <table class="table" id="propertyTable">
									    <thead>
									      <tr>
									        <th>Listing Name</th>
									        <th>Agent</th>
									        <th>Date Created</th>
									      </tr>
									    </thead>
									    <tbody>
									    	@foreach($properties as $property)
										      <tr>
										         <td><a id="asdsad" style="cursor: pointer;" data-toggle="modal" data-target="#propertyDetails" onclick="getPropertiesDetails('{{ $property->uid }}')">{{ $property->listingname }}</a></td>
										         <td>{{ $property->agent }}</td>
										         <td>{{ $property->created_at }}</td>
										      </tr>
										    @endforeach
									    </tbody>
									  </table>
									  </div>
	 							</div>

	 						

	 						<div class="col-md-offset-4">{{ $properties->links() }}</div>

	 					@else

	 						<div class="well">
	 							<h3>No Properties</h3>
	 						</div>

	 					@endif

	 					<br><br>

	 			

	 				</div>
	 			</div>
	 	</div>
	 </div>

<!-- Property details -->

<div id="propertyDetails" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h2 class="modal-title">Property Details</h2>
      </div>
      <div class="modal-body">

      	<div class="row" style="padding-top: 10px;">
      		
      		<div class="col-xs-10 col-xs-offset-1">
      				
      			<input type="hidden" id="propertyId">
      			<h5 id="listingName" style="font-size: 18px;"></h5>
      			<h5 id="agentName" style="font-size: 18px;"></h5>
      			<h5 id="propertyAddess" style="font-size: 18px;"></h5>
      			<h5 id="createdAt" style="font-size: 18px;"></h5>
      			<h5 id="agentEmail" style="font-size: 18px;"></h5>
      			<h5 id="clientEmail" style="font-size: 18px;"></h5>
      		</div>

      	</div>

      </div>

      <div class="modal-footer">
      	<button type="button"  class="btn btn-primary"  onclick="editProperty()">Edit</button>
      	<button type="button" class="btn btn-danger" onclick="deleteProperty()">Delete</button>
        <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

</div>


 
@endsection