<?php
namespace Home\Controller;

use Think\Controller;
use Think\Upload;
class UploadController extends Controller {
   public function index() {
        $this->display();
    }

   public function upload() {
		if (IS_FILES) {
			$upload= new Upload();
			$upload->maxSize=5*1024*1024;
			$upload->saveName = array('uniqid','');
			$upload->exts = array('jpg', 'gif', 'png', 'jpeg');
			$info   =   $upload->uploadOne($_FILES['file']);
			// 在这里我们可以打印出$info的信息
			// 可以在info中提取合适的信息存到数据库中
			if (!$info) {
				$this->error($upload->getError());
			}else {
				 $this->success('图片上传成功'); 
			}
		}else {
			$this->display();
		}
	}

	public function uploadm() {
		if (IS_FILES) {
			foreach ($this->forup($_FILES) as $key => $value) {
				foreach ($value as $k => $val) {
					$upload= new Upload();
					$upload->maxSize=5*1024*1024;
					$upload->saveName = array('uniqid','');
					$upload->exts = array('jpg', 'gif', 'png', 'jpeg');
					$info   =   $upload->uploadOne($val);
					$infos[]=$info;
				}
			}
			// 在这里我们可以打印出$info的信息
			// 可以在info中提取合适的信息存到数据库中
			if (!$infos) {
				$this->error($upload->getError());
			}else {
				$this->success('图片上传成功'); 
			}
		}else {
			$this->display();
		}
	}

	public function uploads() {
	 	if (IS_FILES) {
	 		foreach ($this->forup($_FILES) as $key => $value) {
				foreach ($value as $k => $val) {
	 			$upload= new Upload();
				$upload->maxSize=5*1024*1024;
				$upload->saveName = array('uniqid','');
				$upload->exts = array('jpg', 'gif', 'png', 'jpeg');
				$info   =   $upload->uploadOne($val);
				$infos[]=$info;
	 		}
			}
			// print_r($infos);
			// die();
			// 在这里我们可以打印出$info的信息
			// 可以在info中提取合适的信息存到数据库中
			if (!$info) {
				$this->error($upload->getError());
			}else {
				$this->success('图片上传成功'); 
			}
		}
	}

	public function forup($files){
		foreach ($files as $key => $file) {
			foreach ($file as $ke=>$v) {
				foreach ($v as $k => $val) {
					$data[$key][$k][$ke]=$val;
				
				}
			}
		}
		return($data);
	}
}