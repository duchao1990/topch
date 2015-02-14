<?php
namespace Admin\Controller;

use Think\Controller;
class DroleController extends Controller {
    function deaprtadd() {
        $data['parent_id']=intval(I('post.parent_id'));
        $data['depart_name']=I('post.depart_name');
        $data['description']=I('post.description');
        $departModel=M('department');
        $rs=$departModel->add($data);

        if ($rs) {
             alert('success', '添加成功');
        }else {
            alert('error', '添加失败');
        }
        $this->alert = parseAlert();
        $this->display('User/add');
    }
}