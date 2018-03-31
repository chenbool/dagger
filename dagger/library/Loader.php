<?php
namespace dagger;
use dagger;

/**
* 加载
*/
final class Loader
{
	//加载常量
	private static function _init(){		
		require 'Consts.php';
		Consts::set();
	}

	public static function run(){
		self::_init();
		self::_load();

		//debug
		if( $GLOBALS['config']['debug'] ){
			include __FRAMEWORK__.'tpl/trace.php';
			// include __FRAMEWORK__.'tpl/exception.php';
		}


	}


	// 自动加载
	private static function _load(){		
		$path=require __CONFIG__.'loader.php';

		is_array( $path ) || die( __CONFIG__.'loader.php文件必须为数组!');



		foreach ($path as $key => $value) {

			foreach ($value as $v) {

				// 当为空的时候就跳过
				if( is_null($v) || empty($v) ){
					break;
				}

				//文件名
				$files=__FRAMEWORK__.$key.DS.$v.'.php';

				// 检测文件是否存在
				if( file_exists($files) ){
					include __FRAMEWORK__.$key.DS.$v.'.php';
					
					// library库的文件才被实例化
					if($key=='library'){
						class_exists($v) && new $v();
					}
					
				}else{
					echo __FRAMEWORK__.$key.DS.$v.'.php 不存在!<br>';
					continue;
				}
				
			}

		}	


	}	






}