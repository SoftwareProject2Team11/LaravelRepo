@extends('layouts.app')

@section('content')
<a href="/posts" class="btn btn-default"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>
<h1>{{$post->title}}</h1>
 <img style="width:50%" src="/storage/cover_images/{{$post->cover_image}}">
 <br>
 <br>
<div>
    {!!$post->body!!}
</div>
<hr>
<small>Written on {{$post->created_at}} by {{$post->user->name}}</small>

<hr>
@if(!Auth::guest())
    @if(Auth::user()->id == $post->user_id)
<a href="/posts/{{$post->id}}/edit" class="btn btn-default"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
 Edit</a>

{!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
    {{Form::hidden('_method', 'DELETE')}}
    {{Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i>
 Delete', ['class' => 'btn btn-danger', 'type' => 'submit'])}}
{!!Form::close() !!}
@endif
@endif
@endsection