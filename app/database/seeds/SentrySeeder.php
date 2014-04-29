<?php

use App\Models\User;

class SentrySeeder extends Seeder
{
	public function run()
	{
		DB::table('users')->delete();
		DB::table('groups')->delete();
		DB::table('users_groups')->delete();

		Sentry::getUserProvider()->create(array(
			'email'			=> 'admin@lacos.com.br',
			'password'		=> 'admlacos',
			'first_name'	=> 'Administrador',
			'last_name'		=> 'Sistema',
			'activated'		=> 1,
		));

		Sentry::getGroupProvider()->create(array('name'	=> 'Admin', 		'permissions' => array('admin' => 1)));
		Sentry::getGroupProvider()->create(array('name'	=> 'Diretor', 		'permissions' => array('admin' => 1)));
		Sentry::getGroupProvider()->create(array('name'	=> 'Gerente', 		'permissions' => array('admin' => 1)));
		Sentry::getGroupProvider()->create(array('name'	=> 'Coordenador', 	'permissions' => array('admin' => 1)));
		Sentry::getGroupProvider()->create(array('name'	=> 'Supervisor', 	'permissions' => array('admin' => 1)));
		Sentry::getGroupProvider()->create(array('name'	=> 'Colaborador', 	'permissions' => array('admin' => 1)));
		Sentry::getGroupProvider()->create(array('name'	=> 'Visitante', 	'permissions' => array('admin' => 1)));

		$adminUser  = Sentry::getUserProvider()->findByLogin('admin@lacos.com.br');
		$adminGroup = Sentry::getGroupProvider()->findByName('Admin');
		$adminUser->addGroup($adminGroup);
	}
}