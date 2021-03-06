<?php
/**
 * @param string $pwd
 * @param string $salt
 * @return string
 */
function createPwd($pwd,$salt) {
    $newPwd=md5(md5($pwd).$salt);

    return $newPwd;

}

function mysalt() {
    $salt=substr(implode('', shuffle(array_merge(range('a', 'z'),range('A', 'Z'),range(1, 9)))), 1,8);
    return $salt;
}
/**
 * @param int $uid
 * @param string $name
 * @param string $salt
 * @return string
 */
function salt_code($uid,$name,$salt) {
    $salt_code=md5(md5($uid.$name).$salt);
    return $salt_code;
}

/**
 * Warning提示信息
 * @param string $type 提示类型 默认支持success, error, info
 * @param string $msg 提示信息
 * @param string $url 跳转的URL地址
 * @return void
 */
function alert($type='info', $msg='', $url='') {
    //多行URL地址支持
    $url        = str_replace(array("\n", "\r"), '', $url);
	$alert = unserialize(stripslashes(cookie('alert')));
    if (!empty($msg)) {
        $alert[$type][] = $msg;
		cookie('alert', serialize($alert));
	}
    if (!empty($url)) {
		if (!headers_sent()) {
			// redirect
			header('Location: ' . $url);
			exit();
		} else {
			$str    = "<meta http-equiv='Refresh' content='0;URL={$url}'>";
			exit($str);
		}
	}

	return $alert;
}

function parseAlert() {
	$alert = unserialize(stripslashes(cookie('alert')));
	cookie('alert', null);

	return $alert;
}

function jqGirdToSql($param) {
    $op=array(
        'cn'=>"like '%%'",//包含
    );
}
// function getTree(&$data,$pid = 0,$count = 0) {
//         if(!isset($data['odl'])){
//                 $data=array('new'=>array(),'odl'=>$data);
//             }
//             foreach ($data['odl'] as $k => $v){
//                     if($v['Pid']==$pid){
//                             $v['Count'] = $count;
//                             $data['new'][]=$v;
//                             unset($data['odl'][$k]);
//                             getTree($data,$v['Id'],$count+1);
//                         } 
//                     }
//                     return $data['new'] ;
// }



