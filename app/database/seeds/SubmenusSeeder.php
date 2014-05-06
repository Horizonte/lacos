<?php

class SubmenusSeeder extends Seeder
{
	public function run()
	{
		DB::table('submenus')->delete();

		$submenus = array(
			array('submenu' => 'Grupos', 'route' => 'groups.index', 'active' => 1, 'dir' => 'admin/groups', 'menu_id' => 1),
			array('submenu' => 'Usuários', 'route' => 'users.index', 'active' => 1, 'dir' => 'admin/users', 'menu_id' => 1),
		);

		DB::table('submenus')->insert($submenus);
	}
}