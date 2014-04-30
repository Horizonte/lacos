@extends('admin.groups.default')

@section('contentUsers')	
	
	<div id="recordUser" class='container'>
		<div id="divHeader" class="page-header">
			<div style="float:left"><h2>Grupos de Usuários</h2></div>
			<div style="float:right; margin-top:21px;">@include('admin.groups.submenu')</div>
			<div class="clear"></div>
		</div>
		<div>
			<br />
			@include('admin._partials.notifications')
			{{Form::open(array('route' => 'groups.store', 'class' => 'form-horizontal'))}}
				<fieldset>
					<!-- Text input-->
					<div class="form-group">
						<label class="col-md-2 control-label" for="name">Nome</label>  
						<div class="col-md-6">
							<input id="name" name="name" type="text" placeholder="" class="form-control input-md" required="Informe o nome do grupo.">
						</div>
					</div>

					<!-- Button (Double) -->
					<div class="form-group">
						<label class="col-md-4 control-label" for="btSave"></label>
						<div class="col-md-4">
							<!-- <input type="submit" id="btSave" name="btSave" class="btn btn-info" value="Salvar" /> -->
							<buttom type="submit" id="btSave" name="btSave" class="btn btn-info"><i class="glyphicon glyphicon-ok"></i> Salvar</buttom>
							<a id="btCancel" name="btCancel" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i> Cancelar</a>
						</div>
					</div>
				</fieldset>
			{{Form::close()}}
	    </div>
	</div>	

@stop