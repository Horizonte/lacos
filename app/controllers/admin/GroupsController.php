<?php

namespace App\Controllers\Admin;

use App\Models\Groups;
use App\Services\Validators\GroupValidator;
use Auth, BaseController, Form, Input, Redirect, Sentry, View, Notification;

class GroupsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$groups = new Groups();
        return View::make('admin.groups.index')->with('groups', $groups->getGroupsList());
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('admin.groups.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validation = new GroupValidator();

		if ($validation->passes())
		{
			$groups = new Groups();
			$groups->name = Input::get('name');
			$groups->permissions = '{"admin":1}';
			$groups->save();

			Notification::success('Grupo cadastrado com sucesso.');
			return Redirect::route('groups.create');			
		}
		return Redirect::back()->withInput()->withErrors($validation->errors);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        return View::make('admin.groups.show');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        return View::make('admin.groups.edit');
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
