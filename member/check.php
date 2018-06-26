<?php
/**
 * Created by PhpStorm.
 * User: 鹏
 * Date: 2018/1/17
 * Time: 9:10
 */
session_start();
require_once('../link.php');//连接数据库
$account=$_POST["account"];
$password=$_POST['password'];

$sql="select * from member where account='{$account}' and password='{$password}' ";
$rst=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($rst);
//$row=mysqli_fetch_array($rst);
$id=$row["name"];
$del=$row["account"];
if ($row==0)
{
    echo "<script>alert('账户或密码错误，请查明后再试！');window.location.href='会员登录.html'</script>";
}
else{

    mysqli_close($conn);
    $_SESSION["name"]=$row["name"];
    setcookie("name",$id);
    setcookie("del",$del);
    setcookie("passed","true");
    header("location:../front/shopping.php");
}
?>