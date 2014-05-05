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
	 * Get data of the group
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function getDataGroupJson()
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
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show()
	{
		$id = isset($_GET['id']) ? $_GET['id'] : 0;
        return View::make('admin.groups.show')->with('groupData', Groups::find($id));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @return Response
	 */
	public function edit()
	{
        $id = isset($_GET['id']) ? $_GET['id'] : 0;
        return View::make('admin.groups.edit')->with('groupData', Groups::find($id));
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

		$id = Input::get('idEdit');
		if ($validation->passes() && $id > 0)
		{
			$groups = Groups::find($id);
			$groups->name = Input::get('name');
			$groups->save();

			$dataReturn = array('success' => true);
			echo json_encode($dataReturn);
			exit();			
		}

		$message = array('O cadastro não foi alterado.');
		
		if($id > 0)
		{
			$errors = json_decode($validation->errors);
			foreach ($errors as $key => $value){ $message = $value; }
		}

		$dataReturn = array('false' => true, 'msg' => '<strong>Atenção!</strong> '.$message[0]);
		echo json_encode($dataReturn);
		exit();
	}	

	/**
	 * Show the form of message for deleting the specified resource.
	 *
	 * @return Response
	 */
	public function delete()
	{
        $id = isset($_GET['id']) ? $_GET['id'] : 0;
        return View::make('admin.groups.delete')->with('id', $id);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy()
	{
		header('Content-type: text/json');
		header('Content-Type: application/json; charset=UTF8');

		$id = Input::get('idDelete');
		if($id > 0)
		{
			$groups = Groups::destroy($id);

			$dataReturn = array('success' => true);
			echo json_encode($dataReturn);
			exit();
		}
		
		$message = array('O cadastro não foi excluído.');
				
		$dataReturn = array('false' => true, 'msg' => '<strong>Atenção!</strong> '.$message[0]);
		echo json_encode($dataReturn);
		exit();
	}

}
