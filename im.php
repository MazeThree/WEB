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
    <title>库存管理</title>
    <link rel="stylesheet" href="css/pintuer.css">
    <link rel="stylesheet" href="css/admin.css">
    <script src="js/jquery.js"></script>
    <script src="js/pintuer.js"></script>
</head>
<body>
<div class="tab">
    <!--导航控件-->
    <div class="tab-head">
        <strong>超市库存</strong> <span class="tab-more"><a href="#">更多</a></span>
        <ul class="tab-nav">
            <li class="active"><a href="#tab-start">商品库存</a> </li>
            <li><a href="#tab-css">出库单</a> </li>
            <li><a href="#tab-units">入库单</a> </li>
            <li><a href="#tab-new">添加新商品</a> </li>
        </ul>
    </div>
    <!--主体部分-->
    <div class="tab-body">
        <!--库存表单-->
        <div class="tab-panel active" id="tab-start">
            <button class="button win-refresh icon-refresh">
                刷新</button>
            <button class="button win-print icon-print">
                打印</button>
            <button class="button win-close icon-times-circle">
                关闭</button>
            <!--搜索控件-->
            <div class="padding border-top" style="margin-top: 5px">
                <form id="form1">
                <ul class="search">
                    <li>商品编号：
                        <input type="text" class="input tips" name="sea_id"  style="width:80px; line-height:17px;display:inline-block;" value="" data-toggle="hover" data-place="right" />
                    </li>
                    <li>商品名：
                        <input type="search" class="input tips" name="sea_name" placeholder="输入商品名" style="width:120px; display:inline-block;" value="" data-toggle="hover" data-place="right" />
                    </li>
                    <li>更新时间：
                        <select class="input" name="sea_time" style="width:130px; line-height:17px;display:inline-block;">
                            <option value="0">请选择区间</option>
                            <option value="">2010-2012</option>
                            <option value="">2012-2014</option>
                            <option value="">2014-2016</option>
                            <option value="">2016-2018</option>
                        </select>
                    </li>
                    <li>仓库分类：
                        <select class="input" name="sea_fl" style="width:130px; line-height:17px;display:inline-block;">
                            <option value="">请选择区间</option>
                            <option>果蔬</option>
                            <option>日用品</option>
                            <option>服装、鞋靴</option>
                            <option>数码产品</option>
                        </select>
                    </li>
                        <button type="button" class="button border-main icon-search" id="im_sub" > 搜索</button>
                </ul>
                </form>
            </div>
            <!--搜索控件结束-->
            <div class="padding border-top" style="margin-top: 5px">
            <table class="table table-hover text-center" id="im_table">
                <!--分页-->
                <?php
                $records_page=5;

                if(isset($_GET["page"]))
                    $page=$_GET["page"];
                else
                    $page=1;

                $sql="select * from im";
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

                //打印表头
                echo "<tr>
                    <th width=\"100\">编号</th>
                    <th>仓库分类</th>
                    <th>商品名</th>
                    <th>当前库存</th>
                    <th>进价/元</th>
                    <th>售价/元</th>
                    <th>总金额</th>
                    <th>单位</th>
                    <th width=\"350\">备注</th>
                    <th>更新时间</th>
                </tr>";

                //列出所有数据

                $j=1;
                while($row=mysqli_fetch_assoc($rst) and $j<=$records_page)
                {
                    //for($i=0;$i<$total_records;$i++)
                    // {
                    //显示详细数据
                    echo "<tr>";
                    echo "<td><input type='checkbox' class='' value='";
                    echo $row["im_id"]."' />";
                    echo $row["im_id"]."</td>";
                    echo "<td>".$row["im_fl"]."</td>";
                    echo "<td>".$row["im_name"]."</td>";
                    echo "<td>".$row["im_num"]."</td>";
                    echo "<td>".$row["im_i"]."</td>";
                    echo "<td>".$row["im_o"]."</td>";
                    echo "<td>".$row["im_price"]."</td>";
                    echo "<td>".$row["im_dw"]."</td>";
                    echo "<td>".$row["im_ps"]."</td>";
                    echo "<td>".$row["date"]."</td>";
                    echo "</tr>";
                    //  }
                    $j++;
                }
