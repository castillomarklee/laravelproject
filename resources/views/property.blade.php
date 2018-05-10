@extends('layouts.app')

@section('content')

<div>
	<h2>{{ Auth::user()->name }}</h2>
	<h1>{{ $name }}</h1>
</div>

@endsection