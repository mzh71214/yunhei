<?php
/**
 * 搜索
**/
$mod='blank';
include("../include/common.php");
$title='搜索';
include './head.php';
if($islogin==1){}else exit("<script language='javascript'>window.location.href='./login.php';</script>");
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
                    <a href="./"><span class="glyphicon glyphicon-user"></span> 后台首页</a>
                </li>
                <li class="active">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <span class="glyphicon glyphicon-pushpin"></span> 黑名单管理
                        <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="./add.php">添加黑名单</a><li>
                        <li><a href="./list.php">黑名单列表</a></li>
                        <li><a href="./search.php">搜索黑名单</a><li>
                    </ul>
                </li>
                <li>
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <span class="glyphicon glyphicon-cog"></span> 系统管理
                        <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="./siteset.php">SEO设置</a><li>
                        <li><a href="./passwd.php">修改密码</a></li>
                    </ul>
                </li>
                <li><a href="./login.php?logout"><span class="glyphicon glyphicon-off"></span> 退出</a></li>
            </ul>
        </div>
    </div>
</nav>
<div class="container" style="padding-top:70px;">
    <div class="col-xs-12 col-sm-10 col-lg-8 center-block" style="float: none;">
        <div class="panel panel-primary">
            <div class="panel-heading"><h3 class="panel-title">搜索</h3></div>
            <div class="panel-body">
                <form action="./list.php" method="get" class="form-inline" role="form">
                    <div class="form-group">
                        <label>类别</label>
                        <select class="form-control">
                            <option value="1">ＱＱ</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>内容</label>
                        <input type="text" name="qq" value="" class="form-control" autocomplete="off" required/>
                    </div>
                    <div class="form-group">
                        <select name="method" class="form-control">
                            <option value="0">精确搜索</option>
                            <option value="1">模糊搜索</option>
                        </select>
                    </div>
                    <input type="submit" value="查询" class="btn btn-primary form-control"/>
                </form>
            </div>
        </div>
    </div>
</div>