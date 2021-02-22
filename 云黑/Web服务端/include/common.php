<?php
//error_reporting(E_ALL); ini_set("display_errors", 1);
error_reporting(0);
define('IN_CRONLITE', true);
define('ROOT', dirname(__FILE__).'/');
define('SYS_KEY', 'blackqq348069510');

date_default_timezone_set("PRC");
$date = date("Y-m-d H:i:s");
session_start();

require ROOT.'../config.php';

$scriptpath=str_replace('\\','/',$_SERVER['SCRIPT_NAME']);
$sitepath = substr($scriptpath, 0, strrpos($scriptpath, '/'));
$siteurl = ($_SERVER['SERVER_PORT'] == '443' ? 'https://' : 'http://').$_SERVER['HTTP_HOST'].$sitepath.'/';

if(!isset($port))$port='3306';
//连接数据库
include_once(ROOT."db.class.php");
$DB=new DB($host,$user,$pwd,$dbname,$port);

$password_hash='!@#%!s?';
include ROOT."function.php";
include ROOT."member.php";
$keywords=selectconfig("keywords");
$description=selectconfig("description");
$sitename=selectconfig("sitename");
?>