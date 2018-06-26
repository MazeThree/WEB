<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/6/10
 * Time: 10:38
 */
session_start();
require_once('link.php');//连接数据库
$im_id=$_POST["sea_id"];
$im_name=$_POST["sea_name"];
$im_fl=$_POST["sea_fl"];
if($im_name==""&&$im_id==""&&$im_fl==""){
    $sql="select * from im ";
}
else if($im_name=="") {
    $sql = "select * from im where im_id='{$im_id}' or im_fl='{$im_fl}' ";
}
else{
    $sql = "select * from im where im_name LIKE '%{$im_name}%' AND im_fl='{$im_fl}' OR im_id='{$im_id}'";
}
$rst=mysqli_query($conn,$sql);
$total_records=mysqli_num_rows($rst);

if($total_records==0){
    echo "<p align='center'>查询暂无数据！请重新输入。按名称查找请选择分类。</p>";
}
else {
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

//列出所有产品数据
    for ($i = 0; $i < $total_records; $i++) {
        //获取产品数据
        $row = mysqli_fetch_assoc($rst);

        echo "<tr>";
        echo "<td><input type='checkbox' class='' value='";
        echo $row["im_id"] . "' />";
        echo $row["im_id"] . "</td>";
        echo "<td>" . $row["im_fl"] . "</td>";
        echo "<td>" . $row["im_name"] . "</td>";
        echo "<td>" . $row["im_num"] . "</td>";
        echo "<td>" . $row["im_i"] . "</td>";
        echo "<td>" . $row["im_o"] . "</td>";
        echo "<td>" . $row["im_price"] . "</td>";
        echo "<td>" . $row["im_dw"] . "</td>";
        echo "<td>" . $row["im_ps"] . "</td>";
        echo "<td>" . $row["date"] . "</td>";
        echo "</tr>";

    }
//释放内存
    mysqli_free_result($rst);
}
mysqli_close($conn);
?>
