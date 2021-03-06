<?php
session_start();
require_once('link.php');
if($_SESSION['Name']==""){
    echo "<script>alert('未登录，请先登录');window.location.href='login.html'</script>";
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
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet"  href="css/style.css" />
    <link rel="stylesheet"  href="css/normalize.css" />
    <script  src="js/jquery.js"></script>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://cdn.bootcss.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div class="table-responsive">
    <table class="table table-striped table-hover">
      <tr>
          <td>序号</td>
          <td>账户</td>
          <td>用户名</td>
          <td>邮箱</td>
          <td>电话</td>
          <td>操作</td>
      </tr>
        <?php
        require_once('link.php');//连接数据库
        $sql="select * from member";
        $rst=mysqli_query($conn,$sql);
        //计算数目
        $total_records=mysqli_num_rows($rst);

        //列出所有数据
        for($i=0;$i<$total_records;$i++)
        {
            //获取数据
            $row=mysqli_fetch_assoc($rst);

            //显示详细数据
            echo "<tr>";
            echo "<td>".$row["account"]."</td>";
            echo "<td>".$row["name"]."</td>";
            echo "<td>".$row["email"]."</td>";
            echo "<td>".$row["tel"]."</td>";
            echo "<td><button type=\"button\" class=\"btn btn-primary\">修改</button><button type=\"button\" class=\"btn btn-danger\">删除</button></td>";
            echo "</tr>";
        }
        mysqli_free_result($rst);

        mysqli_close($conn);
        ?>
    </table>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>