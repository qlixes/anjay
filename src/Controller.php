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
				// because only return result
				$this->session2($data);

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
			// translate dari session to array
			// for getting access to module
			foreach($this->pdqa_model->get_module_items() as $module)
				$this->data['pages'][$module] = $this->session($module);

			$this->templates('view/dashboard', $this->data);
		}

		header("Location: " . base_url('login'));
	}

	function add_login()
	{
		session_start();

		if(!empty($this->session('user_name')))
		{
			$this->data['list_module'] = $this->pdqa_model->get_module_items();

			$this->data['list_hrd_dept'] = $this->hrd_model->get_department()[1];
			$this->data['list_hrd_empl'] = $this->hrd_model->get_dept_employee(array(
				'filter' => implode($this->_filter_user(array('employee_id')), ',')
			))[1];

			if(!empty($this->request('id')))
			{
				list($status, $pull) = $this->pdqa_model->get_user(array(
					'user_id'	=>	$this->request('id')
				));

				$this->data['list_hrd_dept'][] = array('dept_id' => $pull['department_id'], 'dept_name' => $pull['department_name']);
				$this->data['list_hrd_empl'][] = array('user_id' => $pull['employee_id'], 'dept_id' => $pull['department_id']);
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

				$this->templates('view/add_login', $this->data);
			}

			if(($this->input2('save_add_login') !== null))
			{
				// check harus berpasangan
				// jika tdk berpasangan maka skip
				$check1 = $this->hrd_model->get_dept_employee(array(
					'dept_id' => $this->input2('select_dept_hidden'),
					'empl_id' => $this->input2('select_empl_hidden')
				));

				// check harus belum pernah diinput
				// $check2 = $this->pdqa_model->get_user(array(
				// 	'user_name'	=>	$this->input2('user_name'),
				// 	'empl_id'	=>	$this->input2('select_employee'),
				// 	'dept_id'	=>	$this->input2('select_dept')
				// ));

				// check data
				// if($check1 && !$check2)
				if($check1)
				{
					$user['user_name'] = $this->input2('user_name');
					$user['user_pass'] = password($this->input2('user_pass'));
					$user['department_id'] = $this->input2('select_dept');
					$user['department_name'] = $this->input2('select_dept_hidden');
					$user['employee_id'] = $this->input2('select_employee');
					$user['employee_name'] = $this->input2('select_empl_hidden');
					// $user['is_active'] = $this->input2('is_active');

					foreach($this->data['list_module'] as $value)
					{
						$checked = (!empty($this->input2('list_check'))) ? $this->input2('list_check') : $this->data['list_module'];
					
						$user[$value] = in_array($value, $checked)  ? 1 : 0;
					}

					list($user_status, $user_id) = $this->pdqa_model->add_user($user, $this->request('id'));

					// header('Location: ' . base_url('module_master_user'));
				}
			}

			$this->templates('view/add_login', $this->data);
		}
	}

	function module_master_user()
	{
		session_start();

		if(!empty($this->session('user_name')))
		{
			$this->data['user_name'] = $this->session('user_name');
			$this->data['data_login'] = $this->pdqa_model->get_user(array(
				'is_active'	=>	1
			));

			if($this->input2('btn_search_login') !== null)
			{
				list($search_status, $search_data) = $this->pdqa_model->get_user(array(
					'user_names'	=>	$this->input2('select_login_hidden') . "%"
				));

				// buggy
				$this->data['data_login2'][1] = array($search_data);

				$this->templates('view/show_login', $this->data);							
			}

			if(empty($this->data['data_login2']))
				$this->data['data_login2'] = $this->data['data_login'];

			$this->templates('view/show_login', $this->data);
		}

		header('Location:' . base_url('login'));
	}

	function delete_login()
	{
		$check = $this->pdqa_model->delete_user($this->input2('id'));

		if($check)
			header('Location: ' . base_url('module_master_user'));
	}

	function module_master_standar_analisa()
	{
		session_start();

		if(!empty($this->session('user_name')))
		{
			$this->data['user_name'] = $this->session('user_name');
			$this->data['data_standar_analisa'] = $this->pdqa_model->get_master_standar_analisa()[1];
			$this->data['data_standar_analisa_items'] = $this->pdqa_model->get_standar_analisa_items();
			$this->data['data_standar_analisa_items_size'] = $this->_pdqa_standar_analisa_items_size();

			if($this->input2('btn_search_login') !== null)
			{
				list($search_status, $search_data) = $this->pdqa_model->get_user(array(
					'user_names'	=>	$this->input2('select_login_hidden') . "%"
				));

				// buggy
				$this->data['data_login2'][1] = array($search_data);

				$this->templates('view/show_login', $this->data);							
			}

			$this->templates('view/show_standar_analisa', $this->data);
		}
	}

	function add_standar_analisa()
	{
		session_start();

		if(!empty($this->session('user_name')))
		{
			$this->data['user_name'] = $this->session('user_name');
			$this->data['data_standar_analisa_items'] = $this->pdqa_model->get_standar_analisa_items();

			if($this->input2('save_add_analisa') !== null)
			{
				var_dump($this->_merge_pdqa_standar_analisa_items(array('standar_analisa_item'))); die();

				$check1 = $this->pdqa_model->add_user_module(array(
					$this->_merge_pdqa_standar_analisa_items(array('standar_analisa_item'))
				), $this->request('id'));

				if($this->input2('save_add_analisa') !== null) {}
			}

			$this->templates('view/add_standar_analisa', $this->data);
		}
	}

	function _filter_user($field = array())
	{
		$tmp = array();

		list($status, $data) = $this->pdqa_model->get_user();
		foreach($field as $fields)
			foreach($data as $id => $value)
				$tmp[] =  $value[$fields];

		return $tmp;
	}

	function _pdqa_standar_analisa_items_size()
	{
		$temp = array();
		foreach($this->pdqa_model->get_standar_analisa_items() as $value)
		{
			$temp[] = strtolower("{$value}_min");
			$temp[] = strtolower("{$value}_max");
		}
 		return $temp;
	}

	function _merge_pdqa_standar_analisa_items($addon = array())
	{
		$addons = (!empty($addon)) ? $addon : array();

		$merge = array_merge($addons, $this->_pdqa_standar_analisa_items_size());

		$tmp = array();
		foreach($merge as $items)
			$tmp[$items] = $this->input2($items);

		return $tmp;
	}
}