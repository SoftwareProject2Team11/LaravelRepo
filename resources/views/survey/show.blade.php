@extends('layouts.app')

@section('content')

<h1 class="text-center">Survey for <?php echo $trainings->trainingName?></h1>

<div class="row">
            <div class="col-lg-12">

	            <?php
	            	$trainingId = $trainings->trainingId;

	            	$questions = DB::table('Question')
	            	->leftJoin('Answer', 'Question.questionId', '=', 'Answer.questionId')
	            	->select('Question.*')
	            	->where([
	            		['trainingId', '=', $trainingId],
	            		['Answer.userId', '=', null],
	            	])
	            	->get();

/*
	            	$questions = DB::table('Question')
	            	->join('Answer', 'Question.questionId', '=', 'Answer.questionId')
	            	->where([
	            		['trainingId', '=', $trainingId],
	            		['userId', '=', auth()->user()->id],
	            	])
	            	->get();
*/

	            ?>	

	            @if(count($questions) > 0)
	            @foreach($questions as $question)
					<div class="row">
						<div class="col-md-4 col-sm-8">
							<h3>
								{{$question->question}}
							</h3>


								{!! Form::open(['action' => 'surveyListController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}

								<div class="form-group">
                    				<!--
									{{Form::radio('answer', 'GOOD') }}
									{{Form::radio('answer', 'BAD') }}<br>
									-->
									{{Form::textArea('answer', '', ['class' => 'form-control', 'placeholder' => 'Write your answer'])}}

								</div>

                				<div class="form-group">
                   	 				{{Form::hidden('questionId', 'ID of this training')}}
                    				{!! Form::hidden('questionId', $question->questionId, ['class' => 'form-control', 'readonly']) !!}
               	 				</div>
               	 				{{Form::submit('Submit', ['class' => 'btn btn-primary'])}}		
                				{!! Form::close() !!}
						</div>
					</div>
				@endforeach
				@else
					<h3 class="text-center">All questions have been answered</h3>
				@endif
			</div>
</div>

@endsection