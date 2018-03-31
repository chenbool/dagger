<?php
/**
* 核心类
*/
class Controller 
{
	function __construct(){

	}
	
	// 模版分配
	public function display($tpl=null,$temp=[]){
		View::display($tpl,$temp);		
	}	
	
	// 返回ajax
	public function returnAjax($res){
		return json_encode($res);		
	}	

	//模型载入
	public function model($model,$module=null){
		$url=Route::url();	
		$module= !is_null($module) ? $module : $url['module'] ;

		$path = __APP__.$module.DS.'model'.DS.$model.'.php';

		file_exists($path) || Exceptions::error($path.' 模型不存在！');

		include $path;
		return new Test();

	}


}