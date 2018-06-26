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
<body style="background: #eff3f5">
<div id="loader"></div>
<!--头部固定导航-->
<div>
<div class="head head_1">
    <div id="logo"><a href="#"><img src="../images/logo.png" alt="Maze"></a></div>
    <div class="input-group">
        <div class="input-group-btn">
            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">全部<span class="caret"></span></button>
            <ul class="dropdown-menu">
                <li><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
            </ul>
        </div><!-- /btn-group -->
        <input type="text" class="form-control" aria-label="...">
        <div class="input-group-btn">
            <button class="btn btn-default" type="button">Go!</button>
        </div>
    </div><!-- /input-group -->
    <div class="head_right">
        <ol class="breadcrumb">
            <li><a href="catalog.php">购物车</a></li>
            <li><a href="#">Library</a></li>
            <li class="active">Data</li>
        </ol>
    </div>
</div><!-- /.row -->
<div class="head head_2">
    <div class="head_nav">
    <ul class="nav nav-pills">
        <li role="presentation" class="active"><a href="#">Home</a></li>
        <li role="presentation"><a href="#">Profile</a></li>
        <li role="presentation"><a href="#">Messages</a></li>
        <li role="presentation"><a href="#">Profile</a></li>
        <li role="presentation"><a href="#">Messages</a></li>
        <li role="presentation"><a href="#">Profile</a></li>
        <li role="presentation"><a href="#">Messages</a></li>
    </ul>
    </div>
</div>
</div>
<!--轮播图-->
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
                <h1>Maze</h1>
                <img id="little" src="../images/1.jpg" alt="Second slide">
            </div>
            <div class="item two">
                <h1>等加个音乐播放器</h1>
                <img id="little" src="../images/1.jpg" alt="Second slide">
            </div>
            <div class="item three">
                <h1>balabalabalalalal</h1>
                <img src="../images/1.jpg" alt="Third slide">
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
<!--主体-->
<div style="width: auto; height: 2000px;">
    <iframe src="catalog.php" width="100%" height="100%" frameborder="0" scrolling="no"></iframe>
</div>
<!-- Navigation -->


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="../js/bootstrap.min.js"></script>
</body>
</html>
