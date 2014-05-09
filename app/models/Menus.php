<?php

namespace App\Models;

use Illuminate\Support\Facades\DB as DB;

class Menus extends \Eloquent
{
	protected $table = 'menus';

	public function getMenusCombobox()
	{
		$rs = DB::table('menus')->select('id','menu')
								 ->orderBy('menu')
								 ->get();
		return $rs;
	}

	public function getMenusList($pageSize=10)
	{
		$rs = array();

		$where = '1=1';

		if($this->id > 0){ $rs = DB::table('menus')->where('id','=',$this->id)->paginate($pageSize); }
		if($this->menu != ''){ $rs = DB::select('select * from users where id = ?', array('value')); }

		$sql = 'SELECT
					users.id,
					users.menu,
					users.route,
					users.active,
					users.dir,
					users.created_at,
					users.update_at
				FROM
					users
				WHERE
					'.$where.'
				ORDER BY
					users.menu';

		if{ $rs = DB::table('menus')->paginate($pageSize); }
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
}