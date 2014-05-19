<?php

namespace App\Models;

use Illuminate\Support\Facades\DB as DB;

class Menus extends \Eloquent
{
	protected $table = 'menus';
	public $submenu;
	public $submenu_id;

	public function getMenusCombobox()
	{
		$rs = DB::table('menus')->select('id','menu')
								 ->orderBy('menu')
								 ->get();
		return $rs;
	}

	public function getSubMenusCombobox()
	{
		$rs = DB::table('submenus')->select('id','submenu')
								   ->where('menu_id', '=', $this->id)
								   ->orderBy('submenu')
								   ->get();
		return $rs;
	}

	public function getMenusList($pageSize=10)
	{
		$rs = array();

		$where = '1=1';

		if($this->id > 0){ $where.= ' AND menus.id = '.$this->id; }
		if($this->menu != '')
		{ 
			$auxMenu = explode(' ', $this->menu);
			$flagOr = false;
			$where.= ' AND ('; 
			foreach ($auxMenu as $key => $value) 
			{
				if($flagOr){ $where.= ' OR '; }
				$where.= ' menus.menu LIKE ("%'.$value.'%")'; 
				$flagOr = true;
			}
			$where.= ') ';
		}
		$rs = DB::table('menus')->whereRaw($where)->paginate($pageSize);
		return $rs;
	}

	public function getMenusTotal()
	{
		$total = DB::table('menus')->count();
		return $total;
	}

	public function getDatasMenu()
	{
		$rs = DB::table('menus')->where('id', '=', $this->id)->get();
		return $rs;
	}

	public function insertSubmenu()
	{
		$submenu = array(
							'submenu' 		=> $this->submenu, 
							'route' 		=> $this->route,
							'active' 		=> $this->active,
							'dir' 			=> $this->dir,
							'menu_id' 		=> $this->id,
							'created_at'	=> date("Y-m-d H:i:s"),
							'updated_at'	=> date("Y-m-d H:i:s")
						);
		return DB::table('submenus')->insertGetId($submenu);
	}

	public function insertSubSubmenu()
	{
		$submenu = array(
							'submenu' 		=> $this->submenu, 
							'route' 		=> $this->route,
							'active' 		=> $this->active,
							'dir' 			=> $this->dir,
							'submenu_id' 	=> $this->submenu_id,
							'created_at'	=> date("Y-m-d H:i:s"),
							'updated_at'	=> date("Y-m-d H:i:s")
						);
		return DB::table('subsubmenus')->insertGetId($submenu);
	}
}