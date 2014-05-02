<?php

namespace App\Models;

use Illuminate\Support\Facades\DB as DB;

class Groups extends \Eloquent
{
	protected $table = 'groups';

	public function getGroupsCombobox()
	{
		$rs = DB::table('groups')->select('id','name')
								 ->orderBy('name')
								 ->get();
		return $rs;
	}

	public function getGroupsList($pageSize=10)
	{
		$rs = array();

		if($this->id > 0){ $rs = DB::table('groups')->where('id','=',$this->id)->paginate($pageSize); }
		else{ $rs = DB::table('groups')->paginate($pageSize); }
		return $rs;
	}

	public function getGroupsTotal()
	{
		$total = DB::table('groups')->count();
		return $total;
	}

	public function getDatasGroup()
	{
		$rs = DB::table('groups')->where('id', '=', $this->id)->get();
		return $rs;
	}
}