<?php
/**
* Test
*/
class Test extends Model
{

	private $tableName= 'test';

	function __construct()
	{
		parent::__construct();
	}

	public function addRes($res){
		return $this->add($this->tableName,$res);
	}

	public function findAll(){
		return $this->database->select($this->tableName, "*");
	}

	public function Counts(){
		return $this->database->count($this->tableName, []);
	}
	
	public function page($current,$size){
		$start=($current-1)*$size;
		$end=$start+$size;

		// var_dump( $current );
		// echo $start.'------'.$end.'<hr>';
		
		return $this->database->select($this->tableName,"*",[
			"LIMIT" => [$start, $end]
		]);	

		// return $this->database->query('SELECT * FROM "test" LIMIT '.$start.','.$end)->fetchAll();	
	}
}