<?php

class IndexController extends Controller
{
	private $TestModel;

	function __construct(){
		parent::__construct();
		$this->TestModel=$this->model('Test','home');
	}

	public function index(){
		
		$Count = $this->TestModel->Counts();

		$p=  isset($_GET['p']) ?  $_GET['p'] :1;

		$page = new Pager($Count,10);
		$page->AbsolutePage = $p; //当前锁定页
		$pageShow=$page->pageShow(); //当前锁定页

		$datas = $this->TestModel->page($page->AbsolutePage,$page->Size);

		dump( $this->TestModel->database->last_query() );

		$arr=[
			'pages'		=>	$pageShow,
			'data'		=>	$datas,
			'title'		=>	'列表',
		];

		$this->display('index',$arr);
	}



	// 模型测试
	public function model_test(){
			
		$id=$this->TestModel->addRes([
			'name'	=>	'bool',
		]);

		if($id){
			die( $id.'-添加成功！');
		}


		// dd( $model );
	}		




}