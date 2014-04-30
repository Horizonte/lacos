@extends('layouts.layoutDefault')

@section('content')	
	{{ HTML::style('css/admin/groups/AdminGroups.css') }}
	@yield('contentUsers')
@stop

@section('javascript')
	{{ HTML::script('js/admin/groups/AdminGroups.js') }}
@stop