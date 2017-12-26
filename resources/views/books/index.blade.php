@extends('layouts.app')
@section('content')

<div class="books result">
	<h1 class="text-center">Search Books</h1>
	<h3 class="text-center">It is possible to search books by title or author in the Google Books Library</h3>
	<div class="form-group">
		<input id="search" placeholder="Title or Author">
		<br><br>
		<button id="button" class ="btn btn-primary" type="submit">Search</button>
		<button id="button2" class ="btn btn-primary" type="button" onClick="document.location.reload(true)">New Search</button>
		<div id="result"></div>
	</div>

<script src="{{ asset('js/javascriptGoogleBooksApi.js') }}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>

@endsection