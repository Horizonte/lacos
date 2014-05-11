<?php

namespace App\Services\Validators;

class GroupValidator extends Validator
{
	public static $rules = array('name' => 'required|unique:groups');
	public static $messages = array(
										'required' => 'Informe o nome do grupo.',
										'name.unique' => 'O grupo já existe.'
									);
}