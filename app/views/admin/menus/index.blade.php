@extends('admin.menus.default')

@section('contentMenus')	
	
	<div id="listMenu" class='container shadowMain'>
		<div id="divHeader">
			<div style="float:left"><h3>Menus</h3></div>
			<div style="float:right; margin-top:21px;">@include('admin.menus.submenu')</div>
			<div class="clear"></div>
		</div>
		<div>
			@include('admin._partials.notifications')
	        <div class="panel panel-primary filterable">
	            <div class="panel-heading">
	                <div class="btn-group">
					  <button id="drpSelect" type="button" class="btn btn-xs btn-primary dropdown-toggle" data-toggle="dropdown">
					    Menus <span class="caret"></span>
					  </button>
					  <ul class="dropdown-menu" role="menu">
					    <li><a id="drpMenus" href="#">Menus</a></li>
					    <li><a id="drpSubmenus" href="#">Submenus</a></li>
					    <li><a id="drpSubSubmenus" href="#">Sub-Submenus</a></li>
					  </ul>
					</div>
	                <div style="float: right;">
	                    <button class="btn btn-primary btn-xs btn-filter" onclick="Menus.ShowFilter();"><span class="glyphicon glyphicon-filter"></span> Filtro</button>&nbsp;&nbsp;
	                    <button id="btRefresh" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-refresh"></i></button>
	                </div>
	                <div class="clear"></div>
	            </div>
	            <table class="table">
	                <thead id="tbHead">
	                    <tr class="filters">
	                        <th>Código</th>
	                        <th>Menu</th>
	                        <th>Rota</th>
	                        <th>Ativo</th>
	                        <th>Criado em</th>
	                        <th>Editar</th>
	                        <th>Excluir</th>
	                    </tr>
	                </thead>
	                <tbody id="tbBody">
	                    @foreach ($menus as $menu)
							<tr>
								<td><a onclick="Menus.ShowData({{{ $menu->id }}});">{{{ $menu->id }}}</a></td>
								<td><a onclick="Menus.ShowData({{{ $menu->id }}});">{{{ $menu->menu }}}</a></td>			
								<td><a onclick="Menus.ShowData({{{ $menu->id }}});">{{{ $menu->route }}}</a></td>			
								<td><a onclick="Menus.ShowData({{{ $menu->id }}});">{{{ $confirm = ($menu->active == 1) ? 'Sim' : 'Não' }}}</a></td>			
								<td><a onclick="Menus.ShowData({{{ $menu->id }}});">{{{ date('d/m/Y H:i:s', strtotime($menu->created_at)) }}}</a></td>
								<td><p><button onclick="Menus.ShowEdit({{{ $menu->id }}});" class="btn btn-primary btn-xs" data-title="Edit" data-placement="top"><span class="glyphicon glyphicon-pencil"></span></button></p></td>
    							<td><p><button onclick="Menus.ShowDelete({{{ $menu->id }}});" class="btn btn-danger btn-xs" data-title="Delete" data-placement="top"><span class="glyphicon glyphicon-trash"></span></button></p></td>
							</tr>
						@endforeach
	                </tbody>
	            </table>
	        </div>
			<div align="center">{{$menus->links()}}</div>
		</div>
    </div>
    <div id="otherViews"></div>

    <input type="hidden" id="hdNivel" name="hdNivel" value="0" />
    <input type="hidden" id="hdMenu" name="hdMenu" value="" />
    <input type="hidden" id="hdSubmenu" name="hdSubmenu" value="" />
    <input type="hidden" id="hdSubSubmenu" name="hdSubSubmenu" value="" />
    <input type="hidden" id="hdIdMenu" name="hdIdMenu" value="0" />
    <input type="hidden" id="hdIdSubmenu" name="hdIdSubmenu" value="0" />
    <input type="hidden" id="hdIdSubSubmenu" name="hdIdSubSubmenu" value="0" />
    <input type="hidden" id="hdPeriodoDe" name="hdPeriodoDe" value="0" />
    <input type="hidden" id="hdPeriodoAte" name="hdPeriodoAte" value="0" />
    <input type="hidden" id="hdStatus" name="hdStatus" value="" />	

@stop