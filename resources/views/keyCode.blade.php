@extends('layouts.app')

@section('content')

<h1>Fill in the keycode to make a new account</h1>

{!! Form::open(['action' => 'keyCodeController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}

    <div class="form-group">
        {{Form::label('keyCode', 'Key Code')}}
        {{Form::text('keyCode', '', ['class' => 'form-control', 'placeholder' => 'Fill in the keyCode'])}}
    </div>

    {{Form::submit('Enter', ['class' => 'btn btn-primary'])}}

{!! Form::close() !!}

@endsection