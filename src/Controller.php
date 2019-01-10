<?php

require_once 'Common.php';

class Controller extends Common
{
	var $data = array();

	function __construct()
	{
		$this->config(array('db','lang'));
		$this->data = array_merge($this->data, $this->lang);

		$this->model(array(
			'pdqa_model' => $this->db['default'],
			'hrd_model' => $this->db['hrd'],
			'products_model' => $this->db['default']
		));
	}

	function index()
	{
		if(!$this->session('user_name'))
			header('Location:' . base_url('login'));
	}

	function login()
	{
		session_start();

		if($this->input2('login_button_signin'))
		{
			list($status, $data) = $this->pdqa_model->get_user(array(
				'user_name' => $this->input2('login_input_user'),
				'user_pass' => password($this->input2('login_input_pass')),
				'is_active'	=> 1
			));

			if($data)
			{
				foreach($data as $dt)
				{
				}


				header("Location:" . base_url('dashboard'), $this->data);
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
			$this->data['user_name'] = $this->session('user_name');
			$this->data['list_module'] = $this->pdqa_model->get_module_items();

			$this->data['list_hrd_dept'] = $this->hrd_dept();
			$this->data['list_hrd_empl'] = $this->hrd_employee();

			if(!empty($this->request('id')))
			{
				list($status, $pull) = $this->pdqa_model->get_user(array(
					'id'	=>	$this->request('id')
				));

				$this->data['list_hrd_dept'] = array('dept_id' => $pull['department_id'], 'dept_name' => $pull['department_name']);
				$this->data['list_hrd_empl'] = array('user_id' => $pull['employee_id'], 'dept_id' => $pull['department_id']);
				$this->data['user_name'] = $pull['user_name'];
				$this->data['user_pass'] = '';
				$this->data['list_module'] = array(
					'module_master_user' => $pull['module_master_user'],
					'module_master_standar_analisa' => $pull['module_master_standar_analisa'],
					'module_master_form_analisa' => $pull['module_master_form_analisa'],
					'module_master_form_analisa_ro3' => $pull['module_master_form_analisa_ro3'],
					'module_report_analisa' => $pull['module_report_analisa'],
					'module_report_analisa_ro3' => $pull['module_report_analisa_ro3']
				);

				$this->templates('add_login', $this->data);
			}

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
					
						$user[$value] = in_array($value, $checked)  ? 1 : 0;
					}
					
					$this->pdqa_model->connector = $this->connector($this->db['default']); //buggy
					list($user_status, $user_id) = $this->pdqa_model->add_user($user, $this->request('id'));

					header('Location: ' . base_url('show_login'));
				}
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

			if($this->input2('btn_search_login') !== null)
			{
				$this->data['data_login2'] = $this->pdqa_model->get_user(array(
					'user_names'	=>	$this->input2('select_login_hidden') . "%"
				));

				$this->templates('view/show_login', $this->data);							
			}

			if(empty($this->data['data_login2']))
				$this->data['data_login2'] = $this->data['data_login'];

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
}