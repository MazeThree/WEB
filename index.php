﻿<?php
  session_start();
  require_once('link.php');
  if($_SESSION['Name']==""){
    echo "<script>alert('未登录，请先登录');window.location.href='login.html'</script>";
  }
  ?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="renderer" content="webkit">
    <title>超市后台管理</title>
    <link rel="stylesheet" href="css/pintuer.css">
    <link rel="stylesheet" href="css/admin.css">
    <script src="js/jquery.js"></script>
    <script language="javascript" type="text/javascript">
        $(window).load(function() {
            $("#loader").fadeOut("slow");
        })
    </script>

</head>
<body style="background-color:#f2f9fd;">
<div id="loader"></div>
<div class="header bg-main">
  <div class="logo margin-big-left fadein-top">
    <h1><img src="images/y.jpg" class="radius-circle rotate-hover" height="50" alt="后台管理" />后台管理中心</h1>
  </div>
  <div class="head-l"><a class="button button-little bg-green" href="front/shopping.php" target="_blank"><span class="icon-home"></span> 前台首页</a> &nbsp;&nbsp;<a href="##" class="button button-little bg-blue"><span class="icon-wrench"></span> 清除缓存</a> &nbsp;&nbsp;<a class="button button-little bg-red" href="login.html"><span class="icon-power-off"></span> 退出登录</a>
  </div>
</div>
<div class="leftnav">
  <div class="leftnav-title"><strong><span class="icon-list"></span>菜单列表</strong></div>
  <h2><span class="icon-user"></span>基本设置</h2>
  <ul style="display:block">
      <li><a href="weclome.html" target="right"><span class="icon-caret-right"></span>超市信息</a></li>
    <li><a href="商品.html" target="right"><span class="icon-caret-right"></span>商品管理</a></li>
    <li><a href="member.php" target="right"><span class="icon-caret-right"></span>会员管理</a></li>
    <li><a href="im.php" target="right"><span class="icon-caret-right"></span>库存管理</a></li>
  </ul>   
  <h2><span class="icon-pencil-square-o"></span>信息查询</h2>
  <ul>
    <li><a href="商品查询.html" target="right"><span class="icon-caret-right"></span>商品查询</a></li>
    <li><a href="add.html" target="right"><span class="icon-caret-right"></span>会员信息</a></li>
    <li><a href="cate.html" target="right"><span class="icon-caret-right"></span>库存查询</a></li>
  </ul>
    <h2><span class="icon-pencil-square-o"></span>系统维护</h2>
    <ul>
        <li><a href="add.html" target="right"><span class="icon-caret-right"></span>基础信息管理</a></li>
        <li><a href="cate.html" target="right"><span class="icon-caret-right"></span>数据管理</a></li>
    </ul>
    <h2><span class="icon-key"></span><a href="admin.php" target="right"</span>管理员设置</a></h2>
    <ul>
        <li><a href="admin.php" target="right"><span class="icon-caret-right"></span>密码修改</a></li>
        <li><a href="cate.html" target="right"><span class="icon-caret-right"></span>。。。</a></li>
    </ul>
</div>
<script type="text/javascript">
$(function(){
  $(".leftnav h2").click(function(){
	  $(this).next().slideToggle(200);	
	  $(this).toggleClass("on"); 
  })
  $(".leftnav ul li a").click(function(){
	    $("#a_leader_txt").text($(this).text());
  		$(".leftnav ul li a").removeClass("on");
		$(this).addClass("on");
  })
});
</script>
<ul class="bread">
  <li><a href="{:U('Index/info')}" target="right" class="icon-home"> 首页</a></li>
  <li><a href="##" id="a_leader_txt">网站信息</a></li>
  <li><b>当前语言：</b><span style="color:red;">中文</php></span>
</li>
</ul>
<div class="admin">
  <iframe scrolling="auto" rameborder="0" src="weclome.php" name="right" width="100%" height="100%"></iframe>
</div>
</body>
</html>