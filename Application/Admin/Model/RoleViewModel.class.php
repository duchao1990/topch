<?php
namespace Admin\Model;

use Think\Model\ViewModel;
class RoleViewModel extends ViewModel {
    public $viewFields=array(
        'role'=>array('uid', 'roleid', 'depart_id','role_name', '_type'=>'LEFT'),
        'user'=>array('uname','status','wid','sex', 'qq','address', 'email', 'mobile','_on'=>'user.uid=role.uid',  '_type'=>'LEFT'),
        'department'=>array('depart_name', '_on'=>'department.depart_id=role.depart_id')
    );
}