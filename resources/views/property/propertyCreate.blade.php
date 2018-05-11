@extends('layouts.app')

@section('content')
<div class="container">
	
	 <div class="panel panel-default">
	 	<div class="panel-heading" style="font-size: 20px;"><i class="fa fa-box"></i>  	Add Property</div>
	 	<div class="panel-body">
	 			<button class="btn btn-primary btn-md col-md-1" onclick="window.location='{{ url("/property") }}'"><span class="glyphicon glyphicon-arrow-left"></span> Back</button>
	 			<br><br><br><br>
	 			<div class="row">
	 				<div class="col-md-8 col-md-offset-2">
	 					@if($errors->any())

	 					<div class="alert alert-danger">
	 						<ul>
	 							@foreach($erros as $error)
	 								<li>{{ $error }}</li>
	 							@endforeach
	 						</ul>
	 					</div>

	 					@endif()

	 					<br>

	 					<h1>Information Details</h1>

	 					<br><br>

	 					<form method="POST" action="{{ action('PropertiesController@store') }}">
	 						<input class="form-control" type="text" name="listingName" placeholder="Listing Name"><br>
	 						<input class="form-control" type="text" name="agent" placeholder="Agent"><br>
	 						<input class="form-control" type="text" name="agentEmail" placeholder="Agent Email"><br>
	 						<input class="form-control" type="text" name="clientEmail" placeholder="Client Email"><br>
	 						<input class="form-control" type="text" name="propertyAddress" placeholder="Property Address"><br>
	 						<input type="hidden" name="_token" value="{{ csrf_token() }}">
	 						<div class="row">
	 							<div class="col-md-2">
	 								<h4>Facebook: </h4> 
	 							</div>
	 							<div class="col-md-10">
	 								<select class="form-control" name="facebook">
	 									<option>Set Number</option>
								        <option>1</option>
								        <option>2</option>
								        <option>3</option>
								    </select>
	 							</div>
	 						</div>
	 						<div class="row">
	 							<div class="col-md-2">
	 								<h4>Twitter: </h4> 
	 							</div>
	 							<div class="col-md-10">
	 								<select class="form-control" name="twitter">
	 									<option>Set Number</option>
								        <option>1</option>
								        <option>2</option>
								        <option>3</option>
								    </select>
	 							</div>
	 						</div>
	 						<div class="row">
	 							<div class="col-md-2">
	 								<h4>Instagram: </h4> 
	 							</div>
	 							<div class="col-md-10">
	 								<select class="form-control" name="Instagram">
	 									<option>Set Number</option>
								        <option>1</option>
								        <option>2</option>
								        <option>3</option>
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