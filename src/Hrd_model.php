<?

class Hrd_model
{
	var $connector;

	function get_employee($params = array())
	{
		$where = array();
		$sql = "select user_id, name, default_deptid from master_employee";
		if(!empty($params['user_id']))
			$where[] = "user_id = ?";
		if(!empty($params['default_deptid']))
			$where[] = "default_deptid = ?";
		if(!empty($params['empl_names']))
			$where[] = "name like ?";
		if(count($where) >= 1)
			$sql .= " where " . implode($where, " and ");

		$sql .= ";";

		$query = $this->connector->read($sql, parse_array($params));

		return array($query->status(), $query->results());
	}

	function get_department($params = array())
	{
		$where = array();
		$sql = "select dept_id, dept_name from master_department";
		if(!empty($params['dept_id']))
			$where[] = "dept_id = ?";
		if(!empty($params['dept_name']))
			$where[] = "dept_name = ?";
		if(!empty($params['dept_names']))
			$where[] = "dept_name like ?";
		if(count($where) >= 1)
			$sql .= " where " . implode($where, " and ");

		$sql .= ";";

		$query = $this->connector->read($sql, parse_array($params));

		return array($query->status(), $query->results());
	}

	function get_v_dept_employee($params = array())
	{
		$where = array();
		$sql = "select b.dept_id, b.dept_name, a.user_id, a.name from master_employee a";
		$sql .= " left join master_department b on b.dept_id = a.default_deptid";
		if(!empty($params['dept_id']))
			$where[] = "b.dept_id = ?";
		if(!empty($params['user_id']))
			$where[] = "a.user_id = ?";
		if(!empty($params['filter']))
			$where[] = "a.user_id not in (?)";
		
		if(count($where) >= 1)
			$sql .= " where " . implode($where, " and ");

		$sql .= ";";

		$query = $this->connector->read($sql, parse_array($params));

		return array($query->status(), $query->results());
	}
}