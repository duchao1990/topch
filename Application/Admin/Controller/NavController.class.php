<?php
namespace Admin\Controller;

use Think\Controller;
class NavController extends Controller {
    function index() {
        $this->display();
    }

    function dataList(){
        $page     =$_POST['page']?intval($_POST['page']):1;
        $limit    =$_POST['rows']?intval($_POST['rows']):10;
        $start    =$page*$limit-$limit;
        $navModel =M('navi');
        $count    =$navModel->count();
        if( $count >0 ) {
            $total_pages = ceil($count/$limit);
        } else {
            $total_pages = 0;
        }
        if ($page>$total_pages) { $page=$total_pages;}
        $nav            =$navModel->limit("$start,$limit")->select();
        $ret            =array();
        $ret['page']    =$page;
        $ret['rows']    =$nav;
        $ret['records'] =$count;
        $ret['total']   =$total_pages;
        $ret['limit']   =$limit;
        echo json_encode($ret);
    }

    function operateList() {
        //更新内容
        $navModel=M('navi');
        if ($_POST['oper']=='edit') {

           if ($_POST['parent_id']) {
               $data['parent_id']=intval($_POST['parent_id']);
           }

           if ($_POST['naviname']) {
               $data['naviname']=I('post.naviname');
           }

           if ($_POST['c']!='') {
               $data['c']=trim(I('post.c'));
           }

           if ($_POST['v']!='') {
               $data['v']=trim(I('post.v'));
           }

           if($_POST['control_ids']){
               $data['control_ids']=trim(I('control_ids'));
           }

           if ($_POST['sort_id']) {
               $data['sort_id']=intval(I('post.sort_id'));
           }
           //更新条件
           $where['naviId']=intval($_POST['naviId']);

           $res=$navModel->where($where)->save($data);
           //添加导航
           }elseif ($_POST['oper']=='add'){
                $add['parent_id']   =intval(I('post.parent_id'));
                $add['naviname']    =trim(I('post.naviname'));
                $add['c']           =trim(I('post.c'));
                $add['v']           =trim(I('post.v'));
                $add['control_ids'] =I('post.control_ids');
                $add['sort_id']     =intval(I('post.sort_id'));
                $navModel->add($add);
            //删除导航
           }elseif ($_POST['oper']=='del'){
               $ids=trim($_POST['id']);
               $navModel->delete($ids);
           }

    }

    /**
     * 生成查询条件,用与dataList方法的查询条件
     */
    function condition() {
        //将jqGrid 的 查询关系转成sql的关系类型
        ;
    }
}