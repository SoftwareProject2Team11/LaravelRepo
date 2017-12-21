@extends('layouts.app') @section('content')
<h1 class="text-center">Posts</h1>
@if(count($posts) > 0) @foreach($posts as $post)
<a href="/posts/{{$post->id}}">
<div class="well">
	<div class="row">
		<div class="col-md-4 col-sm-4">
        <img style="width:40%" src="/storage/cover_images/{{$post->cover_image}}">
		</div>
		<div class="col-md-4 col-sm-8">
			<h3>
				{{$post->title}}
			</h3>
			<small>Written on {{$post->created_at}}
			<br>by <b>{{$post->user->name}}</b></small>
		</div>
	</div>
</div>
</a>
@endforeach {{$posts->links()}} @else
<p>No posts found</p>
@endif @endsection