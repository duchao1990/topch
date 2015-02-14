<?php
namespace Admin\Widget;

use Think\Controller;
class MeauWidget extends Controller {
    function meau() {
            $navModel=M('navi');
            //横向导航菜单
            $navWhere['parent_id']=0;
            $nav=$navModel->where($navWhere)->order('parent_id asc,sort_id asc')->select();

            foreach ($nav as $key => $value) {
               $where['parent_id']=$value['naviId'];
               $sonArray=$navModel->where($where)->order('sort_id asc')->select();
               $nav[$key]['son']=$sonArray;
               foreach ($sonArray as $k => $val) {
                  $condition['parent_id']=$val['naviId'];
                  $parentSon=$navModel->where($condition)->order('sort_id asc')->select();
                  $nav[$key]['son'][$k]['son']=$parentSon;
               }

            }
            $this->assign('nav',$nav);
          
            //竖向二级
            $this->display('Meau:nav');

    }
}