@extends('layouts.app')
@section('content')

<h1 class="text-center">Choose a Training</h1>
<br>
@if(count($traininglists) > 0)
 @foreach($traininglists as $traininglist)
 <a href="/traininglist/{{$traininglist->trainingId}}">
<div class="col-lg-6">
		<div class="well col-lg-12">
			<div class="row">
				<div class="col-lg-12 text-center">
					<h3>
						{{$traininglist->trainingName}}
					</h3>
						{!!$traininglist->trainingSummary!!}
				</div>
			</div>
		</div>
</div>
</a>
@endforeach  
@else
<p>No trainings found</p>
@endif @endsection