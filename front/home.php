<?php
session_start();
require_once('../link.php');
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
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet"  href="css/reset.css" />
    <link rel="stylesheet"  href="../css/front.css" />

    <script  src="js/jquery.js"></script>
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
<div id="loader"></div>
<div class="home-body1">
    <h3>个人主页</h3>
    <div class="pic1">
        <a href="" title="更换头像"></a>
    </div>
    <h3><?php
        //如果账号登陆成功
        //以上为登陆后台处理页面

        //以下为index.php页面；
        if(isset($_SESSION['name'])){

            echo "至尊会员,",$_SESSION['name'];

        }else{
            echo     "暂未登录";
        }
        ?></h3>
    <button type="button" class="btn btn-primary" onclick="window.location.href='../member/modify.php'">修改个人资料</button>
    <button type="button" class="btn btn-success">我的购物车</button>
    <button type="button" class="btn btn-info">个人收藏</button>
    <button type="button" class="btn btn-info" onclick="window.location.href='../member/delete.php'">删除用户</button>
</div>
<div class="home-body2">
            <div class="container">
                <div class="row">
                    <div class="col-md-9">
                        <div class="tab" role="tabpanel">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active"><a href="#Section1" aria-controls="home" role="tab" data-toggle="tab"><span class="glyphicon glyphicon-search" aria-hidden="true">SECTION-1</span></a></li>
                                <li role="presentation"><a href="#Section2" aria-controls="profile" role="tab" data-toggle="tab"><span class="glyphicon glyphicon-search" aria-hidden="true">SECTION-2</span></a></li>
                                <li role="presentation"><a href="#Section3" aria-controls="messages" role="tab" data-toggle="tab"><span class="glyphicon glyphicon-search" aria-hidden="true">SECTION-3</span></a></li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content tabs">
                                <div role="tabpanel" class="tab-pane fade in active" id="Section1">
                                    <h3>Section 1</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras nec urna aliquam, ornare eros vel, malesuada lorem. Nullam faucibus lorem at eros consectetur lobortis. Maecenas nec nibh congue, placerat sem id, rutrum velit. Phasellus porta enim at facilisis condimentum. Maecenas pharetra dolor vel elit tempor pellentesque sed sed eros. Aenean vitae mauris tincidunt, imperdiet orci semper, rhoncus ligula. Vivamus scelerisque.</p>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="Section2">
                                    <h3>Section 2</h3>
                                    <p>Lorem </p>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="Section3">
                                    <h3>Section 3</h3>
                                    <p>Lorem ipsum</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>