<?php

namespace App\Controllers\Admin;

use Auth, BaseController, Form, Input, Redirect, Sentry, View;

class AuthController extends \BaseController
{
	/**
	* Display the login page
	* @return View
	*/
	public function getLogin()
	{
		return View::make('admin.auth.login');
	}

	/**
	* Login action
	* @return Redirect
	*/
	public function postLogin()
	{
		$credentials = array(
			'email' => Input::get('email'),
			'password' => Input::get('password')
		);

		// Os tratamentos de erros abaixo são previstos pelo Sentry.
		try
		{
			$user = Sentry::authenticate($credentials, false);
			if($user)
			{
				// Find the user using the user id
			    $user = Sentry::findUserById(1);
			    // Log the user in
			    Sentry::login($user, false);

				return Redirect::route('admin.homeIn');
			}
		}
		catch (\Cartalyst\Sentry\Users\LoginRequiredException $e)
		{
		    return Redirect::route('admin.login')->withErrors(array('login' => 'Informe o email.'));
		}
		catch (\Cartalyst\Sentry\Users\PasswordRequiredException $e)
		{
		    return Redirect::route('admin.login')->withErrors(array('login' => 'Informe a senha.'));
		}
		catch (\Cartalyst\Sentry\Users\WrongPasswordException $e)
		{
		    return Redirect::route('admin.login')->withErrors(array('login' => 'Email ou senha inválidos.'));
		}
		catch (\Cartalyst\Sentry\Users\UserNotFoundException $e)
		{
		    return Redirect::route('admin.login')->withErrors(array('login' => 'Email ou senha inválidos.'));
		}
		catch (\Cartalyst\Sentry\Users\UserNotActivatedException $e)
		{
		    return Redirect::route('admin.login')->withErrors(array('login' => 'Email ou senha inválidos.'));
		}
		catch (\Cartalyst\Sentry\Throttling\UserSuspendedException $e)
		{
			$time = $throttle->getSuspensionTime();
		    return Redirect::route('admin.login')->withErrors(array('login' => 'O usuário foi suspenso por '.$time.' minutos.'));
		}
		catch (\Cartalyst\Sentry\Throttling\UserBannedException $e)
		{
		    return Redirect::route('admin.login')->withErrors(array('login' => 'O usuário foi bloqueado.'));
		}
		catch(\Exception $e)
		{
			return Redirect::route('admin.login')->withErrors(array('login' => $e->getMessage()));
		}
	}

	/**
	* Logout action
	* @return Redirect
	*/
	public function getLogout()
	{
		Sentry::logout();
		return Redirect::route('admin.login');
	}
}