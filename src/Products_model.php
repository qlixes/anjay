<?

class Products_model
{
	var $connector;

	function get_product()
	{
		$sql = "select product_name, product_batch from master_products";
		if(!empty($params['product_id']))
			$where[] = "product_id = ?";
		if(!empty($params['product_name']))
			$where[] = "product_name = ?";
		if(!empty($params['product_batch']))
			$where[] = "product_batch = ?";
		if(count($where) >= 1)
			$sql .= " where " . implode($where, " and ") .";";
	}
}