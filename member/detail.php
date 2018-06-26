<?php
/**
 * Created by PhpStorm.
 * User: 鹏
 * Date: 2018/1/17
 * Time: 19:09
 */
$passed=$_COOKIE["passed"];

if($passed!="true")
{
    echo "<script>alert('要先登录才能查看，你个瓜皮。');window.location.href='会员登录.html'</script>";
    //header("location:会员登录.html");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en-us">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=Edge，chrome=1"/>
    <meta content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=no" name="viewport"/>
    <meta name="format-detection" content="telephone=no,email=no,adress=no"/>
    <meta name="keywords" content="个人网站，前端工程师，工作室，湖南理工学院，计算机科学"/>
    <meta name="description"  content="提供个人网页项目测试以及一些胡作非为的想法"/>
    <meta name="author" content="吴鹏,1849630277@qqmail.com"/>
    <title>个人网站</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
    <link rel="stylesheet"  href="../css/style.css" />
    <link rel="stylesheet"  href="../css/reset.css" />
    <script  src="../js/jquery.js"></script>
    <script src="../js/main.js"></script>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://cdn.bootcss.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div class="pic">
    <a  href="#" title="点击头像发现更多精彩"></a>
</div>
<div class="jumbotron">
    <h1>Maze</h1>
    <h2>abc</h2>
</div>
<ul class="nav nav-pills">
    <li role="presentation"><a href="modify.php">修改账户信息</a></li>
    <li role="presentation"><a href="delete.php">删除用户</a></li>

</ul>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="../js/bootstrap.min.js"></script>
</body>
</html>