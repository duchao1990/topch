<?php
namespace Admin\Widget;

use Think\Controller;
class MeauWidget extends Controller {
    function meau() {
            $navModel=M('navi');
            //横向导航菜单
            $where['parent_id']=0;
            $nav=$navModel->where($where)->select();
            $this->assign('nav',$nav);
            //竖向导航菜单
            $p_id=C('navid')?C('navid'):1;
            $condition="parent_id=$p_id";
            $list=$navModel->where($condition)->select();
            $this->assign('navlist',$list);
            //竖向二级菜单
            foreach ($list as $key => $value) {
            	$so_id=$value['naviId'];
            	$two="parent_id=$so_id";
            	$twoList=$navModel->where($two)->select();
            	if ($twoList) {
            		$parentList[$value['naviId']]=$twoList;
            	}
            	
            }
            $this->assign('parentList',$parentList);
            $this->display('Meau:nav');
    }
}