<?php
namespace Admin\Model;

use Think\Model\ViewModel;
class RoleViewModel extends ViewModel {
    public $viewFields=array(
        'role'=>array('uid', 'roleid', 'positionid', '_type'=>'LEFT'),
        'user'=>array('name'=>'uname','status','wid','sex', 'address', 'email', 'mobile','_on'=>'user.uid=role.uid',  '_type'=>'LEFT'),
        'position'=>array('role_name'=>'rname', 'parent_id',  'departmentId', 'description','_on'=>'position.positionId=role.positionId', '_type'=>'LEFT'),
        'department'=>array('name'=>'dname', '_on'=>'department.departmentId=position.departmentId')
    );
}