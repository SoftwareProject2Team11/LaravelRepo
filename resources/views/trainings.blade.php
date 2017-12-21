@extends('layouts.app') @section('content')
<h1>All Trainings</h1>
@if(count($trainings) > 0) 
@foreach($trainings as $training)
<div class="well">
	<div class="row">
		<div class="col-md-4 col-sm-8">
			<h3>
				{{$training->trainingName}}
			</h3>
		</div>
	</div>
</div>
@endforeach 
@else
<p>No trainings found</p>
@endif @endsection