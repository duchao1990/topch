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
        if (session('?name')) {
            $this->redirect('index/index',array(),0,'');
        }elseif($_POST['username']) {
        $where1['uname']=$name;
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
                   session('role_name', $role['role_name']);
                   session('depar_id', $role['depart_id']);
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

    public function adduser() {
        $departModel=M('department');
        $roleModel=M('role');
        $userModel=M('user');
        if ($_POST['type']=="addDepart") {
            $data['parent_id']=intval(I('post.parent_id'));
            $data['depart_name']=I('post.depart_name');
            $data['description']=I('post.description');
            $rs=$departModel->add($data);
            if ($rs) {
                alert('success', '添加成功');
            }else {
                alert('error', '添加失败');
            }
        }

        if ($_POST['type']=="addRole") {
            $data['depart_id']=intval(I('post.depart_id'));
            $data['role_name']=I('post.roleName');
            $data['description']=I('post.description');
            $rs=$roleModel->add($data);
            if ($rs) {
                alert('success', '添加成功');
            }else {
                alert('error', '添加失败');
            }
        }

        if ($_POST['type']=="addUser") {
            $data['uname']=I('post.uname');
            $data['salt']=mysalt();
            $data['pwd']=createPwd(I('post.pwd'),$data['salt']);
            $data['roleId']=intval(I('post.role_id'));
            print_r($data);
            die();
            $rs=$userModel->add($data);
            if ($rs) {
                alert('success', '添加成功');
            }else {
                alert('error', '添加失败');
            }
        }


        $depart=$departModel->order('depart_Id')->getField('depart_Id,depart_name');
        $this->alert = parseAlert();
        $this->assign('depart',$depart);
        $this->display('add');
    }
    function ajaxRole() {
        $roleModel=M('role');
        $where['depart_id']=I('post.departId');
        $role=$roleModel->where($where)->select();
        $this->ajaxReturn($role);

    }
    public function userInfo()
    {

      $this->display('userInfo');
    }

    public function userList() {
      $d_role=D('RoleView');
      //$where['user.uid']=$user['uid'];
      $role=$d_role->select();
      echo json_encode($role);
    }

    public function departList() {
        $departModel=M('department');
        $rs=$departModel->select();
        $str="<select>";
        foreach ($rs as $key => $value) {
          $str .="<option value='{$value['depart_Id']}'>{$value['depart_name']}</option>";
        }
        $str.="</select>";
        echo $str;
    }
}