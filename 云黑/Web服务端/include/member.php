<?php
if(!defined('IN_CRONLITE'))exit();

$my=isset($_GET['my'])?$_GET['my']:null;
if(isset($_GET['hj']))exit(hj());

$clientip=$_SERVER['REMOTE_ADDR'];

if(isset($_COOKIE["admin_token"]))
{
	$token=authcode(daddslashes($_COOKIE['admin_token']), 'DECODE', SYS_KEY);
	list($user, $sid) = explode("\t", $token);
	$udata = $DB->get_row("SELECT * FROM black_admin WHERE user='$user' limit 1");
	$session=md5($udata['user'].$udata['pass'].$password_hash);
	if($session==$sid) {
		$DB->query("UPDATE black_admin SET last='$date',dlip='$clientip' WHERE user = '$user'");
		$islogin=1;
		if($udata['active']==0){
			@header('Content-Type: text/html; charset=UTF-8');
			exit('您的账号已被封禁！');
		}
	}
}
?>