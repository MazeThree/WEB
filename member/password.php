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
    <title>密码查询</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
    <link rel="stylesheet"  href="../css/style.css" />
    <link rel="stylesheet"  href="../css/normalize.css" />
    <script  src="../js/jquery.js"></script>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://cdn.bootcss.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<form class="form-horizontal" method="post" action="query.php">
    <div class="form-group">
        <label for="disabledTextInput" class="col-sm-2 control-label">用户账号</label>
        <div class="col-sm-4">
            <input type="text" id="disabledTextInput" name="account" class="form-control" placeholder="input" >
        </div>
    </div>
    <div class="form-group">
        <label for="sel1" class="col-sm-2 control-label">查询方式:</label>
        <div class="col-sm-4">
        <select class="form-control " name="show_method" id="sel1">
            <option value="1" selected="selected">邮箱查询</option>
            <option value="2">短信查询</option>
        </select>
            <span id="helpBlock2" class="help-block">请确定以下信息填写正确。</span>
        </div>
    </div>
    <div class="form-group" id="email" >
        <label for="email" class="col-sm-2 control-label">邮箱</label>
        <div class="col-sm-4">
            <input type="text" class="form-control"  name="email" placeholder="email" size="30" >
        </div>
    </div>
    <div class="form-group" id="tel" style="display: none">
        <label for="tel" class="col-sm-2 control-label" >电话</label>
        <div class="col-sm-4">
            <input type="text" class="form-control"  name="tel" placeholder="ps:12505" >
        </div>
    </div>
    <div class="form-group" >
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default" >提交</button>
        </div>
    </div>
</form>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="../js/bootstrap.min.js"></script>
<!--查询方式选择判断-->
<script type="text/javascript">
    $("#sel1").change(function (){
            //var a=$('#sel1 option:selected').val();//选中的值
                $("#tel").toggle(1000);
                $("#email").toggle(1000);
    });
</script>
</body>
</html>
