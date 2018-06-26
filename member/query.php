<?php
/**
 * Created by PhpStorm.
 * User: 鹏
 * Date: 2018/1/18
 * Time: 11:41
 */
session_start();
require_once('../link.php');//连接数据库
header("Content-type:text/html;charset=utf-8");


$account=$_POST["account"];
$email=$_POST["email"];
$show_method=$_POST["show_method"];

$sql="select * from member WHERE account='{$account}' and email='{$email}'";

$rst=mysqli_query($conn,$sql);

//$row=mysqli_fetch_row($rst);

if ($rst->num_rows > 0) {
    // 输出数据
    while($row=mysqli_fetch_assoc($rst)) {
        $name=$row["name"];
        $password=$row["password"];
    }
} else {
    echo "<script>alert('邮箱或账户不匹配，请重新输入！');window.parent.location.href='../front/shopping.php'</script>";
    //echo "邮箱或账户不匹配，请重新输入";
}
$message="
<!DOCTYPE html>
<html lang=\"zh-cn\">
<head>
  <meta http-equiv=\'Content-Type\' content=\'text/html; charset=utf-8\' />
  <title></title>
  </head>
  <body>
     密码都记不住的瓜皮 <b>$name</b>你好，账号密码已发送，请牢记<br><br>
         账号：$account<br>
         密码：$password<br>
     <a href='#'>点此访问网站首页</a>
</body>
</html>
";
if($show_method=="2")
{
    echo $message;
}
else
{
    //$subject="=?utf-8?B?".base64_encode("账号通知")."?=";
    $subject = "来自吴鹏的自动邮件";
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
    $headers .= 'From: <1241001633@qq.com>' . "\r\n";
    $headers .= 'Cc: 1241001633@qq.com' . "\r\n";
    //mail($email,$subject,$message,$headers);
    //header("location:add.php");
    if (mail($email, $subject, $message, $headers)){
        echo '发送成功！';
    }else{
        echo "发送失败！";
    }

}

 mysqli_free_result($rst);

 mysqli_close($conn);
?>