<?php
namespace App\Contract;

use App\Definition\Contract;
use App\Service\Response as ResponseService;

class Response
{
	use Contract;
	
	protected static function newInstance()
	{
		return new ResponseService();
	}
	public static function __callStatic($name, $params)
	{
		if (!method_exists(Response::class, $name)) {
			$instance = self::getInstance();
			if (method_exists($instance, $name)) {
				return call_user_func_array([$instance, $name], $params);
			}
			return null;
		}
		return call_user_func_array([self, $name], $params);
	}
}
?>