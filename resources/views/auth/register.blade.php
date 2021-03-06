@extends('main')

@section('title','| Register')

@section('content')

		<div class="row">
			<div class="col-md-4 col-md-offset-3">
				{!! Form::open() !!}

				{{ Form::label('name','Name:')}}
				{{ Form::text('name', null, ['class' => 'form-control'])}}
				<br>
				{{ Form::label('email','Email:')}}
				{{ Form::email('email', null, ['class' => 'form-control'])}}
				<br>
				{{ Form::label('password', 'Password:')}}
				{{ Form::password('password', ['class' => 'form-control'])}}
				<br>
				{{ Form::label('password_confirmation', 'Confirm Password:')}}
				{{ Form::password('password_confirmation', ['class' => 'form-control'])}}

				<br><br>
				{{ Form::submit('Register',['class' => 'btn btn-primary'])}}

			{!! Form::close()!!}
				
			</div>
		</div>
	


@endsection