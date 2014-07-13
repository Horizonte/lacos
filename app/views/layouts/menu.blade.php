@if(!Sentry::check())
	<!-- Navbar -->
	<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container">
			<div class="navbar-header">
				<a class="navbar-brand posicaoLogo" href="#">{{ HTML::image('img/logo.fw.png') }}</a>
			</div>
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav">
					<li><a href="#"><i class="glyphicon glyphicon-log-in"></i> Login</a></li>
					<li><a href="#"><i class="glyphicon glyphicon-info-sign"></i>  Sobre</a></li>
					<li><a href="#"><i class="glyphicon glyphicon-earphone"></i> Contato</a></li>
				</ul>
			</div>
		</div>
	</div>
@else
	<!-- Navbar -->
	<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container">
			<div class="navbar-header">
				<a class="navbar-brand posicaoLogo" href="#">{{ HTML::image('img/logo.fw.png') }}</a>
			</div>
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav">
					<li><a href="{{{ URL::route('admin.homeIn') }}}"><i class="glyphicon glyphicon-home"></i> Home</a></li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-wrench"></i> Administração <span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="{{{ URL::route('groups.index') }}}"><i class="fa fa-users"></i> Grupos</a></li>
							<li><a href="{{{ URL::route('menus.index') }}}"><i class="glyphicon glyphicon-link"></i> Menus</a></li>
							<li><a href="{{{ URL::route('users.index') }}}"><i class="glyphicon glyphicon-user"></i> Usuários</a></li>
						</ul>
					</li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-cog"></i> Minha Conta <span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="{{{ URL::route('users.photo') }}}"><i class="glyphicon glyphicon-camera"></i> Adicionar Foto</a></li>
							<li><a href="{{{ URL::route('users.password') }}}"><i class="glyphicon glyphicon-edit"></i> Trocar Senha</a></li>
						</ul>
					</li>
					<li><a href="{{{ URL::route('admin.logout') }}}"><i class="glyphicon glyphicon-off"></i> Sair</a></li>
				</ul>
			</div>
		</div>
	</div>
@endif