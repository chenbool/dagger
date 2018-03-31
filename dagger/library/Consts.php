<?php
namespace dagger;

/**
* const 常量
*/
final class Consts
{
	public static function set(){
		self::systemSet();
		self::_init();
		self::request();	    		
	}


	private static function _init(){

		// is / or \
	    define("DS", DIRECTORY_SEPARATOR);	   

	    // 根路径
	    define("__ROOT__", dirname( getcwd() ).DS );

	    // 静态文件目录
	    define("__PUBLIC__",__HOST__.dirname( _PHP_FILE_ ).DS);

	    // 框架目录
	    define("__FRAMEWORK__", __ROOT__ . "dagger" . DS);	    

	    define("__LIB__", __FRAMEWORK__ . "library" . DS);


	    // // 配置目录
	    define("__CONFIG__", __ROOT__ . "config" . DS);
	    $GLOBALS['config'] = include __CONFIG__ . "config.php";

	    // // 应用目录
	    define("__APP__", __ROOT__ . $GLOBALS['config']['appName'] . DS);

	    // // 核心库
	    // define("__CORE__", __FRAMEWORK__ . "core" . DS);

	    // //帮助函数
	    // define("__HELPER__", __FRAMEWORK__ . "helper" . DS);		
	}


	// 定义当前请求的系统常量
	private static function request(){
        define('NOW_TIME',      $_SERVER['REQUEST_TIME']);
        define('REQUEST_METHOD',$_SERVER['REQUEST_METHOD']);
        define('IS_GET',        REQUEST_METHOD =='GET' ? true : false);
        define('IS_POST',       REQUEST_METHOD =='POST' ? true : false);
        define('IS_PUT',        REQUEST_METHOD =='PUT' ? true : false);
        define('IS_DELETE',     REQUEST_METHOD =='DELETE' ? true : false);	

	}

	// 定义当前系统的系统常量
	private static function systemSet(){

		// 记录开始运行时间
		$GLOBALS['_beginTime'] = microtime(TRUE);

		// var_dump( microtime(TRUE) );

		// 记录内存初始使用
		define('MEMORY_LIMIT_ON',function_exists('memory_get_usage'));
		if(MEMORY_LIMIT_ON) $GLOBALS['_startUseMems'] = memory_get_usage();

		// 版本信息
		// const VERSION     =   '1.0.0';

		define('IS_CGI',(0 === strpos(PHP_SAPI,'cgi') || false !== strpos(PHP_SAPI,'fcgi')) ? 1 : 0 );
		define('IS_WIN',strstr(PHP_OS, 'WIN') ? 1 : 0 );
		define('IS_CLI',PHP_SAPI=='cli'? 1   :   0);

		define("__HOST__", 'http://'.$_SERVER['HTTP_HOST']);
        define("__SELF__", __HOST__.$_SERVER['SCRIPT_NAME'].$_SERVER['PATH_INFO']);	

		if(!IS_CLI) {
		    // 当前文件名
	        if(IS_CGI) {
	            //CGI/FASTCGI模式下
	            $_temp  = explode('.php',$_SERVER['PHP_SELF']);
	            define('_PHP_FILE_',    rtrim(str_replace($_SERVER['HTTP_HOST'],'',$_temp[0].'.php'),'/'));
	        }else {
	            define('_PHP_FILE_',    rtrim($_SERVER['SCRIPT_NAME'],'/'));
	        }

		}	


	}	

}