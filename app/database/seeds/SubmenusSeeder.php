<?php

class SubmenusSeeder extends Seeder
{
	public function run()
	{
		DB::table('submenus')->delete();

		$submenus = array(
			array(
					'submenu' 		=> 'Grupos', 
					'route' 		=> 'groups.index', 
					'active'		=> 1, 
					'dir' 			=> 'admin', 
					'menu_id' 		=> 1, 
					'created_at' 	=> date("Y-m-d H:i:s"),
					'updated_at' 	=> date("Y-m-d H:i:s")
				),
			array(
					'submenu' 		=> 'Usuários', 
					'route'			=> 'users.index', 
					'active' 		=> 1, 
					'dir' 			=> 'admin', 
					'menu_id' 		=> 1, 
					'created_at' 	=> date("Y-m-d H:i:s"),
					'updated_at' 	=> date("Y-m-d H:i:s")
				),
		);

		DB::table('submenus')->insert($submenus);
	}
}