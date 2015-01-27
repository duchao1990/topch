<?php
namespace Home\Controller;

use Think\Controller;
use Think\Page;
use Think\MyPage;
class PageController extends Controller {

   public function index(){
        $pro=M('pro');
        $count=$pro->count();
        $Page= new Page($count,2);
        $Page->setConfig('first', '首页');
        $Page->setConfig('theme',"<ul></li><li>%FIRST%</li><li>%UP_PAGE%</li><li>%LINK_PAGE%</li><li>%DOWN_PAGE%</li><li>%END%</li><li><a> %HEADER%  %NOW_PAGE%/%TOTAL_PAGE% 页</a></ul>");
        $show= $Page->show();
        $list=$pro->limit($Page->firstRow.',',$Page->listRows)->select();

        $this->assign('list',$list);
        $this->assign('page',$show);
        $this->display();
    }

    public function btajax(){
        $this->display('btajax');
    }

    public function getajax(){
        $pro=M('pro');
        $name=I('post.name');
        $date=I('post.date');
        $state=I('post.state');
        if ($name) {
           $map['name'] = array('like',"%$name%" );
        }
        if ($date) {
           $map['date'] = array('like',"%$date%" );
        }
        if ($state) {
           $map['state'] = array('like',"%$state%" ); 
        }
        // $map['date'] = array('like', "'%'.$date.'%'");
        // $map['state'] = array('like', "'%'.$state.'%'");
        $list=$pro->where($map)->page($_POST['p'].',2')->select();
        $count=$pro->where($map)->count();
        $Page=new MyPage($count,2);
        $show=$Page->show();
        $data['list']=$list;
        $data['page']=$show;
        $this->ajaxReturn($data);
}

    public function bootjs(){
        $this->display('bootjs');
    }
}