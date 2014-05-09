<?php

namespace App\Controllers\Admin;

use App\Models\Menus;
use App\Services\Validators\MenuValidator;
use Auth, BaseController, Form, Input, Redirect, Sentry, View, Notification;

class MenusController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$menus = new Menus();
        return View::make('admin.menus.index')->with('menus', $menus->getMenusList());
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('admin.menus.create');
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
			$menus = new Menus();
			$menus->name = Input::get('name');
			$menus->permissions = '{"admin":1}';
			$menus->save();

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

		$menus = new Menus();
		$menus->id = isset($_GET['id']) ? $_GET['id'] : 0;
		$rs = $menus->getDatasGroup();

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
        return View::make('admin.menus.show')->with('groupData', Menus::find($id));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @return Response
	 */
	public function edit()
	{
        $id = isset($_GET['id']) ? $_GET['id'] : 0;
        return View::make('admin.menus.edit')->with('groupData', Menus::find($id));
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
		$validation = new MenuValidator();

		$id = Input::get('idEdit');
		if ($validation->passes() && $id > 0)
		{
			$menus = Menus::find($id);
			$menus->name = Input::get('name');
			$menus->save();

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
        return View::make('admin.menus.delete')->with('id', $id);
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
			$menus = Menus::destroy($id);

			$dataReturn = array('success' => true);
			echo json_encode($dataReturn);
			exit();
		}
		
		$message = array('O cadastro não foi excluído.');
				
		$dataReturn = array('false' => true, 'msg' => '<strong>Atenção!</strong> '.$message[0]);
		echo json_encode($dataReturn);
		exit();
	}

	public function filterMenus()
	{
		$menus = new Menus();
		$menus->menu = (isset($_POST['txtSearch'])) ? $_POST['txtSearch'] : '';
        return View::make('admin.menus.index')->with('menus', $menus->getMenusList());
	}
}
