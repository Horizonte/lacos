@extends('layouts.layoutDefault')

@section('content')	
	{{ HTML::style('css/admin/users/AdminUsers.css') }}
	@yield('contentUsers')
@stop

@section('javascript')
	{{ HTML::script('js/admin/users/AdminUsers.js') }}
@stop