<?php
// namespace dagger;

/**
* 模型
*/
class Model
{	
	public $database;
	function __construct()
	{
		$config= include __CONFIG__.'database.php';

		$this->database = new medoo([
		    // 必须配置项
		    'database_type' => $config['database_type'],
		    'database_name' => $config['database_name'],
		    'server' 		=> $config['server'],
		    'username'		=> $config['username'],
		    'password' 		=> $config['password'],
		    'charset' 		=> $config['charset'],
		 
		    // 可选参数
		    'port' 			=> $config['port'],
		 
		    // 可选，定义表的前缀
		    'prefix' 		=> $config['prefix'],
		 
		    // 连接参数扩展, 更多参考 http://www.php.net/manual/en/pdo.setattribute.php
		    'option' 		=> [
		        PDO::ATTR_CASE => PDO::CASE_NATURAL
		    ]
		]);
	}

	public function add($table,$res){
		return $this->database->insert($table, $res);		
	}

}