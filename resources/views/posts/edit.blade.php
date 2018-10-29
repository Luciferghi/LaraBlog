@extends('main')

@section('title','| Edit Post')

@section('content')

		<div class="row">

			{!! Form::model($post, ['route' => ['posts.update', $post->id], 'method' => 'PUT']) !!}
			<div class="col-md-8">
				{{ Form::label('title','Title:')}}
				{{ Form::text('title', null, ['class' => 'form-control']) }}

				{{ Form::label('body','Body:', ['class' => 'form-spacing-top'])}}
				{{ Form::textarea('body', null, ['class' => 'form-control']) }}

			</div>

			<div class="col-md-4">
				<div class="well">
					<dl class="horizontal">
						<dt>Created at:</dt>
						<dd>{{ date('M j,Y h:ia',strtotime($post -> created_at)) }}</dd>
					</dl>

					<dl class="horizontal">
						<dt>Updated at:</dt>
						<dd>{{ date('M j,Y h:ia',strtotime($post -> updated_at)) }}</dd>
					</dl>

					<div class="row">
						<div class="col-md-6">
							{!! Html::linkRoute('posts.show','Cancel',array($post->id),array('class' => 'btn btn-danger btn-block' )) !!}
							
						</div>
						<div class="col-md-6">
							{{ Form::submit('Save Changes',['class' => 'btn btn-success btn-block'])}}
							
							
						</div>
					</div>

				</div>
			
			</div>
			{!! Form::close() !!}
			<!--end of the row column-->
		</div>




@endsection