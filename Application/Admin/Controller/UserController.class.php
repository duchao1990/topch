<?php
namespace Admin\Controller;

use Think\Controller;
class UserController extends Controller {
    function index() {
        $this->display('login');
    }

    function login(){
        $name=I('post.username');
        $pwd=I('post.password');
        if (session('?ss')) {
            $this->redirect('index/index',array(),0,'');
        }elseif($_POST['username']) {
        $where1['name']=$name;
        $user=M('user')->where($where1)->find();
        $pwd=createPwd($pwd,$user['salt']);
        $salt_code=salt_code($user['uid'], $user['name'], $user['salt']);
        if($pwd==$user['pwd']) {
            if ($user['status']=='0') {
                alert('error','您的账号已被冻结,请联系管理员');
            }else {
               $d_role=D('RoleView');
               $where['user.uid']=$user['uid'];
               $role=$d_role->where($where)->find();
               //一周内自动登录
               if ($_POST['autologin']=='on') {
                   session(array('expire'=>604800));
                   cookie('uid',$user['uid'],604800);
                   cookie('name',$user['name'],604800);
                   cookie('salt_code',$salt_code,604800);
               }else {
                   session(array('expire'=>3600));
               }

               if (!is_array($role) || empty($role)) {
                   alert('error', '没有该用户');
               } else {
                   session('role_id', $role['role_id']);
                   session('position_id', $role['position_id']);
                   session('role_name', $role['role_name']);
                   session('department_id', $role['department_id']);
                   session('name', $user['name']);
                   session('uid', $user['uid']);
                   $this->redirect('index/index',array(),0,'');
               }
            }

        }else {
            alert('error', '用户名和密码不搭配');
        }
        $this->alert = parseAlert();
        $this->display();
        }
    }
}