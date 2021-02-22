<?php
/**
 * 登录
**/
$mod='blank';
include("../include/common.php");
$title='管理登录';
include './head.php';
?>
<nav class="navbar navbar-fixed-top navbar-default">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">导航按钮</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="./"><?php echo $sitename;?></a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="../"><span class="glyphicon glyphicon-home"></span> 返回首页</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="container" style="padding-top:70px;">
    <div class="col-xs-12 col-sm-10 col-lg-8 center-block" style="float: none;">
        <?php
            if(isset($_POST['user']) && isset($_POST['pass'])){
                $user=daddslashes($_POST['user']);
                $user_name=$user;
                $pass=daddslashes($_POST['pass']);
                $pass=md5($pass);
                $auth=$_POST['auth'];
                $row = $DB->get_row("SELECT * FROM black_admin WHERE user='$user' limit 1");
                if($row['user']=='') {
                    @header('Content-Type: text/html; charset=UTF-8');
                    exit("<script language='javascript'>alert('此用户不存在');history.go(-1);</script>");
                }elseif ($pass != $row['pass']) {
                    @header('Content-Type: text/html; charset=UTF-8');
                    exit("<script language='javascript'>alert('用户名或密码不正确！');history.go(-1);</script>");
                }elseif($row['user']==$user && $row['pass']==$pass){
                        $session=md5($user.$pass.$password_hash);
                        $token=authcode("{$user}\t{$session}", 'ENCODE', SYS_KEY);
                        setcookie("admin_token", $token, time() + 7200);
                        @header('Content-Type: text/html; charset=UTF-8');
                        exit("<script language='javascript'>alert('登陆后台成功！');window.location.href='./';</script>");
                        }
                }elseif(isset($_GET['logout'])){
                        setcookie("admin_token", "", time() - 7200);
                        @header('Content-Type: text/html; charset=UTF-8');
                        exit("<script language='javascript'>alert('您已成功注销本次登陆！');window.location.href='./login.php';</script>");
                }elseif($islogin==1){
                        exit("<script language='javascript'>alert('您已登陆！');window.location.href='./';</script>");
                        }
        ?>
        <div class="panel panel-primary">
            <div class="panel-heading"><h3 class="panel-title">管理登录</h3></div>
            <div class="panel-body">
                <form action="./login.php" method="post" class="form-horizontal" role="form">
                    <input type="hidden" name="backurl" value="<?php echo $_SERVER['HTTP_REFERER']; ?>"/>
                    <div class="input-group">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                        <input type="text" name="user" value="<?php echo @$_POST['user'];?>" class="form-control" placeholder="用户名" required="required"/>
                    </div>
                    <br/>
                    <div class="input-group">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                        <input type="password" name="pass" class="form-control" placeholder="密码" required="required"/>
                    </div>
                    <br/>
                    <div class="form-group">
                        <div class="col-xs-12"><input type="submit" value="登陆" class="btn btn-primary form-control"/></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>