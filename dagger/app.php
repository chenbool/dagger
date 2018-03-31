<?php
namespace dagger;

/**
* app 启动类
*/
final class app
{	

	// bootstrap 启动
	public static function run(){
		self::_init();
		self::loader();
	}

	// 初始化
	private static function _init(){
		header("Content-type: text/html; charset=utf-8");  
		session_start();
		date_default_timezone_set('PRC');
	}	

	// 自动加载
	private static function loader() {			
		require dirname(__FILE__).'/library/Loader.php';
		Loader::run();
	}
	

}