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
		header('Content-type: text/json');
		header('Content-Type: application/json; charset=UTF8');
		$validation = new GroupValidator();

		if ($validation->passes())
		{
			$groups = new Groups();
			$groups->name = Input::get('name');
			$groups->permissions = '{"admin":1}';
			$groups->save();

			$dataReturn = array('success' => true);
			echo json_encode($dataReturn);
			exit();			
		}
		$message = array('Grupo não cadastrado');
		$errors = json_decode($validation->errors);
		foreach ($errors as $key => $value){ $message = $value; }
		$dataReturn = array('false' => true, 'msg' => '<strong>Atenção!</strong> '.$message[0]);
		echo json_encode($dataReturn);
		exit();
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
	 * @return Response
	 */
	public function edit()
	{
        header('Content-type: text/json');
		header('Content-Type: application/json; charset=UTF8');

		$groups = new Groups();
		$groups->id = isset($_GET['id']) ? $_GET['id'] : 0;
		$rs = $groups->getDatasGroup();

		$dataReturn = array('success' => true, 'datas' => $rs);
		echo json_encode($dataReturn);
		exit();
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update()
	{
		header('Content-type: text/json');
		header('Content-Type: application/json; charset=UTF8');
		$validation = new GroupValidator();

		if ($validation->passes())
		{
			$groups = Groups::find(Input::get('idEdit'));
			$groups->name = Input::get('name');
			$groups->save();

			$dataReturn = array('success' => true);
			echo json_encode($dataReturn);
			exit();			
		}
		$message = array('Cadastro sem alteração.');
		$errors = json_decode($validation->errors);
		foreach ($errors as $key => $value){ $message = $value; }
		$dataReturn = array('false' => true, 'msg' => '<strong>Atenção!</strong> '.$message[0]);
		echo json_encode($dataReturn);
		exit();
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
