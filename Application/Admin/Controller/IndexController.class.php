<?php
namespace Admin\Controller;

use Think\Controller;
class indexController extends Controller {
    function index() {
        $nav['navname']='控制台';
        $nav['navid']=1;
        C($nav);
        $this->display();
    }
}