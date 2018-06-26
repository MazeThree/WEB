<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/4/29
 * Time: 20:49
 */
   $id=$_GET["id"];
   require_once('../link.php');//连接数据库
   //选择产品数据
   $sql="select * from product_list where t_id='{$id}'";
   $rst=mysqli_query($conn,$sql);
if ($rst->num_rows > 0) {
    // 输出数据
    while($row=mysqli_fetch_assoc($rst)) {
        $name=$row["t_name"];
        $price=$row["price"];
        $quantity=$row["quantity"];
        $pic=$row["pic"];
        $desc=$row["t_desc"];
    }
} else {
    echo "<script>alert('查询错误！请重新选择查询信息');window.location.href='catalog.php'</script>";
    //echo "邮箱或账户不匹配，请重新输入";
}
?>
<!DOCTYPE html>
<html lang="en-us">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=Edge，chrome=1"/>
    <meta content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=no" name="viewport"/>
    <meta name="format-detection" content="telephone=no,email=no,address=no"/>
    <meta name="keywords" content="个人网站，前端工程师，php工程师，湖南理工学院，计算机科学"/>
    <meta name="description"  content="提供个人网页项目测试以及一些胡作非为的想法"/>
    <meta name="author" content="吴鹏,1849630277@qqmail.com"/>
    <title>前台界面</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
    <link rel="stylesheet"  href="../css/normalize.css" />
    <link rel="stylesheet"  href="../css/front.css" />

    <link rel="stylesheet"  href="front.css" />

    <script  src="../js/jquery.js"></script>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <![endif]-->
    <!--页面加载事件-->
    <script  type="text/javascript">
        $(window).load(function() {
            $("#loader").fadeOut("slow");
        })
    </script>
</head>
<body>
<!--    显示当前系统时间-->
<h3><p id="demo"></p>
    <script>
        var myVar=setInterval(function(){myTimer()},1000);
        function myTimer() {
            var d = new Date();
            document.getElementById("demo").innerHTML = d.toLocaleTimeString();
        }
    </script>
</h3>
<!--轮播下的导航条-->
<div>
    <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li><a href="#">Library</a></li>
        <li class="active">Data</li>
    </ol>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-5">
            <img src="<?php echo $pic?>" alt="">
        </div>
        <div class="col-md-7">
            <h3>商品名：<?php echo $name?></h3>
            原价：<del>888</del>
            <?php
            require_once('../link.php');//连接数据库

            //选择产品数据
            $sql="select * from product_list where t_id='{$id}'";
            $rst=mysqli_query($conn,$sql);

            $total_records=mysqli_num_rows($rst);

            //列出所有产品数据

                //获取产品数据
                $row=mysqli_fetch_assoc($rst);

                //技术有限，暂时无法用表单提交，换a标签
                //换种方式，不做表格提交
                echo "<form method='post' action='add_to_car.php?id=".$row["t_id"]."&name=".urldecode($row["t_name"])."&price=".$row["price"]."'>";

                echo "<div class='col-xs-6 col-md-3'>";
                echo "<div class='thumbnail'>";
                echo "<a href='details.php?id=".$row["t_id"]."' alt='查看详情' >";
                echo "<img src='".$row["pic"]."'>";
                echo "</a>";
                echo "<div class='caption'>";
                echo "<h3>".$row["t_name"]."</h3>";
                echo "<p>库存".$row["quantity"]."</p>";
                echo "<p>$".$row["price"]."</p>";
                echo "<p>购买数量:  <input type='text' name='quantity' size='5' value='1'></p>";
                //a标签数量传不过去
                echo "<p><input type='submit' value='加购物车'></p>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
                echo "</form>";

            //释放内存
            mysqli_free_result($rst);
            mysqli_close($conn);
            ?>
        </div>
    </div>
    <div>
        <!-- Nav tabs -->
        <ul id="myTab" class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">商品详情</a></li>
            <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">评论</a></li>
            <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">服务</a></li>
        </ul>

        <!-- Tab panes -->
        <div id="myTabContent" class="tab-content">
            <div role="tabpanel" class="tab-pane fade in active" id="home">
                <p class="lead"><?php echo $desc?></p>
            </div>
            <div role="tabpanel" class="tab-pane fade" id="profile">开发比较懒，功能完善中</div>
            <div role="tabpanel" class="tab-pane fade" id="messages">开发比较懒，功能完善中</div>

        </div>
    </div>

</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="../js/bootstrap.min.js"></script>
</body>
</html>
