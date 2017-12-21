@extends('layouts.app')

@section('content')

<?php
	$userIsMan = DB::table('users')
	->select('manager')
	->where('id', $userId)
	->get();

	$userIsMan = substr($userIsMan, 12, -2);
?>

@if($userIsMan == "0")
<h1>Fill in the keycode to graduate to manager</h1>

{!! Form::open(['action' => 'keyCodeForManController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}

    <div class="form-group">
        {{Form::label('keyCode', 'Key Code')}}
        {{Form::text('keyCode', '', ['class' => 'form-control', 'placeholder' => 'Fill in the keyCode'])}}
    </div>

    {{Form::submit('Enter', ['class' => 'btn btn-primary'])}}

{!! Form::close() !!}
@else
<p>You are already a manager</p>
@endif

@endsection