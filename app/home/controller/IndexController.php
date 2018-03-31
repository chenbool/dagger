<?php

class IndexController extends Controller
{
	public function index(){
		// dd( $_GET );
		// dump('index page');
		
		View::display('',[
			'title'	=>	'这是index方法',
			'data'	=>	[
				'简洁',
				'高效',
				'敏捷',
				'小巧'
			],

		]);
	}

	// test方法
	public function test(){
		
		$this->display('index',[
			'title'	=>	'这是test方法',
			'data'	=>	[
				'简洁',
				'高效',
				'敏捷',
			],

		]);
	}

	// 模型测试
	public function model_test(){
		$model=$this->model('Test','home');	

		$id=$model->addRes([
			'name'	=>	'bool',
		]);

		if($id){
			die( $id.'-添加成功！');
		}


		// dd( $model );
	}		


	// 验证码
	public function code(){
		// var_dump( $_SESSION );

		$code = new Captcha();
		$code->CreateImg();
		// $code->check($code);
	}


}