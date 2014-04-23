@extends('layouts.layoutDefault')

@section('content')
	{{ Form::open(array('class' => 'form-signin', 'role' => 'form')) }}
		<h2 class="form-signin-heading">Acesse</h2>
		<input type="email" id="email" name="email" class="form-control" placeholder="Email" required="" autofocus="">
		<input type="password" id="password" name="password" class="form-control" placeholder="Senha" required="">
		<br />
		{{ Form::submit('Acessar', array('class' => 'btn btn-lg btn-primary btn-block')) }}
		@if ($errors->has('login'))
                <div class="alert alert-error"><br />{{ $errors->first('login', ':message') }}</div>
        @endif
	{{ Form::close() }}
@stop