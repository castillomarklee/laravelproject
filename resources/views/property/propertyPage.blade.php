@extends('layouts.app')

<!-- Scripts -->
<script type="text/javascript" src="{{ asset('public/bower_components/jquery/dist/jquery.min.js') }}"></script>

<script type="text/javascript">
	

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
				});

		}
		

	
</script>

@section('content')
<div class="container">
	
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

	 						@foreach($properties as $property)

	 							<div class="well">
	 								<h3><a id="asdsad" style="cursor: pointer;" data-toggle="modal" data-target="#propertyDetails" onclick="getPropertiesDetails('{{ $property->uid }}')">{{$property->listingname}}</a></h3>
	 								<small><b>Created at: </b>{{$property->created_at}}</small>
	 							</div>

	 						@endforeach

	 						<div class="col-md-offset-4">{{ $properties->links() }}</div>

	 					@else

	 						<h3>No Properties</h3>

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
      		
      		<div class="col-xs-8 col-xs-offset-1">
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
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

</div>
 
@endsection