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
		$nivel 		= (isset($_GET['nivel'])) ? $_GET['nivel'] : '';
		$txtSearch 	= (isset($_GET['txtSearch'])) ? $_GET['txtSearch'] : '';
        $return 	= array();

        if($nivel == '') 			
        { 
			$menus = new Menus();
			$menus->menu = $txtSearch;
        	$return = View::make('admin.menus.index')->with('menus', $menus->getMenusList()); 
        }
        elseif ($nivel == 'sub') 	
        { 
			$submenus = new Submenus();
        	$return = View::make('admin.menus.index')->with('submenus', $submenus->getSubmenusList()); 
        }
        elseif ($nivel == 'subsub') 
        { 
			$subSubmenus = new SubSubmenus();
        	$return = View::make('admin.menus.index')->with('subSubmenus', $subSubmenus->getSubSubmenusList()); 
        }

        return $return;
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

		$success = true;
		$message = null;

		if(Input::get('dir') != '0')
		{
			$menus = new Menus();
			$menus->route = (Input::get('route') != '') ? Input::get('route') : '#';
			$menus->active = (Input::get('active') != null) ? Input::get('active') : 0;
			$menus->dir = Input::get('dir');

			switch (Input::get('nivel')) 
			{
				case '0': // Insert a new menu
					
					$menus->menu = Input::get('menu');
					$menus->save();
					$success = true;

					break;
				
				case '1': // Insert a new submenu
					
					if(strlen(trim(Input::get('submenu'))) == 0)
					{  
						$success = false;
						$message = '<strong>Atenção!</strong> Informe o submenu.';
						break;
					}
					if(Input::get('cbxMenu') == 0)
					{
						$success = false;
						$message = '<strong>Atenção!</strong> Informe o menu.';
						break;
					}
					$menus->submenu = Input::get('submenu');
					$menus->id = Input::get('cbxMenu');
					$menus->insertSubmenu();
					$success = true;

					break;
				
				case '2': // Insert a new sub-submenu
					
					$menus->submenu = Input::get('subsubmenu');
					$menus->submenu_id = Input::get('cbxSubmenu');
					$menus->insertSubSubmenu();
					$success = true;

					break;
			}
		}
		else
		{
			$success = false;
			$message = '<strong>Atenção!</strong> Informe o diretório.';
		}
		
		$dataReturn = array('success' => $success, 'msg' => $message);	

		echo json_encode($dataReturn);
		exit();
	}

	/**
	 * Get data of the menu
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function getDataMenuJson()
	{
        header('Content-type: text/json');
		header('Content-Type: application/json; charset=UTF8');

		$menus = new Menus();
		$menus->id = isset($_GET['id']) ? $_GET['id'] : 0;
		$rs = $menus->getDatasMenu();

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
        return View::make('admin.menus.show')->with('menuData', Menus::find($id));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @return Response
	 */
	public function edit()
	{
        $id = isset($_GET['id']) ? $_GET['id'] : 0;
        return View::make('admin.menus.edit')->with('menuData', Menus::find($id));
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

	public function cbxMenus()
	{
        header('Content-type: text/json');
		header('Content-Type: application/json; charset=UTF8');

		$menus = new Menus();
		$rs = $menus->getMenusCombobox();

		$dataReturn = array('success' => true, 'datas' => $rs);
		echo json_encode($dataReturn);
		exit();
	}

	public function cbxSubMenus()
	{
        header('Content-type: text/json');
		header('Content-Type: application/json; charset=UTF8');

		$menus = new Menus();
		$menus->id = (isset($_POST['idMenu'])) ? $_POST['idMenu'] : 0;
		$rs = $menus->getSubMenusCombobox();

		$dataReturn = array('success' => true, 'datas' => $rs);
		echo json_encode($dataReturn);
		exit();
	}

	public function filter()
	{
        return View::make('admin.menus.filter');
	}
}
