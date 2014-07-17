<?php

namespace App\Models;

use Illuminate\Support\Facades\DB as DB;

class SubSubmenus extends \Eloquent
{
	protected $table = 'subsubmenus';

	public function getSubSubmenusList($pageSize=10)
	{
		$rs = array();

		$where = '1=1';

		if($this->id > 0){ $where.= ' AND subsubmenus.id = '.$this->id; }
		if($this->menu != '')
		{ 
			$auxMenu = explode(' ', $this->menu);
			$flagOr = false;
			$where.= ' AND ('; 
			foreach ($auxMenu as $key => $value) 
			{
				if($flagOr){ $where.= ' OR '; }
				$where.= ' subsubmenus.submenu LIKE ("%'.$value.'%")'; 
				$flagOr = true;
			}
			$where.= ') ';
		}
		$rs = DB::table('subsubmenus')->whereRaw($where)->paginate($pageSize);
		return $rs;
	}

	public function getSubSubmenusTotal()
	{
		$total = DB::table('subsubmenus')->count();
		return $total;
	}

	public function getDatasSubSubmenu()
	{
		$rs = DB::table('subsubmenus')->where('id', '=', $this->id)->get();
		return $rs;
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