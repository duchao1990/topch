<?php
namespace Admin\Controller;

use Think\Controller;

class AdminController extends Controller {
	public function _initialize(){
		$action = array(
			'permission'=>array('wxadd'),
			'allow'=>array('index')
		);
		B('Authenticate', $action);
	}
}