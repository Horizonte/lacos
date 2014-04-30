@extends('admin.users.default')

@section('contentUsers')	
	
	<div id="listUser" class='container'>
		<div id="divHeader" class="page-header">
			<div style="float:left"><h2>Usuários</h2></div>
			<div style="float:right; margin-top:21px;">@include('admin.users.submenu')</div>
			<div class="clear"></div>
		</div>
		<div>
	        <div class="panel panel-primary filterable">
	            <div class="panel-heading">
	                <h3 class="panel-title">Usuários</h3>
	                <div class="pull-right">
	                    <button class="btn btn-default btn-xs btn-filter"><span class="glyphicon glyphicon-filter"></span> Filtro</button>
	                </div>
	            </div>
	            <table class="table">
	                <thead>
	                    <tr class="filters">
	                        <th>Código</th>
	                        <th><input type="text" class="form-control" placeholder="Nome" disabled></th>
	                        <th><input type="text" class="form-control" placeholder="Sobrenome" disabled></th>
	                        <th><input type="text" class="form-control" placeholder="Usuário" disabled></th>
	                        <th><input type="text" class="form-control" placeholder="Criado em" disabled></th>
	                        <th>Editar</th>
	                        <th>Excluir</th>
	                    </tr>
	                </thead>
	                <tbody>
	                    @foreach ($users as $user)
							<tr>
								<td><a href="{{{ URL::route('users.show',$user->id) }}}">{{{ $user->id }}}</a></td>
								<td><a href="{{{ URL::route('users.show', $user->id) }}}">{{{ $user->first_name }}}</a></td>
								<td><a href="{{{ URL::route('users.show', $user->id) }}}">{{{ $user->last_name }}}</a></td>
								<td><a href="{{{ URL::route('users.show', $user->id) }}}">{{{ $user->email }}}</a></td>						
								<td><a href="{{{ URL::route('users.show', $user->id) }}}">{{{ date('d/m/Y H:i:s', strtotime($user->created_at)) }}}</a></td>							
								<td><p><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="{{{ URL::route('users.edit', $user->id) }}}" data-placement="top" rel="tooltip"><span class="glyphicon glyphicon-edit"></span></button></p></td>
	    						<td><p><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="{{{ URL::route('users.destroy', $user->id) }}}" data-placement="top" rel="tooltip"><span class="glyphicon glyphicon-trash"></span></button></p></td>
							</tr>
						@endforeach
	                </tbody>
	            </table>
	        </div>
	    </div>
    </div>

@stop