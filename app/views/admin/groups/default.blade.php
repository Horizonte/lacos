@extends('layouts.layoutDefault')

@section('content')	
	{{ HTML::style('css/admin/groups/AdminGroups.css') }}
	@yield('contentGroups')
@stop

@section('javascript')
	{{ HTML::script('bootstrap-3.1.1/js/tooltip.js') }}
	{{ HTML::script('bootstrap-3.1.1/js/modal.js') }}
	{{ HTML::script('js/admin/groups/AdminGroups.js') }}
@stop