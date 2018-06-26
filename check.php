<?php
session_start();
require_once('link.php');//连接数据库
$nickname=$_POST['name'];
$password=$_POST['password'];
$verification=$_POST["verification"];

$sql="select * from admin where usename='{$nickname}' and password='{$password}' ";
$rst=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($rst);
//验证登录信息是否正确
if(($_SESSION["rand"])!=($verification )){
    echo "<script>alert('验证码错误！重新填写');window.location.href='login.html'</script>";
    //判断验证码是否填写正确
}elseif($row) {
    //更新登录时间及ip
    $_SESSION["Name"]=$row["usename"];
    echo "<script>alert('登陆成功！欢迎你');window.location.href='index.php'</script>";
}else{
    echo "<script>alert('登陆信息有误！重新填写');window.location.href='login.html'</script>";
}

?>