<?php

class FileController extends Controller{

	function __construct(){
		parent::__construct();
	}

	public function upload(){
		// dump(__SELF__);
		if( IS_POST ){
			var_dump( __ROOT__ );

			$upload=new Upload();
			$upload->maxSize  = 3*pow(2,20) ;// 设置附件上传大小  3M    默认为2M
			$upload->allowExts  = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型   默认为空不检测扩展
			$upload->savePath =  __ROOT__.'public\uploads';// 设置附件上传目录   默认上传目录为 ./uploads/
			
			if(!$upload->upload()) {
				// 上传错误提示错误信息
				$upload->getErrorMsg();
			}else{
				// 上传成功 获取上传文件信息
				$info =  $upload->getUploadFileInfo();
				dd( $info );
			}	

		}

		$this->display();
	}

	public function uploadOne(){

		if( IS_POST ){

			$upload=new Upload();
			$upload->maxSize  = 3*pow(2,20) ;// 设置附件上传大小  3M    默认为2M
			$upload->allowExts  = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型   默认为空不检测扩展
			$upload->savePath =  __ROOT__.'public\uploads';// 设置附件上传目录   默认上传目录为 ./uploads/
			
			if(!$upload->upload()) {
				// 上传错误提示错误信息
				$upload->getErrorMsg();
			}else{
				// 上传成功 获取上传文件信息
				$info =  $upload->getUploadFileInfo();
				dd( $info );
			}	

		}

		$this->display();
	}

	public function images(){
		$path=__ROOT__.'public\uploads\1.png';
		// dump( $path );
		$image = new Image($path);
		$image->rotate(90);
		$image->resize(150,150,'crop'); 
		$image->save("newFilename", __ROOT__."public\uploads");

	}


	public function curl(){
		$curl = new Curl;
		$res=$curl->url('http://medoo.lvtao.net/doc.query.php');

		// 任务结果状态
		if ($curl->error()) {
		    echo $curl->message();
		} else {
		    // 任务进程信息
		    $info = $curl->info();
		    
		    // 任务结果内容
		    $content = $curl->data();
		    echo $content;
		}

	}

}