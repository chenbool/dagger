<?php
// namespace dagger;

/**
* 路由
*/
class Route
{
	
	function __construct()
	{
		self::dispatch( );
	}

	// 处理路由
	private static function dispatch(){

		if(  !isset( $_SERVER['PATH_INFO'] )  ){
			$module='home';
			$controller="index";
			$action='index';
		}else{

			// 获取path_info
			$pathInfo=trim( $_SERVER['PATH_INFO'] ,'/');

			$route = explode('/',$pathInfo); 
			$module=$route[0];
			unset($route[0]);
			$controller=$route[1];
			unset($route[1]);
			$action=$route[2];
			unset($route[2]);

			$route=array_values($route);

			// 把参数存入GET
			foreach ($route as $k => $v) {

				if($k%2==0){
					$_GET[ $route[$k] ] =$route[$k+1];
				}else{
					continue;
				}
				
			}


		}



		self::_load($module,$controller,$action);

	}

	// 加载控制器
	private static function _load($module,$controller,$action){

		$controller=ucfirst($controller).'Controller';
		// $action=lcfirst($action);

		require  __APP__.$module.DS.'controller/'.$controller.'.php';
		$controller=new $controller();
		$controller->$action();

	}

	// 获取url
	public static function url(){

		$path=[];

		if(  !isset( $_SERVER['PATH_INFO'] )  ){
			$path['module']		=	'home';
			$path['controller']	=	"index";
			$path['action']		=	'index';
		}else{
			// 获取path_info
			$pathInfo=trim( $_SERVER['PATH_INFO'] ,'/');

			$route = explode('/',$pathInfo); 
			$path['module']		=	$route[0];
			$path['controller']	=	$route[1];
			$path['action']		=	$route[2];

		}

		return $path;
	}

}