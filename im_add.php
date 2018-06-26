<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/6/3
 * Time: 10:33
 */
session_start();
require_once('link.php');//连接数据库
$im_name=$_POST['im_name'];
$im_fl=$_POST['im_fl'];
$im_num=$_POST['im_num'];
$im_i=$_POST['im_i'];
$im_o=$_POST['im_o'];
$im_dw=$_POST['im_dw'];
$im_ps=$_POST['im_ps'];
$im_price=$im_num*$im_i;

//echo $im_price;

$sql="select * from im where im_name='{$im_name}' and im_fl='{$im_fl}'";
$rst=mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($rst);
if($row){
        $sql="update im set im_num='{$im_num}',im_i='{$im_i}',im_o='{$im_o}',im_price='{$im_price},'im_ps='{$im_ps}' where im_name='{$im_name}' and im_fl='{$im_fl}'";
        mysqli_query($conn,$sql);
    echo "<script>confirm('商品数据已更新');window.location.href='im.php'</script>";

}
else {
    $sql = "insert into im (im_name,im_fl,im_num,im_i,im_o,im_price,im_dw,im_ps) VALUES ('{$im_name}','{$im_fl}','{$im_num}','{$im_i}','{$im_o}','{$im_price}','{$im_dw}','{$im_ps}') ";
    echo $sql;
    mysqli_query($conn,$sql);
        echo "<script>alert('新商品添加成功！');window.location.href='im.php'</script>";
}
?>