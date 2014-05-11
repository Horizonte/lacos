<?php

namespace App\Services\Validators;

class MenuValidator extends Validator
{
	public static $rules = array('menu' => 'required');
	public static $messages = array(
										'required' => 'Informe o nome do grupo.'
									);
}