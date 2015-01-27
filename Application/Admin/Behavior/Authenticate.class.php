<?php
namespace Admin\Behavior;

use Think\Behavior;
class AuthenticateBehavior extends Behavior {
    public function run(&$params) {

        if (session('?uid') && intval(cookie('uid'))!=0 && trim(cookie('name')) != ''&& trim(cookie('salt_code')) != '') {
            $user=M('user')->where(array('uid'=>intval(cookie('uid'))))->find();
            if (md5(md5($user['uid'].$user['name']).$user['salt'])==trim(cookie('salt_code'))) {
                $d_role=D('Roleview');
                $role=$d_role->where('user.user.id=%d',$user['user_id'])->find();
            }

        };
    }
}