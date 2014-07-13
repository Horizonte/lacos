@extends('admin.menus.default')

@section('contentMenus')	
	
	<div id="recordMenu" class='container shadowMain'>
		<div id="divHeader">
			<div style="float:left"><h3>Menus</h3></div>
			<div style="float:right; margin-top:21px;">@include('admin.menus.submenu')</div>
			<div class="clear"></div>
		</div>
		<div class="box box-solid">
			<div class="inBox">
				<div id="alerts"></div>
				<form id="addMenu" name="addMenu" class="form-horizontal">
					<fieldset>
						<div class="form-group">
							<label class="col-md-2 control-label" for="nivel">Nível</label>
							<div class="col-md-6"> 
								<label class="radio-inline" for="nivel-0">
									<input type="radio" name="nivel" id="nivel-0" value="0" checked="checked">Menu
								</label> 
								<label class="radio-inline" for="nivel-1">
									<input type="radio" name="nivel" id="nivel-1" value="1">Submenu
								</label> 
								<label class="radio-inline" for="nivel-2">
									<input type="radio" name="nivel" id="nivel-2" value="2">Sub-submenu
								</label>
							</div>
						</div>
						<div id="cmpMenu" class="form-group">
							<label class="col-md-2 control-label" for="name">Menu</label>  
							<div id="divMenu" class="col-md-6">
								<input id="menu" name="menu" type="text" placeholder="" class="form-control input-md" required="">
							</div>
						</div>
						<div id="cmpSubmenu" class="form-group" display="none">
							<label class="col-md-2 control-label" for="name">Submenu</label>  
							<div id="divSubmenu" class="col-md-6">
								<input id="submenu" name="submenu" type="text" placeholder="" class="form-control input-md" required="">
							</div>
						</div>
						<div id="cmpSubsubmenu" class="form-group" display="block">
							<label class="col-md-2 control-label" for="name">Sub-Submenu</label>  
							<div id="divSubsubmenu" class="col-md-6">
								<input id="subsubmenu" name="subsubmenu" type="text" placeholder="" class="form-control input-md" required="">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label" for="name">Rota</label>  
							<div id="divRota" class="col-md-6">
								<input id="route" name="route" type="text" placeholder="" class="form-control input-md" required="" value="#">
							</div>
						</div>
						<div id="divAtivo" class="form-group">
							<label class="col-md-2 control-label" for="chActive">Ativo</label>
							<div class="col-md-6">
								<input type="checkbox" name="active" id="active-0" value="1">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label" for="cbxDir">Diretório</label>
							<div id="divDiretorio" class="col-md-2">
								<select id="dir" name="dir" class="form-control">
									<option value="0">Selecione</option>
									<option value="admin">Admin</option>
									<option value="public">Public</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-4 control-label" for="btSave"></label>
							<div class="col-md-4">
								<buttom type="submit" id="btSave" name="btSave" class="btn btn-info" form="addMenu"><i class="glyphicon glyphicon-ok"></i> Salvar</buttom>
								<a id="btCancel" name="btCancel" class="btn btn-danger" href="{{{URL::route('menus.index')}}}"><i class="glyphicon glyphicon-remove"></i> Cancelar</a>							
							</div>
						</div>
					</fieldset>
				</form>
		    </div>
		</div>
	</div>	

@stop