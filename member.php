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
    <title>个人资料</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet"  href="css/style.css" />
    <link rel="stylesheet"  href="css/normalize.css" />
    <link rel="stylesheet" href="css/pintuer.css">
    <script  src="js/jquery.js"></script>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://cdn.bootcss.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div class="panel admin-panel">
    <div class="panel-head"><strong class="icon-reorder"> 会员表</strong></div>
<div class="table-responsive">
    <table class="table table-striped table-hover">
      <tr>
          <th>序号</th>
          <th>账户</th>
          <th>用户名</th>
          <th>邮箱</th>
          <th>电话</th>
          <th>操作</th>
      </tr>
        <!--分页-->
        <?php
            $records_page=3;

            if(isset($_GET["page"]))
                $page=$_GET["page"];
            else
                $page=1;

            require_once('link.php');//连接数据库
            $sql="select * from member";
            $rst=mysqli_query($conn,$sql);
            //计算数目
            $total_records=mysqli_num_rows($rst);

            //数据数
            $total_fields=mysqli_num_rows($rst);

            //计算页数
            $total_pages=ceil($total_records/$records_page);

            //计算本页第一个序号
            $started_record=$records_page*($page-1);

            //将记录指针移至本页第一个记录的序号
            mysqli_data_seek($rst,$started_record);

            //列出所有数据

            $j=1;
            while($row=mysqli_fetch_assoc($rst) and $j<=$records_page)
            {
                //for($i=0;$i<$total_records;$i++)
               // {
                    //显示详细数据
                    echo "<tr>";
                    echo "<td>".$row["id"]."</td>";
                    echo "<td>".$row["account"]."</td>";
                    echo "<td>".$row["name"]."</td>";
                    echo "<td>".$row["email"]."</td>";
                    echo "<td>".$row["tel"]."</td>";
                    echo "<td><button type=\"button\" class=\"btn btn-primary\">修改</button><button type=\"button\" class=\"btn btn-danger\">删除</button></td>";
                    echo "</tr>";
                  //  }
                $j++;
            }

            //产生导航条
            echo "<td colspan='6'>";
            echo "<p align='center' class='pagelist'>";
            if($page>1)
                echo"<a href='member.php?page=".($page-1)."'>上一页</a>";
            for($i=1;$i<=$total_pages;$i++)
            {
                if($i==$page)
                    echo "$i";
                else
                    echo"<a href='member.php?page=$i'>$i</a>";
            }
            if($page<$total_pages)
                echo"<a href='member.php?page=".($page+1)."'>下一页</a>";
            echo "</p>";
            echo "</td>";
            mysqli_free_result($rst);

            mysqli_close($conn);
            ?>
    </table>
</div>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>