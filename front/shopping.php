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
    <meta name="format-detection" content="telephone=no,email=no,adress=no"/>
    <meta name="keywords" content="个人网站，前端工程师，工作室，湖南理工学院，计算机科学"/>
    <meta name="description"  content="提供个人网页项目测试以及一些胡作非为的想法"/>
    <meta name="author" content="吴鹏,1849630277@qqmail.com"/>
    <title>个人网站</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet"  href="css/style.css" />
    <link rel="stylesheet"  href="css/reset.css" />
    <link rel="stylesheet"  href="../css/front.css" />
    <link rel="stylesheet"  href="css/public.css"/>
    <link rel="stylesheet"  href="css/shopping.css">


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
<div id="loader"></div>
<audio src="../bgm/Ramin Djawadi,Penguin Wang - Westworld (Piano Version).mp3"   autoplay="true" loop="true" hidden="true">
</audio>
<!--导航-->
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="shopping.php">xx网上销售平台</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="#">Logo<span class="sr-only">(current)</span></a></li>
                <li><a href="#">定位</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">搜索分类<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">百货</a></li>
                        <li><a href="#">食品</a></li>
                        <li><a href="#">服装、鞋靴</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">手机数码</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">图书乐器</a></li>
                    </ul>
                </li>
            </ul>
            <form class="navbar-form navbar-left">
                <div class="form-group">
                    <input type="text" class="form-control" maxlength="40" style="width: 350px;" placeholder="搜索功能暂未实现">
                </div>
                <input id="btn" type="submit" class="btn btn-default" onclick="duihua()" value="不能点"/>
            </form>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#content3" class="jump">我的收藏</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php
                        //如果账号登陆成功
                        //以上为登陆后台处理页面

                        //以下为index.php页面；
                        if(isset($_SESSION['name'])){

                            echo "至尊会员,",$_SESSION['name'];

                        }else{
                            echo     "登录|注册";
                        }
                        ?><span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a class="theme-login" href="javascript:;">登录</a>
                        </li>
                        <li><a href="../member/signin.html" >注册</a></li>
                        <li><a onclick="window.parent.location.href='../member/会员登录.html'" >登录不上？</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="../index.php">管理后台</a></li>
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>

<!--login-->
<div class="theme-popover">

    <div class="theme-poptit">

        <a href="javascript:;" title="关闭" class="close">×</a>

        <h3>登录 是一种态度</h3>

    </div>

    <div class="theme-popbod dform">
        <form class="theme-signin" name="loginform" action="../member/check.php" method="post">
            <ol>
                <li><strong>用户名：</strong><input class="ipt" type="text" name="account"  size="20" maxlength="10"autofocus="true" /></li>

                <li><strong>密码：</strong><input class="ipt" type="password" name="password"  size="20" maxlength="8" /></li>
                <li><input class="btn btn-primary" type="submit" name="submit" value=" 登 录 " /></li>
            </ol>
        </form>
    </div>
</div>
<div class="theme-popover-mask"></div>

<div class="nav1">
    <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="index.php">首页</a></li>
        <li role="presentation"><a href="home.php" target="maze">推荐</a></li>
        <li role="presentation"><a href="index.php" target="maze">排行榜</a></li>
        <li role="presentation"><a href="shopping_car.php" target="maze">我的购物车</a></li>
        <li role="presentation"><a href="订单提交.html" target="maze">我的订单</a></li>
        <li role="presentation"><a href="index.php" target="maze">客户服务</a></li>
        <li role="presentation"><a href="../member/password.php" target="maze">密码找回</a></li>
        <li role="presentation"><a href="home.php" target="maze">会员专享</a></li>
        <li role="presentation"><a href="home.php" target="maze">个人主页</a></li>
    </ul>
</div>

<!--主体-->
<iframe src="index.php" width="100%" name="maze" frameborder="0" scrolling="no" id="test" onload="this.height=100"></iframe>
<script type="text/javascript">
    function reinitIframe(){
        var iframe = document.getElementById("test");
        try{
            var bHeight = iframe.contentWindow.document.body.scrollHeight;
            var dHeight = iframe.contentWindow.document.documentElement.scrollHeight;
            var height = Math.max(bHeight, dHeight);
            iframe.height = height;
            console.log(height);
        }catch (ex){}
    }
    window.setInterval("reinitIframe()", 200);
</script>

<!--结尾信息-->
<div id="end" class="end"></div>
<!-- 底部 -->
<div class="promise_box">
    <div class="w">
        <ul>
            <li><img src="images/promise_img01.jpg"><span>不定期打烊</span></li>
            <li><img src="images/promise_img02.jpg"><span>拒不退换</span></li>
            <li><img src="images/promise_img03.jpg"><span>无担保交易</span></li>
            <li><img src="images/promise_img04.jpg"><span>拒不赔付</span></li>
            <li><img src="images/promise_img05.jpg"><span>不支持定制</span></li>
        </ul>
    </div>
