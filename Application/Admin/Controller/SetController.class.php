<?php
namespace Admin\Controller;

use Think\Controller;
class setController extends Controller {
    function index() {
        $config['navName']='设置';
        $config['actName']='导航管理';
        $config['navid']=2;
        C($config);
        $this->display();
    }
}