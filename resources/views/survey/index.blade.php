@extends('layouts.app')
@section('content')

<h1 class="text-center">Choose a Training</h1>
<br>
@if(count($trainings) > 0)
 @foreach($trainings as $training)
 <a href="/survey/{{$training->trainingId}}">

<div class="well col-lg-8 col-lg-offset-2">
	<div class="row">
		<div class="col-lg-12">
			<h3>
				<?php
					$trainingId = $training->trainingId;

					$trainingName = DB::table('Training')
					->select('trainingName')
					->where('trainingId', $trainingId)
					->get();

					echo substr($trainingName, 18, -3);
				?>
			</h3>
		</div>
	</div>
</div>
</a>
@endforeach
@else
<h3 class="text-center">You have no approved trainings</h3>
@endif @endsection