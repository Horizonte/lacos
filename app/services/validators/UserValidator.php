<?php

namespace ArticleValidator extends Validator
{
	public static $rules = array(
		'title' => 'required',
		'body' => 'required',
	);
}