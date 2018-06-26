<?php
  session_start();
  require_once('link.php');
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="css/pintuer.css">
    <link rel="stylesheet" href="css/admin.css">
    <script src="js/jquery.js"></script>
</head>
<body>
<div class="panel admin-panel">
    <div class="panel-head"><strong class="icon-reorder"> 内容列表</strong></div>
  <h2>当前管理员：<?php
 echo $_SESSION["Name"];
?> </h2>
  <br>
  <br>
 <p>这是一个高效的超市管理系统，以解决超市管理紊乱，人力物力投入成本大的问题。</p>
  <img src="images/yy.jpg" alt="欢迎">
  <div class="line-middle">
      <div class="xl12 xs6 xm4 xb3">
          <div class="media padding-bottom clearfix">
              <a href="#">
                  <img src="..." class="radius img-responsive" alt="...">
              </a>
              <div class="media-body">
                  <strong>...</strong> ...
              </div>
          </div>
      </div>
      ...
  </div>
</div>
</body>
</html>