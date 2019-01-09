<?php

require_once 'Common.php';

class Controller extends Common
{
	var $data = array();

	function __construct()
	{
		$this->config(array('db','lang'));
		$this->data = array_merge($this->data, $this->lang);

		$this->model(array('pdqa_model','hrd_model','products_model'));

		$this->pdqa_model->connector = $this->connector($this->db['default']);
	}

	function index()
	{
		if(!$this->session('user_name'))
			header('Location:' . base_url('login'));
	}

	function login()
	{
		session_start();
		if(!empty($this->input('user_admin')) && !empty($this->input('pass_admin')))
			if($this->input('login_button'))
			{
				list($status, $data) = $this->check_user();

				if($data)
				{
					$_SESSION['user_name'] = $data['user_name'];

					header("Location:" . base_url('dashboard'));
				}
			}

		$this->data['label_login_message'] = "Error credentials";

		$this->templates('view/login', $this->data);
	}

	function logout()
	{
		session_start();

		unset($_SESSION['user_name']);

		header("Location: " . base_url('login'));
	}

	function dashboard()
	{
		session_start();

		if(!empty($this->session('user_name')))
		{
			$this->data['user_name'] = $this->session('user_name');
			$this->templates('view/dashboard', $this->data);
		}
	}

	// function search_login()
	// {
	// 	session_start();

	// 	if(!empty($this->session('user_name')))
	// 	{
	// 		$this->data['user_name'] = $this->session('user_name');
	// 		$this->templates('view/search_login', $this->data);
	// 	}
	// }

	function add_login()
	{
		session_start();

		if(!empty($this->session('user_name')))
		{
			$this->data['user_name'] = $this->session('user_name');
			$this->templates('view/add_login', $this->data);
		}
	}

	function show_login()
	{
		session_start();

		if(!empty($this->session('user_name')))
		{
			$this->data['user_name'] = $this->session('user_name');
			$this->data['data_login'] = $this->search_pdqa_user();

			$this->templates('view/show_login', $this->data);
		}
	}

	function delete_login()
	{}

	function show_standar_analisa()
	{
		session_start();

		if(!empty($this->session('user_name')))
		{
			$this->data['user_name'] = $this->session('user_name');
			$this->data['data_standar_analisa'] = $this->search_pdqa_user();

			$this->templates('view/show_login', $this->data);
		}
	}

	function search_standar_analisa()
	{}

	function add_standar_analisa()
	{}

	// untuk kepentingan AJAX

	function check_user()
	{
		$model = $this->pdqa_model->get_user(array(
			'user_name'	=>	$this->input('user_admin'),
			'user_pass'	=>	password($this->input('pass_admin'))
		));

		return $model;
	}

	function hrd_dept()
	{
		$this->hrd_model->connector = $this->connector($this->db['hrd']);
		$params = (!empty($this->input('dept_names'))) ? $this->input('dept_names') : '';
		$model = $this->hrd_model->get_department(array(
			'dept_names'	=>	"{$params}%",
		));

		return $model[1];
	}

	function hrd_dept_json()
	{
		echo json_encode($this->hrd_dept());
	}

	function hrd_employee()
	{
		$this->hrd_model->connector = $this->connector($this->db['hrd']);
		$params = (!empty($this->input('empl_names'))) ? $this->input('empl_names') : '';
		$model = $this->hrd_model->get_user(array(
			'empl_names'	=>	"{$params}%",
		));

		return $model[1];
	}

	function hrd_employee_json()
	{
		echo json_encode($this->hrd_employee());
	}

	function hrd_orlep()
	{
		$this->hrd_model->connector = $this->connector($this->db['hrd']);
		$params = (!empty($this->input('dept_names'))) ? $this->input('dept_names') : '';
		$model = $this->hrd_model->get_department(array(
			'dept_names'	=>	"{$params}",
		));

		return $model[1];
	}

	function hrd_orlep_json()
	{
		echo json_encode($this->hrd_orlep());
	}

	function add_pdqa_user()
	{

	}

	function search_pdqa_user()
	{
		$params = (!empty($this->input('user_names'))) ? $this->input('user_names') : '';
		$model = $this->pdqa_model->get_user(array(
			'user_names'	=>	"{$params}%"
		));

		return $model[1];
	}

	function search_pdqa_user_json()
	{
		echo json_encode($this->search_pdqa_user());
	}

	function pdqa_standar_analisa()
	{
	}
}