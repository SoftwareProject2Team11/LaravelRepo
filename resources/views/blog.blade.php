@extends('layouts.app') @section('content')
<div class="container">
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<div class="panel panel-default panel-custom">
				<div class="panel-heading">Blog</div>

				<div class="panel-body">

					<h3>Your Posts</h3>
					@if(count($posts) > 0)
					<table class="table table-striped">
						<tr>
							<th>Title</th>
							<th>Created on</th>
							<th></th>
						</tr>
						@foreach($posts as $post)
						<tr>
							<td>{{$post->title}}</td>

                            <td>{{$post->created_at}}</td>
                            <td><a href="/posts/{{post->id}}/edit" class="btn btn-default">Edit</a></td>
							<td>{!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
								{{Form::hidden('_method', 'DELETE')}} {{Form::submit('Cancel', ['class' => 'btn btn-danger'])}} {!!Form::close()
								!!}
							</td>
						</tr>
						@endforeach
					</table>
					<div class="col-md-12 text-center">
						<a href="/posts/create" class="btn btn-primary">Create a Post</a>
					</div>

					@else
					<p>You have not requested any trainings (yet)!</p>
					<div class="col-md-12 text-center">
                    <a href="/posts/create" class="btn btn-primary">Create a Post</a>						
					</div>
					@endif
				</div>
			</div>
		</div>
	</div>
</div>
@endsection