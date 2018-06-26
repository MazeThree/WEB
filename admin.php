<?php
session_start();
require_once('link.php');
?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <meta name="renderer" content="webkit">
  <title>密码修改</title>
  <link rel="stylesheet" href="css/pintuer.css">
  <link rel="stylesheet" href="css/admin.css">
  <script src="js/jquery.js"></script>
  <script src="js/pintuer.js"></script>
</head>
<body>
<div class="panel admin-panel">
  <div class="panel-head"><strong><span class="icon-key"></span>修改密码</strong></div>
  <div class="body-content">
    <form action="pass1.php" method="post" class="form-x">
      <div class="form-group">
        <div class="label">
          <label for="">管理员帐号：</label>
        </div>
        <div class="field">
          <label style="line-height:33px;">
              <?php
              echo $_SESSION["Name"];
              ?>
          </label>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label for="pass">原始密码：</label>
        </div>
        <div class="field">
          <input type="password" class="input w50" id="pass" name="pass" size="50" placeholder="请输入原始密码" data-validate="required:请输入原始密码" />
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label for="new">新密码：</label>
        </div>
        <div class="field">
          <input type="password" class="input w50" name="new" size="50" placeholder="请输入新密码" data-validate="required:请输入新密码,length#>=4:新密码不能小于4位" />
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label for="renew">确认新密码：</label>
        </div>
        <div class="field">
          <input type="password" class="input w50" name="renew" size="50" placeholder="请再次输入新密码" data-validate="required:请再次输入新密码,repeat.new:两次输入的密码不一致" />
        </div>
      </div>

      <div class="form-group">
        <div class="label">
          <label></label>
        </div>
        <div class="field">
          <button class="button bg-main icon-check-square-o" type="submit"> 提交</button>
        </div>
      </div>
    </form>
  </div>
</div>
</body>
</html>