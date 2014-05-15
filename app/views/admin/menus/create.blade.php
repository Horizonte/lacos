@extends('admin.menus.default')

@section('contentMenus')	
	
	<div id="recordMenu" class='container'>
		<div id="divHeader" class="page-header">
			<div style="float:left"><h2>Menus</h2></div>
			<div style="float:right; margin-top:21px;">@include('admin.menus.submenu')</div>
			<div class="clear"></div>
		</div>
		<div>
			<br />
			<div id="alerts"></div>
			<form id="addMenu" name="addMenu" class="form-horizontal">
				<fieldset>
					<!-- Multiple Radios (inline) -->
					<div class="form-group">
						<label class="col-md-2 control-label" for="nivel">Nível</label>
						<div class="col-md-6"> 
							<label class="radio-inline" for="nivel-0">
								<input type="radio" name="nivel" id="nivel-0" value="0" checked="checked">Menu
							</label> 
							<label class="radio-inline" for="nivel-1">
								<input type="radio" name="nivel" id="nivel-1" value="1">Sub-menu
							</label> 
							<label class="radio-inline" for="nivel-2">
								<input type="radio" name="nivel" id="nivel-2" value="2">Sub-sub-menu
							</label>
						</div>
					</div>

					<!-- Text input-->
					<div class="form-group">
						<label class="col-md-2 control-label" for="name">Menu</label>  
						<div id="menu" class="col-md-6">
							<input id="menu" name="menu" type="text" placeholder="" class="form-control input-md" required="">
						</div>
					</div>

					<!-- Text input-->
					<div class="form-group">
						<label class="col-md-2 control-label" for="name">Rota</label>  
						<div class="col-md-6">
							<input id="route" name="route" type="text" placeholder="" class="form-control input-md" required="" value="#">
						</div>
					</div>
					
					<!-- Multiple Checkboxes (inline) -->
					<div class="form-group">
						<label class="col-md-2 control-label" for="chActive">Ativo</label>
						<div class="col-md-6">
							<input type="checkbox" name="active" id="active-0" value="1">
						</div>
					</div>

					<!-- Select Basic -->
					<div class="form-group">
						<label class="col-md-2 control-label" for="cbxDir">Diretório</label>
						<div class="col-md-2">
							<select id="dir" name="dir" class="form-control">
								<option value="0">Selecione</option>
								<option value="admin">Admin</option>
								<option value="public">Public</option>
							</select>
						</div>
					</div>

					<!-- Button (Double) -->
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

@stop