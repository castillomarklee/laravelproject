@extends('layouts.app')

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

	 					

	 				</div>
	 			</div>
	 	</div>
	 </div>

</div>

 
@endsection