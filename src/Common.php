<?php

class Common extends \stdClass
{
	static $classes = array();

	function _load_class($class)
	{
		$classes = ucfirst($class);

		if(empty(self::$classes[$class])) {
			$this->require_file(SYSPATH . "{$classes}.php");
			self::$classes[$class] = new $classes();
		}

		return self::$classes[$class];
	}

	function _view($view)
	{
		$this->include_file("{$view}.php");
		// $this->require_file("{$view}.php");
	}

	function connector($config = array())
	{
		$connector = $this->_load_class('database');

		$connector->connect($config);

		return $connector;
	}

	function templates($content, $data = array(), $return = false)
	{
		foreach($data as $key => $value)
			$$key = $value;

		$content = array('template/header','template/topnav', $content, 'template/footer');

		ob_start();

		// foreach($content as $page)
		// 	$this->_view($page);

		foreach($content as $page)
			include_once("{$page}.php");

		$template = ob_get_contents();
		// $template = file_get_contents($temp);

		ob_end_flush();

		if($return)
			echo $template;
		else
			return $template;
	}

	function model($model = array())
	{
		foreach($model as $models)
			$this->{$models} = $this->_load_class($models);
	}

	function input($alias) //jika ada munculkan jk tdk isi dengan null
	{
		//allowed only post,get,cookie
		if ( ! preg_match("/^[a-z0-9:_\/-]+$/i", $alias))
			die('Disallowed Key Characters.');

		if(empty($_POST[$alias]))
			return null;

		return $_POST[$alias];
	}

	function input2($alias)
	{
		if ( ! preg_match("/^[a-z0-9:_\/-]+$/i", $alias))
			die('Disallowed Key Characters.');

		return (!empty($_POST[$alias])) ? $_POST[$alias] : null;
	}

	function request($alias)
	{
		if ( ! preg_match("/^[a-z0-9:_\/-]+$/i", $alias))
			die('Disallowed Key Characters.');

		return (!empty($_GET[$alias])) ? $_GET[$alias] : null;
	}

	function session($alias)
	{
		if ( ! preg_match("/^[a-z0-9:_\/-]+$/i", $alias))
			die('Disallowed Key Characters.');

		if(empty($_SESSION[$alias]))
			return null;

		return $_SESSION[$alias];
	}

	function config($config = array())
	{
		foreach($config as $configs)
			$this->{$configs} = $this->require_file(BASEPATH . 'config' . DIRECTORY_SEPARATOR . "{$configs}.php");
	}

	function include_file($file)
	{
		if(!file_exists($file))
			die("{$file} not found");

		include $file;
	}

	function require_file($file)
	{
		if(!file_exists($file))
			die("{$file} not found");

		$result = require $file;

		return  $result;
	}

	function validation($params = array())
	{
	}
}