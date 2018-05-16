@extends('layouts.app')

<!-- Scripts -->
<script type="text/javascript" src="{{ asset('public/bower_components/jquery/dist/jquery.min.js') }}"></script>
<script type="text/javascript">
	
	var facebook = {{ $propertiesData[0]->facebook }};
	var twitter = {{ $propertiesData[0]->twitter }};
	var instagram = {{ $propertiesData[0]->instagram }};

	$(document).ready(function() {
		$("div#propertyFacebook select").val(facebook);
		$("div#propertyTwitter select").val(twitter);
		$("div#propertyInstagram select").val(instagram);
	});

	function sampleFunction() {
		console.log($('#listingname').val());
	}

</script>

@section('content')
<div class="container">
	
	 <div class="panel panel-default">
	 	<div class="panel-heading" style="font-size: 20px;"><i class="fa fa-box"></i>  	Edit Property</div>
	 	<div class="panel-body">
	 			<button class="btn btn-primary btn-md col-md-1" onclick="window.location='{{ url("/property") }}'"><span class="glyphicon glyphicon-arrow-left"></span> Back</button>
	 			<br><br><br><br>
	 			<div class="row">
	 				<div class="col-md-8 col-md-offset-2">
	 					
	 					@if ($errors->any())
						    <div class="alert alert-danger">
						        <ul>
						            @foreach ($errors->all() as $error)
						                <li>{{ $error }}</li>
						            @endforeach
						        </ul>
						    </div>
						@endif

	 					<br>

	 					<h1>Information Details</h1>

	 					<br><br>

	 					<form method="POST" action={{ URL::to('/property/editSubmit/' . $propertiesData[0]->id) }}>
	 						<input class="form-control" value="{{ $propertiesData[0]->listingname }}" id="listingname" type="text" name="listingName" placeholder="Listing Name"><br>
	 						<input class="form-control" value="{{ $propertiesData[0]->agent }}" type="text" name="agent" placeholder="Agent"><br>
	 						<input class="form-control" value="{{ $propertiesData[0]->agentemail }}" type="text" name="agentEmail" placeholder="Agent Email"><br>
	 						<input class="form-control" value="{{ $propertiesData[0]->clientemail }}" type="text" name="clientEmail" placeholder="Client Email"><br>
	 						<input class="form-control" value="{{ $propertiesData[0]->propertyaddress }}" type="text" name="propertyAddress" placeholder="Property Address"><br>
	 						<input type="hidden" name="_token" value="{{ csrf_token() }}">
	 						<div class="row">
	 							<div class="col-md-2">
	 								<h4>Facebook: </h4> 
	 							</div>
	 							<div class="col-md-10" id="propertyFacebook">
	 								<select class="form-control" name="facebook">
	 									<option>Set Number</option>
								        <option value="1">1</option>
								        <option value="2">2</option>
								        <option value="3">3</option>
								    </select>
	 							</div>
	 						</div>
	 						<div class="row">
	 							<div class="col-md-2">
	 								<h4>Twitter: </h4> 
	 							</div>
	 							<div class="col-md-10" id="propertyTwitter">
	 								<select class="form-control" name="twitter">
	 									<option>Set Number</option>
								        <option value="1">1</option>
								        <option value="2">2</option>
								        <option value="3">3</option>
								    </select>
	 							</div>
	 						</div>
	 						<div class="row">
	 							<div class="col-md-2">
	 								<h4>Instagram: </h4> 
	 							</div>
	 							<div class="col-md-10" id="propertyInstagram">
	 								<select class="form-control" name="instagram">
	 									<option>Set Number</option>
								        <option value="1">1</option>
								        <option value="2">2</option>
								        <option value="3">3</option>
								    </select>
	 							</div>
	 						</div><br>
	 						<button class="btn btn-primary btn-md">Submit</button>
	 					</form>

	 				</div>
	 			</div>
	 	</div>
	 </div>

</div>

 
@endsection