<?php
namespace Home\Controller;

use Think\Controller;
class EditorController extends Controller {
    public function index() {
        $this->display();
    }

    public function submit() {
        $wish=M('wish');
        $data['wishcon']=$_POST['content'];
        $rs=$wish->add($data);
       var_dump($rs);
    }
}