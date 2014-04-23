@if(!Sentry::check())
	<!-- Navbar -->
	<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container">
			<div class="navbar-header">
				<a class="navbar-brand posicaoLogo" href="#">{{ HTML::image('img/logo.fw.png') }}</a>
			</div>
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav">
					<li class="active"><a href="#"><i class="glyphicon glyphicon-log-in"></i> Login</a></li>
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
					<li class="active"><a href="{{{ URL::route('admin.homeIn') }}}"><i class="glyphicon glyphicon-home"></i> Home</a></li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-wrench"></i> Administração</a>
						<ul class="dropdown-menu">
							<li>{{ HTML::linkRoute('users.index', 'Usuários') }}</li>
							<li>{{ HTML::linkRoute('groups.index', 'Grupos') }}</li>
						</ul>
					</li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-cog"></i> Minha Conta</a>
						<ul class="dropdown-menu">
							<li>{{ HTML::linkRoute('users.photo', 'Adicionar Foto') }}</li>
							<li>{{ HTML::linkRoute('users.password', 'Trocar Senha') }}</li>
						</ul>
					</li>
					<li><a href="{{{ URL::route('admin.logout') }}}"><i class="glyphicon glyphicon-off"></i> Sair</a></li>
				</ul>
			</div>
		</div>
	</div>
@endif