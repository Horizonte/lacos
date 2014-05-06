@extends('layouts.layoutDefault')

@section('content')	
	{{ HTML::style('css/admin/menus/AdminMenus.css') }}
	@yield('contentMenus')
@stop

@section('javascript')
	{{ HTML::script('bootstrap-3.1.1/js/tooltip.js') }}
	{{ HTML::script('bootstrap-3.1.1/js/modal.js') }}
	{{ HTML::script('js/admin/menus/AdminMenus.js') }}
@stop