</div>
<div class="bottom-links">
    <ul class="clearfix cols">
        <li class="col">
            <div class="bottom-links-title">关于我们</div>
            <ul class="clearfix bottom-links-items">
                <li><a href="#">招聘英才</a></li>
                <li><a href="#">公司简介</a></li>
                <li><a href="#">合作洽谈</a></li>
                <li><a href="#">联系我们</a></li>
            </ul>
        </li>
        <li class="col">
            <div class="bottom-links-title">客服中心</div>
            <ul class="clearfix bottom-links-items">
                <li><a href="#">收货地址</a></li>
                <li><a href="#">个人资料</a></li>
                <li><a href="#">修改密码</a></li>
            </ul>
        </li>
        <li class="col">
            <div class="bottom-links-title">售后服务</div>
            <ul class="clearfix bottom-links-items">
                <li><a href="#">退换货政策</a></li>
                <li><a href="#">退款说明</a></li>
                <li><a href="#">联系卖家</a></li>
            </ul>
        </li>
        <li class="col">
            <div class="bottom-links-title">帮助中心</div>
            <ul class="clearfix bottom-links-items">
                <li><a href="#">FAQ</a></li>
                <li><a href="#">积分兑换</a></li>
                <li><a href="#">积分细则</a></li>
                <li><a href="#">已购商品</a></li>
            </ul>
        </li>
        <li class="col">
            <div class="bottom-links-title">hinst公众号</div>
            <ul class="clearfix bottom-links-items">
                <li>
                    <img src="images/designer.jpg" />
                </li>
            </ul>
        </li>
        <li class="col">
            <div class="bottom-links-title">关注我们</div>
            <ul class="clearfix bottom-links-items">
                <li><img src="images/icon_sina.png" /><a href="#">新浪微博</a></li>
                <li><img src="images/icon_tencent.png" /><a href="#">腾讯微博</a></li>
                <li><img src="images/icon_dou.png" /><a href="#">豆瓣小站</a></li>
                <li><img src="images/icon_weixin.png" /><a href="#">官方微信</a></li>
            </ul>
        </li>

    </ul>
</div>
<div class="footer_v2013 bottom-about">
    <div class="w">
        <p class="foot_p1">
            <a href="#">首页</a>|<a href="#">招聘英才</a>|<a href="#">广告合作</a>|<a href="#">联系我们</a>|<a href="#">关于我们</a>
        </p>
        <pre>
    经营许可证：湖B2-20130223备案许可证：湖ICP备13041162号-1360网站安全检测平台
    ©2015-2019 湖南理工学院信科学院15级计科四班吴鹏   版权所有
                </pre>
    </div>
    <p>
        <a href="#"><img src="images/bottom_img01.png"></a>
        <a href="#"><img src="images/bottom_img02.png"></a>
        <a href="#"><img src="images/bottom_img03.png"></a>
        <a href="#"><img src="images/bottom_img04.png"></a>
        <a href="#"><img src="images/bottom_img05.png"></a>
        <a href="#"><img src="images/bottom_img06.png"></a>
        <a href="#"><img src="images/bottom_img07.png"></a>
        <a href="#"><img src="images/bottom_img08.png"></a>
        <a href="#"><img src="images/bottom_img09.png"></a>
    </p>
</div>
<!-- 底部 -->
<div class="fixed-buttons">
    <ul>
        <li><a href="javascript:void(0)" onclick="dashangToggle()" class="dashang fixed-weixin" title="打赏，支持一下"><img src="images/fixed_weixin.png" /></a></li>
        <li><img id="top" src="images/back_top.png" /></li>
</div>
<!--扫码弹窗-->
<div class="hide_box"></div>
<div class="shang_box">
    <a class="shang_close" href="javascript:void(0)" onclick="dashangToggle()" title="关闭"><img src="https://static.runoob.com/images/dashang/close.jpg" alt="取消" /></a>
    
    <div class="shang_tit">
        <p>感谢您的支持，我会继续努力的!</p>
    </div>
    <div class="shang_payimg">
        <img src="https://static.runoob.com/images/dashang/alipayimg.png" alt="扫码支持" title="扫一扫" />
    </div>
        <div class="pay_explain">扫码打赏，你说多少就多少</div>
    <div class="shang_payselect">
        <div class="pay_item checked" data-id="alipay">
            <span class="radiobox"></span>
            <span class="pay_logo"><img src="https://static.runoob.com/images/dashang/alipay.jpg" alt="支付宝" /></span>
        </div>
        <div class="pay_item" data-id="weipay">
            <span class="radiobox"></span>
            <span class="pay_logo"><img src="https://static.runoob.com/images/dashang/wechat.jpg" alt="微信" /></span>
        </div>
    </div>
    <div class="shang_info">
        <p>打开<span id="shang_pay_txt">支付宝</span>扫一扫，即可进行扫码打赏哦</p>
        <p>Powered by <a href="http://www.runoob.com" target="_blank" title="菜鸟教程">RUNOOB.COM</a>，学的不仅是技术，更是梦想！！！</p>
    </div>
</div>
</div>
<script type="text/javascript">

    $(function(){
        $("#top").click(function() {
            $("html,body").animate({scrollTop:0}, 500);
        });
    })

</script>
<script src="js/jquery-1.11.1.min.js" type="text/javascript"></script>
<script src="js/unslider.min.js" type="text/javascript"></script>
<script src="js/index.js" type="text/javascript"></script>
<!-- jQuery (mod/necessary for Bootstrap's JavaScript plugins) -->
<script src="https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>