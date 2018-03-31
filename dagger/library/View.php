<?php
/**
* 视图
*/
final class View {

	public static function display( $tpl=null,$temp=[]){		

		$url=Route::url();	

		// var_dump( $url );	

		// 模块
		$module=$url['module'];

		// 控制器
		$controller=lcfirst($url['controller']);

		//方法
		$action=lcfirst($url['action']);


		// 当前模版使用
		if( !is_null($tpl) && !empty($tpl) ){
			$action=$tpl;
		}

		// 分配变量
		if( !is_null($temp) && !empty($temp) ){
			error_reporting(0);
			extract( $temp);
			// print_r(  $temp );
		}
		

		// viewName  tplExt
		$path = __ROOT__.$GLOBALS['config']['appName'].DS.$module.DS.'view'.DS.$controller.DS.$action.$GLOBALS['config']['tplExt'];

		file_exists($path) || Exceptions::error($path.' 模版不存在！');
		// file_exists($path) || die($path.' 模版不存在！');

		//引入视图
		include $path;


	}



}