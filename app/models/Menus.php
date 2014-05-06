<?php

namespace App\Models;

use Illuminate\Support\Facades\DB as DB;

class Menus extends \Eloquent
{
	protected $table = 'groups';

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

		if($this->id > 0){ $rs = DB::table('menus')->where('id','=',$this->id)->paginate($pageSize); }
		else{ $rs = DB::table('menus')->paginate($pageSize); }
		return $rs;
	}

	public function getMenusTotal()
	{
		$total = DB::table('menus')->count();
		return $total;
	}

	public function getDatasMenu()
	{
		$rs = DB::table('groups')->where('id', '=', $this->id)->get();
		return $rs;
	}
}