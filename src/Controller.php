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

		if($this->input2('login_button'))
		{
			list($status, $data) = $this->pdqa_login();

			if($data)
			{
				$_SESSION['user_name'] = $data['user_name'];

				header("Location:" . base_url('dashboard'));
			}
		}

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

		header("Location: " . base_url('login'));
	}

	function add_login()
	{
		session_start();

		if(!empty($this->session('user_name')))
		{
			$_POST['filter_employee'] = array_single($this->pdqa_model->get_user()[1], 'employee_id');
			$this->data['user_name'] = $this->session('user_name');
			$this->data['list_module'] = $this->pdqa_model->get_module_items();

			$this->data['list_hrd_dept'] = $this->hrd_dept();
			$this->data['list_hrd_empl'] = $this->hrd_employee();

			unset($_POST['filter_employee']); // krn unused after filter

			if(($this->input2('save_add_login') !== null))
			{

				$_POST['dept_id'] = $this->input2('select_dept');
				$_POST['user_id'] = $this->input2('select_employee');

				$check = $this->hrd_employee();

				// check data
				if(!empty($check))
				{
					$user['user_name'] = $this->input2('user_name');
					$user['user_pass'] = password($this->input2('user_pass'));
					$user['department_id'] = $this->input2('select_dept');
					$user['department_name'] = $this->input2('select_dept_hidden');
					$user['employee_id'] = $this->input2('select_employee');
					$user['employee_name'] = $this->input2('select_empl_hidden');


					foreach($this->data['list_module'] as $value)
					{
						$checked = (!empty($this->input2('list_check'))) ? $this->input2('list_check') : $this->data['list_module'];
					
						$user[$value['module_']] = in_array($value['module_name'], $checked)  ? 1 : 0;
					}

					$this->pdqa_model->connector = $this->connector($this->db['default']); //buggy
					
					list($user_status, $user_id) = $this->pdqa_model->add_user($user, $this->request('id'));

					var_dump('lanjutan kondisi match antara dept_id dengan empl_id');
				}

				// header('Location:' . base_url('add_login'));
				var_dump('lanjutan diklik save');
			}

			$this->templates('view/add_login', $this->data);
		}
	}

	function show_login()
	{
		session_start();

		if(!empty($this->session('user_name')))
		{
			$this->data['user_name'] = $this->session('user_name');
			$this->data['data_login'] = $this->pdqa_model->get_user();

			$this->templates('view/show_login', $this->data);
		}

		header('Location:' . base_url('login'));
	}

	function delete_login()
	{}

	function show_standar_analisa()
	{
		session_start();

		if(!empty($this->session('user_name')))
		{
			$this->data['user_name'] = $this->session('user_name');
			$this->data['data_standar_analisa'] = $this->pdqa_standar_analisa();
			$this->data['data_standar_analisa_items'] = $this->pdqa_standar_analisa_items();
			$this->data['data_standar_analisa_items_size'] = $this->pdqa_standar_analisa_items_size();

			$this->templates('view/show_standar_analisa', $this->data);
		}
	}

	function add_standar_analisa()
	{
		session_start();

		if(!empty($this->session('user_name')))
		{
			$this->data['user_name'] = $this->session('user_name');
			$this->data['data_standar_analisa'] = $this->pdqa_standar_analisa();
			$this->data['data_standar_analisa_items'] = $this->pdqa_standar_analisa_items();
			$this->data['data_standar_analisa_items_size'] = $this->pdqa_standar_analisa_items_size();

			$this->templates('view/add_standar_analisa', $this->data);
		}
	}

	// AJAX
	// jika mau dijadikan api, add override methods
	// pdqa_login() menjadi pdqa_login_json()
	// dengan menjadi body : echo json_encode($this->pdqa_login());
	function pdqa_login()
	{
		$model = $this->pdqa_model->get_user(array(
			'user_name'	=>	$this->input2('user_name'),
			'user_pass'	=>	password($this->input2('user_pass')),
			'is_active'	=>	1, // for active user only
		));
		return $model;
	}

	function pdqa_login_module()
	{
		$model = $this->pdqa_model->get_module(array(
			'module_label'	=>	$this->input2('module_label')
		));

		return $model[1];
	}

	function hrd_dept()
	{
		$this->hrd_model->connector = $this->connector($this->db['hrd']);
		$model = $this->hrd_model->get_department(array(
			'dept_id'	=>	$this->input('dept_id'),
		));

		return $model[1];
	}

	function hrd_employee()
	{
		$this->hrd_model->connector = $this->connector($this->db['hrd']);
		$model = $this->hrd_model->get_v_dept_employee(array(
			'dept_id'	=>	$this->input2('dept_id'),
			'user_id'	=>	$this->input2('user_id'),
			'filter'	=>	$this->input2('filter_employee')
		));

		return $model[1];
	}

	function pdqa_standar_analisa()
	{
		$model = $this->pdqa_model->get_master_standar_analisa($params = array());
		return $model[1];
	}

	function pdqa_standar_analisa_items()
	{
		return $this->pdqa_model->get_standar_analisa_items();
	}

	function pdqa_standar_analisa_items_size()
	{
		$temp = array();
		foreach($this->pdqa_model->get_standar_analisa_items() as $value)
		{
			$temp[] = strtolower("{$value}_min");
			$temp[] = strtolower("{$value}_max");
		}

		return $temp;
	}
}