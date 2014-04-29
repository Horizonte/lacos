<?php

namespace App\Services\Validators;

abstract class Validator
{
	protected $data;
	public $errors;
	public static $messages;
	public static $rules;

	public function _construct($data = null)
	{
		$this->data = $data ? : \Input::all();
	}

	public function passes()
	{
		//public function make(array $data, array $rules, array $messages = array(), array $customAttributes = array())
		$dataRules =  \Input::all();
		$validation = \Validator::make($dataRules, static::$rules, static::$messages);

		if($validation->passes()){ return true; }

		$this->errors = $validation->messages();

		return false;
	}
}