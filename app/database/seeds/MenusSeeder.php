<?php

class MenusSeeder extends Seeder
{
	public function run()
	{
		DB::table('menus')->delete();

		$menus = array(
			array(
					'menu' => 'Administração', 
					'route' => '#', 
					'active' => 1, 
					'dir' => 'admin', 
					'created_at' 	=> date("Y-m-d H:i:s"),
					'updated_at' 	=> date("Y-m-d H:i:s")
				),
		);

		DB::table('menus')->insert($menus);
	}
}