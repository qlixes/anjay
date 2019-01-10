<?php

class Pdqa_model
{
	var $database;

	function get_module($params = array())
	{
		$where = array();
		$sql = "select * from tbl_module";
		if(!empty($params['module_label']))
			$where[] = "module_label = ?";

		if(count($where) >= 1)
			$sql .= " where " . implode($where, " and ");

		$sql .= ";";

		$query = $this->database->read($sql, parse_array($params));

		return array($query->status(), $query->results());
	}

	function get_product($params = array())
	{
		$sql = "select * from master_product";
		if(!empty($params['product_id']))
			$where[] = "product_id = ?";
		if(!empty($params['product_name']))
			$where[] = "product_name = ?";
		if(count($where) >= 1)
			$sql .= " where " . implode($where, " and ");

		$sql .= ";";

		$query = $this->database->read($sql, parse_array($params));

		return array($query->status(), $query->results());
	}

	function get_user($params = array())
	{
		$where = array();
		$sql = "select * from tbl_user";
		if(!empty($params['user_id']))
			$where[] = "id = ?";
		if(!empty($params['dept_id']))
			$where[] = "department_id = ?";
		if(!empty($params['user_name']))
			$where[] = "user_name = ?";
		if(!empty($params['user_names'])) //utk search user
			$where[] = "user_name like ?";
		if(!empty($params['empl_id']))
			$where[] = "employee_id = ?";
		if(!empty($params['user_pass']))
			$where[] = "user_pass = ?";
		if(!empty($params['is_active']))
			$where[] = "is_active = ?";

		if(count($where) >= 1)
			$sql .= " where " . implode($where, " and ");

		$sql .= ";";

		$query = $this->database->read($sql, parse_array($params));

		// var_dump($sql); var_dump($params); var_dump($query);

		return array($query->status(), $query->results());
	}

	function add_user($params = array(), $id = null)
	{
		if($id)
		{
			foreach($params as $key => $value)
				$data[] = "$key='$value'";
			$sql = "update tbl_user set " . implode($data, ',') . " where id = $id";
		} else {
			foreach($params as $key => $value)
			{
				$field[] = $key; $values[] = "?";
			}
			$sql = "insert into tbl_user(" . implode($field, ',') . ") values (" . implode($values, ',') . ")";
		}

		$sql .= ";";

		$query = $this->database->edit($sql, parse_array($params));

		return array($query->status(), $query->insertId());
	}

	function add_user_module($params = array(), $id = null)
	{
		if($id)
		{
			foreach($params as $key => $value)
				$data[] = "$key='$value'";
			$sql = "update tbl_user_module set " . implode($data, ',') . " where id = $id;";
		} else {
			foreach($params as $key => $value)
			{
				$field[] = $key; $values[] = "?";
			}
			$sql = "insert into tbl_user_module(" . implode($field,',') . ") values (" . implode($values, ',') . ")";
		}

		$sql .= ";";

		$query = $this->database->edit($sql, parse_array($params));

		return array($query->status(), $query->insertId());
	}

	function delete_user($id)
	{
		$sql = "update tbl_user set is_active = 0 where id = $id;";
	}

	function add_master_standar_analisa($params = array(), $id = null)
	{
		if($id)
		{
			foreach($params as $key => $value)
				$data[] = "$key='$value'";
			$sql = "update tbl_master_standar_analisa set " . implode($data, ',') . " where id = $id;";
		} else {
			foreach($params as $key => $value)
			{
				$field[] = $key; $values[] = "'{$value}'";
			}
			$sql = "insert into tbl_master_standar_analisa(" . implode($field, ',') . ") values (" . implode($values, ',') . ");";
		}
	}

	function get_master_standar_analisa($params = array())
	{
		$where = array();
		$sql = "select * from tbl_master_standar_analisa";
		foreach($params as $key => $value)
			$where[] = "$key=$value";
		if(count($where) >= 1)
			$sql .= " where " . implode($where, " and ");

		$sql .= ";";

		$query = $this->database->read($sql, parse_array($params));

		return array($query->status(), $query->results());
	}

	function get_standar_analisa_items()
	{
		return array(
			'PIH', 'PPM', 'PEM', 'VTW', 'MADU', 'VDE', 'SCH', 'CHO', 'STR', 'SIC'
		);
	}

	function get_module_items()
	{
		return array(
			'module_master_user',
			'module_master_standar_analisa',
			'module_master_form_analisa',
			'module_master_form_analisa_ro3',
			'module_report_analisa',
			'module_report_analisa_ro3'
		);
	}

	function get_form_analisa($params = array())
	{
	}
}