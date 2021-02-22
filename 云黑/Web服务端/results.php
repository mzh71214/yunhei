<?php
include("./include/common.php");
if(!isset($_GET['qq'])) {
	header("Location: http://".$_SERVER['SERVER_NAME']);
}else{
	$qq=$_GET['qq'];
?>
<!DOCTYPE html>
<html lang="zh-cn">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="format-detection" content="telephone=no">
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <meta name="apple-mobile-web-app-status-bar-style" content="black" />
        <title><?php echo $sitename;?></title>
        <meta name="keywords" content="<?php echo $keywords;?>"/>
        <meta name="description" content="<?php echo $description;?>"/>
        <link href="//cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.css" rel="stylesheet">
        <script src="//cdn.bootcss.com/jquery/3.1.1/jquery.min.js"></script>
        <script src="//cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <!--[if lt IE 9]>
        <script src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        <style>
            body{
                margin: 0 auto;
                text-align: center;
            }
            .container {
                max-width: 580px;
                padding: 15px;
                margin: 0 auto;
            }
        </style>
    </head>

    <body background="./images/bj.png">
        <div class="container">
            <div class="header">
                <ul class="nav nav-pills pull-right" role="tablist">
                    <li role="presentation" class="active">
                        <a href="./">
                            <span class="glyphicon glyphicon-erase"></span> 继续查询
                        </a>
                    </li>
                </ul>
                <h3 class="text-muted" align="left"><font color="#8968CD"><?php echo $sitename?></font></h3>
            </div>
            <hr>
            <div class="panel panel-primary">
                <div class="panel-heading"><h3 class="panel-title">公告栏</h3></div>
                <ul class="list-group">
                    <li class="list-group-item">举报骗子请联系QQ 1819158965，或者发送邮件至1819158965@qq.com </li>
                    <li class="list-group-item">网络骗子多，套路深，交易需小心</li>
                    <li class="list-group-item">黑名单等级分为 1-低、2-中、3-高</li>
                    <li class="list-group-item"><span class="glyphicon glyphicon-time"></span> <b>现在时间：</b> <?=$date?></li>
                </ul>
            </div>
            <h3 class="form-signin-heading">查询结果</h3>
                <p style="text-align:left">
                    <?php
                        $row=$DB->get_row("SELECT * FROM black_list WHERE qq='$qq' limit 1");
                        echo '<label>查询QQ：'.$qq.'</label><br>';
                        if($row) {
                        echo '
                        <label>黑名单级别：</label>
                        <font color="blue">'.$row['level'].'级</font><br>
                        <label>黑名单时间：</label>
                        <font color="blue">'.$row['date'].'</font><br>
                        <label>黑名单原因：</label>
                        <font color="blue">'.$row['note'].'</font><br>
                        <label><font color="red">请停止任何交易！</font></label>';
                    ?>
                    <?php
                        }else{
                            echo '<label><font color="green">该QQ尚未被录入，但不能代表此QQ是绝对安全！！</font></label>';
                            }
                        }
                        $DB->close();
                    ?>
                </p>
                <hr>
                <div class="container-fluid">
                    <a href="http://wpa.qq.com/msgrd?v=3&uin=1819158965&site=qq&menu=yes" target="_blank" class="btn btn-default btn-sm">
                        <span class="glyphicon glyphicon-erase"></span> 申诉
                    </a>
                </div>
                <p style="text-align:center">
                    <br>
                    <label>友情链接：</label>
                    <a href="https://mz.toolcat.cn/" target="_blank">工具喵秒赞 </a>
                    <label>|</label>
                    <a href="http://dg.toolcat.cn/" target="_blank">QQ代挂网 </a>
                    <label>|</label>
                    <a href="https://qr.toolcat.cn/" target="_blank">三合一收款码 </a>
                </p>
        </div>
    </body>
</html>