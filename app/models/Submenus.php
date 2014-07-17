<?php

namespace App\Models;

use Illuminate\Support\Facades\DB as DB;

class Submenus extends \Eloquent
{
	protected $table = 'submenus';

	public function getSubmenusList($pageSize=10)
	{
		$rs = array();

		$where = '1=1';

		if($this->id > 0){ $where.= ' AND submenus.id = '.$this->id; }
		if($this->menu != '')
		{ 
			$auxMenu = explode(' ', $this->menu);
			$flagOr = false;
			$where.= ' AND ('; 
			foreach ($auxMenu as $key => $value) 
			{
				if($flagOr){ $where.= ' OR '; }
				$where.= ' submenus.submenu LIKE ("%'.$value.'%")'; 
				$flagOr = true;
			}
			$where.= ') ';
		}
		$rs = DB::table('submenus')->whereRaw($where)->paginate($pageSize);
		return $rs;
	}

	public function getSubmenusTotal()
	{
		$total = DB::table('submenus')->count();
		return $total;
	}

	public function getDatasSubmenu()
	{
		$rs = DB::table('submenus')->where('id', '=', $this->id)->get();
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
}