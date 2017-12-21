@extends('layouts.app') @section('content')
<div class="container">
	<div class="row">
		<div class="col-md-6 col-md-offset-3 dashboard">
			<div class="panel panel-default panel-custom">
				<div class="panel-heading">Dashboard</div>

				<div class="panel-body">

					<h3>Training Requests</h3>
					@if(count($trainingrequests) > 0)
					<table class="table table-striped">
						<tr>
							<th>Training Name</th>
							<th>Requested on</th>
							<th>Approval</th>
							<th></th>
						</tr>
						@foreach($trainingrequests as $trainingrequest)
						<tr>
							<td>
								<?php
									$trainingId = $trainingrequest->trainingId;

									$trainingName = DB::table('Training')
									->select('trainingName')
									->where('trainingId', $trainingId)
									->get();

									echo substr($trainingName, 18, -3);
								?>
							</td>

							<td>{{$trainingrequest->created_at}}</td>
							<td>
								<?php
									$statusId = $trainingrequest->status;

									if ($statusId == 1){
										echo "Pending";
									}
									elseif ($statusId == 2) {
										echo "Approved";
									}
									elseif($statusId == 3){
										echo "Refused";
									}
								?>
							</td>
							<td>{!!Form::open(['action' => ['TrainingRequestsController@destroy', $trainingrequest->requestId], 'method' => 'TRAINING', 'class' => 'pull-right'])!!}
								{{Form::hidden('_method', 'DELETE')}} {{Form::submit('Cancel', ['class' => 'btn btn-danger'])}} {!!Form::close()
								!!}
							</td>
						</tr>
						@endforeach
					</table>
					<div class="col-md-12 text-center">
						<a href="/traininglist" class="btn btn-primary">Request a Training</a>
					</div>

					@else
					<p>You have not requested any trainings (yet)!</p>
					<div class="col-md-12 text-center">
						<a href="/traininglist" class="btn btn-primary">Request a Training</a>
					</div>
					@endif
				</div>
			</div>
		</div>
	</div>
</div>
@endsection