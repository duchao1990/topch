<?php
namespace Admin\Model;

use Think\Model\ViewModel;
class RoleViewModel extends ViewModel {
    public $viewFields=array(
        'user'=>array('uid','uname','status','wid','sex', 'qq','address', 'email', 'mobile',  '_type'=>'LEFT'),
        'role'=>array('roleid', 'depart_id','role_name','_on'=>'user.roleId=role.roleId', '_type'=>'LEFT'),
        'department'=>array('depart_name', '_on'=>'department.depart_id=role.depart_id')
    );
}