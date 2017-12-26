@extends('layouts.app') 

@section('content')

<?php
	$userIsMan = DB::table('users')
	->select('manager')
	->where('id', auth()->user()->id)
	->get();

	$userIsMan = substr($userIsMan, 12, -2);
?>

    @if($userIsMan == "0")
    <div class="">
    <p>not authorized for this page</p>

    @else
    <h1 class="text-center">Training Requests</h1>
    <h3 class="text-center">Approve or Refuse Training Requests</h3>
</div>


    <br /> 
    @foreach($trainingrequests as $trainingrequest)
    <div class="col-lg-4 col-md-6 col-sm-6 managerDashboard">
        <div class="panel col-lg-12 trainingRequest">
            <div class="row">
                <div class="col-lg-12 text-left">

                    <?php
						$trainingId = $trainingrequest->trainingId;

						$trainingName = DB::table('Training')
						->select('trainingName')
						->where('trainingId', $trainingId)
						->get();

						$userId = $trainingrequest->user_id;

						$userName = DB::table('users')
						->select('name')
						->where('id', $userId)
						->get();

						$userMail = DB::table('users')
						->select('email')
						->where('id', $userId)
						->get();

						$currentState = "";

						
						if ($trainingrequest->status == 1){
							$currentState = "Not yet seen";
						}
						elseif ($trainingrequest->status == 2) {
							$currentState = "Approved";
						}
						else{
							$currentState = "Refused";
						}
						
					?>


                        <div class="panel-heading
						<?php if($trainingrequest->status == 3) { echo 'refused'; } ?>
        <?php if($trainingrequest->status == 2) { echo 'approved'; } 
        else { echo 'standard'; }

		?>
						
						">
                            <h3 class="text-center">
                                <?php echo "Request ID: " . $trainingrequest->requestId ?>
                            </h3>
                        </div>

                        <div class="panel-body">
                        <div class="row">
                        <h4 class="col-lg-4 col-md-3 col-sm-3 col-xs-3 text-left">
                        Training:
                        <br>
                        <br>
                        User:
                        <br>
                        <br>
                        E-Mail:
                        <br>
                        <br>
                        Reason:
                        </h4>

                        <h4 class="col-lg-8 col-md-9 col-sm-9 col-xs-9 text-right">
                        <b>
                        <?php echo substr($trainingName, 18, -3) ?>
                        <br>
                        <br>
                        <?php echo substr($userName, 10, -3) ?>
                        <br>
                        <br>
                        <?php echo substr($userMail, 11, -3) ?>
                        <br>
                        <br>
                        {{$trainingrequest->reason}}
                        </b>
                        </h4>
                        </div>
                        
                            
							<br>
                            @if($trainingrequest->status == 2)
                            <div class="row text-center">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <h3 class="text-center">Approved</h3>
                </div>
              
                <div class="col-lg-6">
                        {!! Form::open(['action' => ['ManageTrainingsController@update', $trainingrequest->requestId], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!} {!! Form::hidden('requestId', $trainingrequest->requestId, ['class' => 'form-control', 'readonly']) !!} {!! Form::hidden('status', 1, ['class' => 'form-control', 'readonly']) !!} {{Form::hidden('_method','PUT')}} {{Form::submit('Edit', ['class' => 'btn-edit'])}} {!! Form::close() !!}
                </div>
                </div>
                    
                            @elseif($trainingrequest->status == 3)
                            <div class="row text-center">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <h3 class="text-center">Refused</h3>
                    </div>
                  
                    <div class="col-lg-6">
                            {!! Form::open(['action' => ['ManageTrainingsController@update', $trainingrequest->requestId], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!} {!! Form::hidden('requestId', $trainingrequest->requestId, ['class' => 'form-control', 'readonly']) !!} {!! Form::hidden('status', 1, ['class' => 'form-control', 'readonly']) !!} {{Form::hidden('_method','PUT')}} {{Form::submit('Edit', ['class' => 'btn-edit'])}} {!! Form::close() !!}
                    </div>
                    </div>
                            
							@endif
							




                            @if($trainingrequest->status == 1)
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 text-center">
                                    {!! Form::open(['action' => ['ManageTrainingsController@update', $trainingrequest->requestId], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!} {!! Form::hidden('requestId', $trainingrequest->requestId, ['class' => 'form-control', 'readonly']) !!} {!! Form::hidden('status', 2, ['class' => 'form-control', 'readonly']) !!} {{Form::hidden('_method','PUT')}} {{Form::submit('Approve', ['class' => 'btn btn-primary btn-approve'])}} {!! Form::close() !!}
                                </div>

                                <div class="col-lg-6  col-md-6 col-sm-6 col-xs-6 text-center">
                                    {!! Form::open(['action' => ['ManageTrainingsController@update', $trainingrequest->requestId], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!} {!! Form::hidden('requestId', $trainingrequest->requestId, ['class' => 'form-control', 'readonly']) !!} {!! Form::hidden('status', 3, ['class' => 'form-control', 'readonly']) !!} {{Form::hidden('_method','PUT')}} {{Form::submit('Refuse', ['class' => 'btn btn-primary btn-refuse'])}} {!! Form::close() !!}

                                </div>
                            </div>
                            @endif
                        </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    @endforeach @endif @endsection