<?php

class Loader
{
	function router()
	{
		$uri_path = str_replace($_SERVER['SCRIPT_NAME']. '/', '', $_SERVER['PHP_SELF']);
		$shortcut = ($uri_path === $_SERVER['SCRIPT_NAME']) ? 'login/' : $uri_path;

		$array = explode('/', $shortcut);

		return $array[0];
	}

	function run()
	{
		require_once SYSPATH . 'Controller.php';

		$method = $this->router();

		$ctrl =  new Controller();
		
		$ctrl->{$method}();

		// $method = self::router();

		// Controller::{$method}();
	}
}