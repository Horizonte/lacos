<div id="recordUser" class='container'>
	<div id="divHeader" class="page-header">
		<div style="float:left"><h2>Usuários</h2></div>
		<div style="float:right; margin-top:21px;">@include('admin.users.submenu')</div>
		<div class="clear"></div>
	</div>
	<div>
		<br />
        <form class="form-horizontal">
			<fieldset>
				<!-- Text input-->
				<div class="form-group">
					<label class="col-md-2 control-label" for="txtName">Nome</label>  
					<div class="col-md-6">
						<input id="txtName" name="txtName" type="text" placeholder="" class="form-control input-md" required="">
					</div>
				</div>

				<!-- Text input-->
				<div class="form-group">
					<label class="col-md-2 control-label" for="txtSobrenome">Sobrenome</label>  
					<div class="col-md-6">
						<input id="txtSobrenome" name="txtSobrenome" type="text" placeholder="" class="form-control input-md" required="">
					</div>
				</div>

				<!-- Text input-->
				<div class="form-group">
					<label class="col-md-2 control-label" for="txtEmail">Email</label>  
					<div class="col-md-6">
						<input id="txtEmail" name="txtEmail" type="email" placeholder="" class="form-control input-md" required="">
					</div>
				</div>

				<!-- Password input-->
				<div class="form-group">
					<label class="col-md-2 control-label" for="txtPassword">Senha</label>
					<div class="col-md-6">
						<input id="txtPassword" name="txtPassword" type="password" placeholder="" class="form-control input-md" required="">
					</div>
				</div>

				<!-- Select Basic -->
				<div class="form-group">
					<label class="col-md-2 control-label" for="cbxGroup">Grupo</label>
					<div class="col-md-4">
						<select id="cbxGroup" name="cbxGroup" class="form-control">
							<option value="1">Option one</option>
							<option value="2">Option two</option>
						</select>
					</div>
				</div>

				<!-- Select Basic -->
				<div class="form-group">
					<label class="col-md-2 control-label" for="cbxDepartament">Departamento</label>
					<div class="col-md-4">
						<select id="cbxGroup" name="cbxDepartament" class="form-control">
							<option value="1">Option one</option>
							<option value="2">Option two</option>
						</select>
					</div>
				</div>

				<!-- Text input-->
				<div class="form-group">
					<label class="col-md-2 control-label" for="txtTelephone">Telefone</label>  
					<div class="col-md-3">
						<input id="txtTelefone" name="txtTelefone" type="text" placeholder="" class="form-control input-md" required="">
					</div>
				</div>

				<!-- Button (Double) -->
				<div class="form-group">
					<label class="col-md-4 control-label" for="btSave"></label>
					<div class="col-md-4">
						<button id="btSave" name="btSave" class="btn btn-info">Salvar</button>
						<button id="btCancel" name="btCancel" class="btn btn-danger">Cancelar</button>
					</div>
				</div>
			</fieldset>
		</form>
    </div>
</div>