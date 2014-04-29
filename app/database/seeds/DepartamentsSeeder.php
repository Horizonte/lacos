<?php

use App\Models\User;

class DepartamentsSeeder extends Seeder
{
	public function run()
	{
		DB::table('departaments')->delete();

		$departaments = array(
			array('departament' => 'Administração'),
			array('departament' => 'Almoxarifado'),
			array('departament' => 'Comercial'),
			array('departament' => 'Contabilidade'),
			array('departament' => 'Departamento Pessoal'),
			array('departament' => 'Diretoria'),
			array('departament' => 'Fiscal'),
			array('departament' => 'Marketing'),
			array('departament' => 'Recepção'),
			array('departament' => 'Recursos Humanos'),
			array('departament' => 'TI'),
		);

		DB::table('departaments')->insert($departaments);
	}
}