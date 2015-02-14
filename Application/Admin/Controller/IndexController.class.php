<?php
namespace Admin\Controller;

use Think\Controller;
class indexController extends Controller {
    function index() {
    	session(null); 
    	session('navName','控制台');
        session('navid','1');
        $this->display();
    }
}