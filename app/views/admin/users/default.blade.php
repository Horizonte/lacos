@extends('layouts.layoutDefault')

@section('content')	
	{{ HTML::style('css/admin/users/usersDefault.css') }}
	@yield('contentUsers')
@stop

@section('javascript')
	{{ HTML::script('js/admin/users/usersDefault.js') }}
@stop