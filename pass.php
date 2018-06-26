<?php
/**
 * Created by PhpStorm.
 * User: 鹏
 * Date: 2018/1/27
 * Time: 11:46
 */
require_once('link.php');//连接数据库

$account=$_SESSION["Name"];
$pass=$_POST['pass'];
$new=$_POST['new'];

$sql="select * from admin where usename='{$account}'";

$sql="update admin set password='{$new}' where usename='{$account}' and password='{$pass}'";
$rst=mysqli_query($conn,$sql);
//$row=mysqli_fetch_assoc($rst);

mysqli_close($conn);

echo "<script>alert('修改成功！')</script>";

?>