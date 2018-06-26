<?php
/**
 * Created by PhpStorm.
 * User: 鹏
 * Date: 2018/1/17
 * Time: 19:09
 */
$passed=$_COOKIE["passed"];

if($passed!="true")
{
    echo "<script>alert('要先登录才能查看，你个瓜皮。');window.location.href='会员登录.html'</script>";
    //header("location:会员登录.html");
    exit();
}
else{
    require_once('../link.php');
    $del=$_COOKIE{"del"};

    $sql="delete from member where account='{$del}'";
    $rst=mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($rst);

    mysqli_close($conn);
    echo "<script>alert('该用户充钱过少已被删除！');window.parent.location.href='会员登录.html'</script>";
}
?>