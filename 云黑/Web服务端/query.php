<?php
include("./include/common.php");
?>
<?php
{@$qq=$_GET["qq"];
if ($qq==""){echo "请输入请要查询的QQ";}

    else {
		$row=$DB->get_row("SELECT * FROM black_list WHERE qq='$qq' limit 1");
	echo '查询QQ：'.$qq.'<br>';
	if($row) {
		echo '黑名单级别：'.$row['level'].'级<br>黑名单时间：'.$row['date'].'<br>黑名单原因：'.$row['note'].'';
?>
<?php
	}else{
		echo '该QQ未在云端黑名单中<br>但是我们不能保证交易绝对安全';
	}	
}
}
$DB->close();
?>