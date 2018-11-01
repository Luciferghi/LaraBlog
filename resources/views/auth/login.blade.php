@extends('main')

@section('title','| Login')

@section('content')
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<div class="panel panel-default">
				<div class="panel-heading">LoginForm</div>
				<div class="panel-body">
					{!! Form::open() !!}
					{{ Form::label('email','Email:') }}
					{{ Form::email('email',null, ['class' => 'form-control'])}}

					{{ Form::label('password','Password:')}}
					{{ Form::password('password',['class' => 'form-control'])}}
					<br>

					{{ Form::checkbox('remember')}}{{ Form::label('remeber','Remember Me')}}
					<br><br>
					{{ Form::submit('Login',['class' => 'btn btn-primary'])}}
					<br>
					<a href="{{ route('password.request') }}">Forgot Password</a>
					

					{!! Form::close() !!}
					
				</div>
			</div>
			
		</div>
			
	</div>

@endsection