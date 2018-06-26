<?php
/**
 * Created by PhpStorm.
 * User: 鹏
 * Date: 2018/1/18
 * Time: 16:05
 */
$passed=$_COOKIE["passed"];
if($passed!="true")
{
    echo "<script>alert('要先登录才能查看，你个瓜皮。');window.location.href='会员登录.html'</script>";
    //header("location:会员登录.html");
    exit();
}
else {
    require_once('../link.php');
    $account=$_POST["account"];
    $id = $_COOKIE{"name"};
    $password = $_POST["password"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $tel = $_POST["tel"];

    $sql = "update member set password='{$password}',name='{$name}',email='{$email}',tel='{$tel}' where account='{$account}'";
    $rst = mysqli_query($conn, $sql);
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="Content-Type" content="text/html" />
<title>注册成功5秒倒计时页面跳转</title>
<style type="text/css">


/*头部*/
.desc{
    font-size: 18px;
    line-height: 34px;
    border-left: 1px solid #ccc;
    position: absolute;
    left: 200px;
    top:35px;
    padding-left: 20px;
    font-weight:bold;
}
header{
    width:100%;
    height: 110px;
    box-shadow: 10px 10px 10px rgba(111,111,111,.5);
    position: relative;
}
header a img {
    width:200px;
	margin-left:100px;
	margin-top:10px;
	float:left;
	}
.title_pic{
    margin-top:10px;
	 margin-left:20px;
	 float:left;}



a,fieldset,img{
    border:0;
}
a{
    color:#221919;
    text-decoration:none;
	outline:none;
	}
a:hover{
    color:#3366cc;
    text-decoration:underline;
	}
body{
    font-size:24px;
	color:#B7AEB4;
	}
body a.link,body h1,body p{
    -webkit-transition:opacity 0.5s ease-in-out;
	-moz-transition:opacity 0.5s ease-in-out;
	transition:opacity 0.5s ease-in-out;
	}
#wrapper{
	text-align:center;
	margin:100px auto;
	width:594px;
	}
a.link{
    text-shadow:0px 1px 2px white;
	font-weight:600;
	color:#3366cc;opacity:0;
	}
h1{
    text-shadow:0px 1px 2px white;
	font-size:24px;
	opacity:0;
	}
p{
    text-shadow:0px 1px 2px white;
	font-weight:normal;
	font-weight:200;
	opacity:0;
	}
.fade{
    opacity:1;
}
@media only screen and (min-device-width:320px) and (max-device-width:480px){
    #wrapper{margin:40px auto;text-align:center;width:280px;}
}
</style>

<script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
<!--解决 IE6 背景缓存-->
<!--[if IE 6]><script type="text/javascript">document.execCommand("BackgroundImageCache", false, true);</script><![endif]-->

<script type="text/javascript">
    $(document).ready(function(){
        if (!$.browser.msie){
            $("img").addClass('fade').delay(800).queue(function(next){
                $("h1, p").addClass("fade");
                $("a.link").css("opacity", 1);
                next();
            });
        }else{
            $("img, h1, p").addClass('fade');
            $('a.link').css('opacity', 1);
        }
    });
</script>
</head>

<body>
<header>
	<!--<a href="#" class="logo"><img src="images/logo2.png"></a>
	<div class="title_pic"><img src="images/title.png"></div>--><!--这里可以放logo-->
</header>

    <div id="wrapper">
        <a href="#"><img src="images/bingo.png"></a>
        <div>
            <h1><?php echo $name ?>,恭喜你修改成功！</h1>
            <p>如果无法正常跳转<a style="color:#ff6600;" href="detail.php">请点击这里！</a></p>
            <a class="link" href="会员登录.html" onclick="history.go(-1)"><span id="sec">5</span> 秒后返回首页</a>
			<br /><br /><br />
			<a class="link" href="#">你随便跳吧跳哪儿都行= =</a>
        </div>
    </div>

	<script type="text/javascript">
    $(function () {
        setTimeout("lazyGo();", 1000);
    });
	function lazyGo() {
        var sec = $("#sec").text();
        $("#sec").text(--sec);
        if (sec > 0)
            setTimeout("lazyGo();", 1000);
        else
            window.location.href = "#";
    }
	</script>


</body>
</html>