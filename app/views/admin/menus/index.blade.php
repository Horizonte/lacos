@extends('admin.menus.default')

@section('contentMenus')	
	
	<div id="listMenu" class='container'>
		<div id="divHeader" class="page-header">
			<div style="float:left"><h2>Menus</h2></div>
			<div style="float:right; margin-top:21px;">@include('admin.menus.submenu')</div>
			<div class="clear"></div>
		</div>
		<div>
			@include('admin._partials.notifications')
			<br />
			<form id="listMenus" name="listMenus" class="form-horizontal">
				<fieldset>
					<!-- Appended Input -->
					<div class="form-group">
						<div class="col-md-6"></div>
						<div class="col-md-6">
							<div class="input-group">
								<input type="text" id="txtSearch" name="txtSearch" class="form-control" placeholder="Pesquisar">
								<buttom type="submit" id="btSearch" name="btSearch" class="input-group-addon" form="listMenu"><i class="glyphicon glyphicon-search"></i></buttom>
							</div>
						</div>
					</div>						
				</fieldset>
			</form>
	        <div class="panel panel-primary filterable">
	            <div class="panel-heading">
	                <h3 class="panel-title">Menus</h3>
	                <div class="pull-right">
	                    <button class="btn btn-default btn-xs btn-filter"><span class="glyphicon glyphicon-filter"></span> Filtro</button>
	                </div>
	            </div>
	            <table class="table">
	                <thead>
	                    <tr class="filters">
	                        <th>Código</th>
	                        <th><input type="text" class="form-control" placeholder="Menu" disabled></th>
	                        <th><input type="text" class="form-control" placeholder="Rota" disabled></th>
	                        <th><input type="text" class="form-control" placeholder="Ativo" disabled></th>
	                        <th><input type="text" class="form-control" placeholder="Criado em" disabled></th>
	                        <th>Editar</th>
	                        <th>Excluir</th>
	                    </tr>
	                </thead>
	                <tbody>
	                    @foreach ($menus as $menu)
							<tr>
								<td><a onclick="Groups.ShowData({{{ $menu->id }}});">{{{ $menu->id }}}</a></td>
								<td><a onclick="Groups.ShowData({{{ $menu->id }}});">{{{ $menu->menu }}}</a></td>			
								<td><a onclick="Groups.ShowData({{{ $menu->id }}});">{{{ $menu->route }}}</a></td>			
								<td><a onclick="Groups.ShowData({{{ $menu->id }}});">{{{ $confirm = ($menu->active == 1) ? 'Sim' : 'Não' }}}</a></td>			
								<td><a onclick="Groups.ShowData({{{ $menu->id }}});">{{{ date('d/m/Y H:i:s', strtotime($menu->created_at)) }}}</a></td>
								<td><p><button onclick="Groups.ShowEdit({{{ $menu->id }}});" class="btn btn-primary btn-xs" data-title="Edit" data-placement="top"><span class="glyphicon glyphicon-pencil"></span></button></p></td>
    							<td><p><button onclick="Groups.ShowDelete({{{ $menu->id }}});" class="btn btn-danger btn-xs" data-title="Delete" data-placement="top"><span class="glyphicon glyphicon-trash"></span></button></p></td>
							</tr>
						@endforeach
	                </tbody>
	            </table>
	        </div>
			<div align="center">{{$menus->links()}}</div>
	    </div>
    </div>
    <div id="otherViews"></div>
	
@stop