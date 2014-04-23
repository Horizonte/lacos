@extends('layouts.layoutDefault')

@section('content')	
	{{ HTML::style('css/admin/users/usersDefault.css') }}
	
	<div id="recordUser" class='container'>
		<div id="divHeader" class="page-header">
			<div style="float:left"><h2>Usuários</h2></div>
			<div style="float:right; margin-top:21px;">@include('admin.users.submenu')</div>
			<div class="clear"></div>
		</div>
		<div>
	        cadastro de usuários
	    </div>
    </div>
@stop

@section('javascript')
	{{ HTML::script('js/admin/users/usersDefault.js') }}
@stop