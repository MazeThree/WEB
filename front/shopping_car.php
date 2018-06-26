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
<div id="loader"></div>
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

<p align="center">订单管理</p>
<div class="table-responsive">
    <table class="table table-striped table-hover">
        <tr>
        <th width="10%">编号</th>
        <th>名称</th>
        <th>定价</th>
        <th>数量</th>
        <th>小计</th>
        <th>更改数量</th>
        </tr>
        <?php
           //若购物车为空，则无显示
        if(empty ($_COOKIE["t_id_list"]))
        {
           echo "<tr>";
           echo "<td align='center'>购物车暂无数据</td>";
           echo "</tr>";
        }
        else
        {
            //获取购物车数据
            $t_id_array=explode(",",$_COOKIE["t_id_list"]);
            $t_name_array=explode(",",$_COOKIE["t_name_list"]);
            $price_array=explode(",",$_COOKIE["price_list"]);
            $quantity_array=explode(",",$_COOKIE["quantity_list"]);

            //显示购物车产品内容
            $total=0;
            //减一是因为数组下标溢出了
            for($i=0;$i<count($t_id_array);$i++)
            {
                //计算小计金额
                $sub_total=$price_array[$i]*$quantity_array[$i];

                //总金额
                $total+=$sub_total;

                //显示各字段数据
                echo "<from method='post' action='change.php?t_id=".$t_id_array[$i]."'>";
                echo "<tr>";
                echo "<td>".$t_id_array[$i]."</td>";
                echo "<td>".$t_name_array[$i]."</td>";
                echo "<td>".$price_array[$i]."</td>";
                echo "<td><input type='text' name='quantity' value='".$quantity_array[$i]."' size='5'></td>";
                echo "<td>".$sub_total."</td>";
                echo "<td><input type='submit' value='修改'></td>";
                echo "</tr>";
                echo "</from>";
            }
            echo "<tr>";
            echo "<td>总金额=".$total."</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td>"."<br><input type='button' value='清空' onClick=\"javascript:window.open('delete_order.php','_self')\">";
            echo "</td>";
            echo "<td>"."<br><input type='button' value='确认提交' onClick=\"javascript:window.open('订单确认.html','_self')\">";
            echo "</td>";
            echo "</tr>";
        }
        ?>
    </table>
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="../js/bootstrap.min.js"></script>
</body>
</html>
