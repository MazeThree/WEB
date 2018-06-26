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
else{
    require_once('../link.php');
    //对应detail.php对应set的name
    $id=$_COOKIE{"name"};

    $sql="select * from member where name='{$id}'";
    $rst=mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($rst);
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
    <title>个人资料</title>
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
<form method="post" action="update.php" class="form-horizontal">
    <div class="form-group">
        <label for="disabledTextInput" class="col-sm-2 control-label">用户账号</label>
        <div class="col-sm-4">
        <input type="text" id="disabledTextInput" name="account" class="form-control" placeholder="Disabled input"  value="<?php echo $row{"account"}?>" readonly>
        </div>
    </div>
    <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
        <div class="col-sm-4">
            <input type="password" class="form-control" name="password" id="inputPassword3" placeholder="Password" value="<?php echo $row{"password"}?>">
        </div>
    </div>
    <div class="form-group">
        <label for="inputPassword" class="col-sm-2 control-label">确认密码</label>
        <div class="col-sm-4">
            <input type="password" class="form-control" id="inputPassword" placeholder="Password" value="<?php echo $row{"password"}?>">
        </div>
    </div>
    <div class="form-group">
        <label for="name" class="col-sm-2 control-label">用户名</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" id="name" name="name" placeholder="name" value="<?php echo $row{"name"}?>">
        </div>
    </div>
    <div class="form-group">
        <label for="email" class="col-sm-2 control-label">邮箱</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" id="email" name="email" placeholder="email" size="30" value="<?php echo $row{"email"}?>">
        </div>
    </div>
    <div class="form-group">
        <label for="tel" class="col-sm-2 control-label">电话</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" id="tel" name="tel" placeholder="ps:12505" value="<?php echo $row{"tel"}?>">
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="reset" class="btn btn-default ">清空</button>
        </div>
    </div>
</form>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="../js/bootstrap.min.js"></script>
</body>
</html>
