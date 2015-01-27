<?php
namespace Home\Controller;

use Think\Controller;

Vendor('Swift.swift_required');

class SwiftController extends Controller{
        public  function send($to_emails, $subject, $content,$annex) {
            try{
                $smtp = new \Swift_SmtpTransport(C('MAIL.EMAIL_HOST'));
                $smtp->setUsername(C('MAIL.EMAIL_USER'));
                $smtp->setPassword(C('MAIL.EMAIL_PWD'));
                $mailer = new \Swift_Mailer($smtp);
                $swiftmsg= new \Swift_Message();
                $message = $swiftmsg->newInstance($subject, $content,"text/html","utf-8");
                $message->setFrom(array(C('MAIL.EMAIL_USER') => C('MAIL.EMAIL_NAME')));
                $message->setTo($to_emails);
                if($annex) {
                    $message->attach(Swift_Attachment::fromPath($annex['name'], $annex['type'])->setFilename($annex['to_name'])); //这里是附件
                }
                $mailer->send($message);
                $ms = "success";
            }catch(Exception $e){
                echo $e;
                $ms = "fail";
            }
            return $ms;
    }


            public function jihuo(){
                    if (isset($_GET['id']) && isset($_GET['salt'])){
                            $id = intval($_GET['id']);
                            $model = new Model('User');
                            $userInfo = $model->find($id);
                            if ($userInfo){

                                    $salt = md5($id.md5(md5($userInfo['username']).md5($userInfo['email'])));

                                    if ($salt==$_GET['salt']){
                                            $model->where("id = $id ")->save(array('status'=>1));
                                            die('激活成功!');
                                            //执行激活
                                    }else{
                                            die('url error!2');
                                    }

                            }else{
                                    die('url error!1');
                            }

                    }else{
                            die('url error!0');
                    }
            }
}