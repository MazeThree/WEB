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
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet"  href="css/style.css" />
    <link rel="stylesheet"  href="css/reset.css" />
    <link rel="stylesheet"  href="../css/front.css" />
    <link rel="stylesheet"  href="css/public.css"/>


    <script  src="js/jquery.js"></script>
    <script src="js/main.js"></script>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://cdn.bootcss.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!--页面加载事件-->
    <script  type="text/javascript">
        $(window).load(function() {
            $("#loader").fadeOut("slow");
        })
    </script>
</head>
<body>

<!--头部信息-->
<div class="header">
    <div id="myCarousel" class="carousel slide"  data-ride="carousel" data-interval="4000">
        <!-- 轮播（Carousel）指标 -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
        <!-- 轮播（Carousel）项目 -->
        <div class="carousel-inner">
            <div class="item active one">
                <div class="pic">
                    <a  href="home.php" title="点击头像发现更多精彩"></a>
                </div>
                <div class="jumbotron">
                    <h1>网上销售系统</h1>
                    <h2>Create by Maze</h2>
                    <h3>纯个人开发，进度较慢，绝大数功能正在完善中。。。</h3>
                </div>
            </div>
            <div class="item two">
                <h2>Bridge To Terabithia片选</h2>
                <p>我的是我缓慢地往前移动，向着这个狂野 美丽而又神秘的世界。</p>
                <br>
                <p>在寂静中潜游， 用我的呼吸声打破这片寂静。在我的上面，只有微亮的光，而那正是我来的地方，也正是我结束了这段旅行要回去的地方。</p>
                <br>
                <p>我正在潜水。我是个潜水员。我要潜向海的深处，穿过那些褶皱的石头 和那些深色的水草，潜向那片深蓝，潜向那些正等着我的深色的鱼</p>
                <br>
                <p>我就这样向那些正等着我的深色的鱼。</p>
                <br>
                <p>我就这样游着，小水泡从我嘴里鱼贯而出，它们晃悠悠地上升，像小水母一样。 </p>
                <br>
                <p>可是我得回去了。我没有足够的时间看清所有的东西，而正是这个原因，这段旅行才显得如此特别。</p>
            </div>
            <div class="item three">
                <h1>balabalabalalalal</h1>
                <img src="images/u=3874782318,2929085832&fm=23&gp=0.jpg" alt="Third slide">
            </div>
        </div>
        <!-- 轮播（Carousel）导航 -->
        <a class="carousel-control left" href="#myCarousel"
           data-slide="prev">&lsaquo;
        </a>
        <a class="carousel-control right" href="#myCarousel"
           data-slide="next">&rsaquo;
        </a>
    </div>
</div>
<!--轮播下的导航条-->
<div class="nav2">
    <ul class="nav nav-pills">
        <li role="presentation" class="active"><a href="#">手机数码</a></li>
        <li role="presentation"><a href="#">百货</a></li>
        <li role="presentation"><a href="#">服装、鞋靴</a></li>
        <li role="presentation"><a href="#">食品</a></li>
        <li role="presentation"><a href="#">图书乐器</a></li>
    </ul>
</div>

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

<!--图片1-->
<div class="row content2">
    <!--
    <div class="col-xs-6 col-md-3">
        <div class="thumbnail">
            <img src="..." alt="...">
            <div class="caption">
                <h3>Thumbnail label</h3>
                <p>...</p>
                <p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
            </div>
        </div>
    </div>-->
    <?php
    require_once('../link.php');//连接数据库

    //选择产品数据
    $sql="select * from product_list";
    $rst=mysqli_query($conn,$sql);

    $total_records=mysqli_num_rows($rst);

    //列出所有产品数据
    for($i=0;$i<$total_records;$i++)
    {
        //获取产品数据
        $row=mysqli_fetch_assoc($rst);

        //技术有限，暂时无法用表单提交，换a标签
        //换种方式，不做表格提交
        echo "<form method='post' action='add_to_car.php?id=".$row["t_id"]."&name=".urldecode($row["t_name"])."&price=".$row["price"]."'>";

        echo "<div class='col-xs-6 col-md-3'>";
        echo "<div class='thumbnail'>";
        echo "<a href='details.php?id=".$row["t_id"]."' alt='查看详情' >";
        echo "<img src='".$row["pic"]."'alt='查看详情'>";
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

    }
    //释放内存
    mysqli_free_result($rst);
    mysqli_close($conn);
    ?>
</div>

<!--内容3-->
<div id="content3" class="content3">
    <h2>更多商品</h2>
    <div id="bigbox">
    </div>
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>