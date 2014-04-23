<?php

namespace App\Controllers\Admin;

use Auth, BaseController, Form, Input, Redirect, Sentry, View;

class HomeInController extends \BaseController
{
	public function getHomeIn()
	{
		return View::make('admin.homeIn.home');
	}
}