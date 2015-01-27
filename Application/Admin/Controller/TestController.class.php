<?php
namespace Admin\Controller;

use Think\Controller;
class TestController extends Controller {
    function index() {
        $this->display('Index:index');
    }
}