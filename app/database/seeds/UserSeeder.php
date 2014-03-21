<?php

class UserSeeder extends DatabaseSeeder
{
	public function run()
	{
		$users = array(
			array(
				"email" => "admin@lacos.com.br",
				"name" => "Administrador Sistema",
				"pass" => Hash::make("lacoadmin123")
			)
		);

		foreach ($users as $user) 
		{
			User::create($user);
		}
	}
}