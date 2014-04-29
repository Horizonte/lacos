<?php

namespace App\Models;

use Illuminate\Support\Facades\DB as DB;

class Groups extends \Eloquent
{
	protected $table = 'groups';


	public function getGroups()
	{
		$rs = DB::table('groups')->select('id','groups')->get();
		return $rs;
	}
}