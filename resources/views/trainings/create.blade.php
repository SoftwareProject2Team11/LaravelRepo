@extends('layouts.app')

@section('content')

<h1>Request a Training</h1>

{!! Form::open(['action' => 'TrainingRequestsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    <div class="form-group">
        {{Form::label('trainingName', 'Training Name')}}
        {{Form::text('trainingName', '', ['class' => 'form-control', 'placeholder' => 'Write a Training Name'])}}
    </div>

    <div class="form-group">
        {{Form::label('reason', 'Reason')}}
        {{Form::text('reason', '', ['class' => 'form-control', 'placeholder' => 'Write a reason on why you would like to receive this course'])}}
    </div>


    {{Form::submit('Request', ['class' => 'btn btn-primary'])}}
{!! Form::close() !!}

@endsection