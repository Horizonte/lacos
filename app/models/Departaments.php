<?php

namespace App\Models;

use Illuminate\Support\Facades\DB as DB;

class Departaments extends \Eloquent
{
	protected $table = 'departaments';


	public function getDepartamentsCombobox()
	{
		$rs = DB::table('departaments')->select('id','departament')->get();
		return $rs;
	}
}