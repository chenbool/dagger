<?php
/**
* 异常类
*/
final class Exceptions{

	public static function error($msg){
		$message=$msg;
		include __FRAMEWORK__.'tpl/exception.php';
		exit;
	}

}