<?php
/**
 * 黑名单列表
**/
$mod='blank';
include("../include/common.php");
$title='黑名单列表';
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
        <?php
        if(isset($_GET['qq'])) {
            $sql=($_GET['method']==1)?" `qq` LIKE '%{$_GET['qq']}%'":" `qq`='{$_GET['qq']}'";
            $gls=$DB->count("SELECT count(*) from black_list WHERE{$sql}");
            $con='QQ '.$_GET['qq'].' 共有 <b>'.$gls.'</b> 个黑名单用户';
            }else{
                $gls=$DB->count("SELECT count(*) from black_list WHERE 1");
                $sql=" 1";
                $con='黑名单后台共有 <b>'.$gls.'</b> 个黑名单用户';
                }
                $pagesize=30;
                if (!isset($_GET['page'])) {
                    $page = 1;
                    $pageu = $page - 1;
                    } else {
                        $page = $_GET['page'];
                        $pageu = ($page - 1) * $pagesize;
                        }
                        echo $con;
        ?>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead><tr><th>ID</th><th>ＱＱ</th><th>添加时间</th><th>黑名单等级</th><th>操作</th></tr></thead>
                <tbody>
                    <?php
                    $rs=$DB->query("SELECT * FROM black_list WHERE{$sql} order by id desc limit $pageu,$pagesize");
                    while($res = $DB->fetch($rs))
                    {
                        echo '<tr><td>'.$res['id'].'</td><td>'.$res['qq'].'</td><td>'.$res['date'].'</td><td>'.$res['level'].'级</td><td><a href="./edit.php?my=update&id='.$res['id'].'" class="btn btn-xs btn-info">修改</a> <a href="./edit.php?my=del&id='.$res['id'].'" class="btn btn-xs btn-danger" onclick="return confirm(\'你确实要解除这个黑名单用户吗？\');">删除</a></td></tr>';
                        }
                    ?>
                </tbody>
            </table>
        </div>
        <?php
        echo'<ul class="pagination">';
        $s = ceil($gls / $pagesize);
        $first=1;
        $prev=$page-1;
        $next=$page+1;
        $last=$s;
        if ($page>1)
        {
        echo '<li><a href="list.php?page='.$first.$link.'">首页</a></li>';
        echo '<li><a href="list.php?page='.$prev.$link.'">&laquo;</a></li>';
        } else {
        echo '<li class="disabled"><a>首页</a></li>';
        echo '<li class="disabled"><a>&laquo;</a></li>';
        }
        for ($i=1;$i<$page;$i++)
        echo '<li><a href="list.php?page='.$i.$link.'">'.$i .'</a></li>';
        echo '<li class="disabled"><a>'.$page.'</a></li>';
        for ($i=$page+1;$i<=$s;$i++)
        echo '<li><a href="list.php?page='.$i.$link.'">'.$i .'</a></li>';
        echo '';
        if ($page<$s)
        {
        echo '<li><a href="list.php?page='.$next.$link.'">&raquo;</a></li>';
        echo '<li><a href="list.php?page='.$last.$link.'">尾页</a></li>';
        } else {
        echo '<li class="disabled"><a>&raquo;</a></li>';
        echo '<li class="disabled"><a>尾页</a></li>';
        }
        echo'</ul>';
        #分页
        ?>
    </div>
</div>