?>
            </table>
            <!--分页控件-->
                <?php
                //产生导航条
                echo "<div class='pagelist'>";
                if($page>1)
                    echo"<a href='im.php?page=".($page-1)."'>上一页</a>";
                for($i=1;$i<=$total_pages;$i++)
                {
                    if($i==$page)
                        echo "<a class='bg-blue'>$i</a>";
                    else
                        echo"<a class='current' href='im.php?page=$i'>$i</a>";
                }
                if($page<$total_pages)
                    echo"<a href='im.php?page=".($page+1)."'>下一页</a>";
                echo "</div>";
                mysqli_free_result($rst);

                mysqli_close($conn);
                ?>
        </div>
        </div>
        <!--第二选项卡-->
        <div class="tab-panel" id="tab-css">
            <div class="panel admin-panel margin-top">
                <div class="panel-head" id="add"><strong><span class="icon-pencil-square-o"></span>商品入库</strong></div>
                <div class="body-content">
                    <form method="post" class="form-x" action="">
                        <div class="form-group">
                            <div class="label">
                                <label>商品名：</label>
                            </div>
                            <div class="field">
                                <input type="text" class="input w50" name="title" maxlength="20" value="" />
                                <div class="tips"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="label">
                                <label>商品数量：</label>
                            </div>
                            <div class="field">
                                <input id="field" type="text" class="input w50" name="sort" value="1"  data-validate="number:排序必须为数字">
                                <div class="tips"></div>
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
            </div>
        <!--第三选项卡-->
        <div class="tab-panel" id="tab-units">
            <div class="panel admin-panel margin-top">
                <div class="panel-head" id="add"><strong><span class="icon-pencil-square-o"></span>商品出库</strong></div>
                <div class="body-content">
                    <form method="post" class="form-x" action="">
                        <div class="form-group">
                            <div class="label">
                                <label>商品名：</label>
                            </div>
                            <div class="field">
                                <input type="text" class="input w50" name="title" maxlength="20" value="" />
                                <div class="tips"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="label">
                                <label>商品数量：</label>
                            </div>
                            <div class="field">
                                <input id="field" type="text" class="input w50" name="sort" value="1"  data-validate="number:排序必须为数字">
                                <div class="tips"></div>
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
            </div>
        <!--第四选项卡-->
        <div class="tab-panel" id="tab-new">
            <div class="panel admin-panel margin-top">
                <div class="panel-head" id="add"><strong><span class="icon-pencil-square-o"></span>增加商品</strong></div>
                <div class="body-content">
                    <form method="post" class="form-x" action="im_add.php">
                        <div class="form-group">
                            <div class="label">
                                <label>商品名称：</label>
                            </div>
                            <div class="field">
                                <input type="text" class="input w50" name="im_name" value="" maxlength="10" data-validate="required:请输入正确数值" />
                                <div class="tips"></div>
                            </div>
                        </div>
                        <!--这里可以用php写成动态获取select-->
                        <div class="form-group">
                            <div class="label">
                                <label>商品分类：</label>
                            </div>
                            <div class="field">
                                <select class="input w50" name="im_fl">
                                    <option>果蔬</option>
                                    <option>日用品</option>
                                    <option>服装、鞋靴</option>
                                    <option>数码产品</option>
                                </select>
                                <div class="tips"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="label">
                                <label>添加库存数量：</label>
                            </div>
                            <div class="field">
                                <input type="number" class="input w50" min="1" max="10000"  name="im_num" data-validate="required:请输如正确数值" value="" />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="label">
                                <label>进价：</label>
                            </div>
                            <div class="field">
                                <input type="number"  min="1.0" MAX="80000.0" step="0.1" class="input w50" name="im_i" data-validate="required:请输如正确数值">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="label">
                                <label>售价：</label>
                            </div>
                            <div class="field">
                                <input type="number"  min="1.0" MAX="80000.0" step="0.1" class="input w50" name="im_o" data-validate="required:请输如正确数值">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="label">
                                <label>商品单位：</label>
                            </div>
                            <div class="field">
                                <select class="input w50" name="im_dw">
                                    <option>kg</option>
                                    <option>瓶</option>
                                    <option>件</option>
                                    <option>箱</option>
                                </select>
                                <div class="tips"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="label">
                                <label>商品描述：</label>
                            </div>
                            <div class="field">
                                <textarea type="text" class="input" name="im_ps" style="height:100px;" maxlength="50" placeholder="可以为空"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="label">
                                <label></label>
                            </div>
                        <div class="field">
                            <button class="button bg-main icon-check-square-o" type="submit"> 提交</button>
                            <button class="button bg-main icon-check-square-o" type="reset"> 重置</button>
                        </div>
                    </form>
                </div>
            </div>
            </div>
    </div>
</div>

</body>
<script>
    function del(id){
        if(confirm("您确定要删除吗?")){

        }
    }

    $("#field").change(function(){
            var s=$("#field").val();
            var reg = new RegExp("^[0-9]*$");
            if(!reg.test(s)){
                alert("请输入数字");
            }
            if(s<0||s>1000){
                alert("请输入1-1000以内的数字");
            }
        });
    $("#im_sub").click(function(){
        $.ajax({
            type: "POST",   //提交的方法
            url:"im_table.php", //提交的地址
            data:$('#form1').serialize(),// 序列化表单值
            error: function(request) {  //失败的话
                alert("Connection error");
            },
            success: function(data) {  //成功
                //$("#im_table").text($("#form1").serialize());
                //alert(data);  //就将返回的数据显示出来
                $("#im_table").html(data);
            }
        });
    });
</script>
</html>
