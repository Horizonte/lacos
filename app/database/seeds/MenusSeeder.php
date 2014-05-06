<?php

class MenusSeeder extends Seeder
{
	public function run()
	{
		DB::table('menus')->delete();

		$menus = array(
			array('menu' => 'Administração', 'route' => '#', 'active' => 1, 'dir' => 'admin'),
		);

		DB::table('menus')->insert($menus);
	}
}