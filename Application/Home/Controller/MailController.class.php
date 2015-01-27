<?php
namespace Home\Controller;
use Think\Controller;

class MailController extends Controller{
    public function index() {
       $this->display() ;
    }

    public function sendMail() {
        $send['to']=I('post.mailto','','email');
        $send['subject']=I('post.subject');
        $send['content']=I('post.content');
        $rs=R('Swift/send',$send);
        if ($rs=='success') {
        	$this->success('发送成功');
        }else{
            $this->error('发送成功');
        }
    }
}