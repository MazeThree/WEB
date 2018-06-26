<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/4/30
 * Time: 23:03
 */

//获取表单数据
$id=$_GET["id"];
$quantity=$_POST["quantity"];

//获取购物车数据
$t_id_array=explode(",",$_COOKIE["t_id_list"]);
$t_name_array=explode(",",$_COOKIE["t_id_list"]);
$price_array=explode(",",$_COOKIE["t_id_list"]);
$quantity_array=explode(",",$_COOKIE["t_id_list"]);

$key=array_search($id,$t_id_array);

//如何数量为0,则从购物车删除产品
if($quantity==0||empty($quantity))
{
    unset($t_id_array[$key]);
    unset($t_name_array[$key]);
    unset($price_array[$key]);
    unset($quantity_array[$key]);
}
//否则更新订单数量
else
{
    $quantity_array[$key]=$quantity;
}

//将数组元素组合为字符串
setcookie("t_id_list",implode(",",$t_id_array));
setcookie("t_id_list",implode(",",$t_name_array));
setcookie("t_id_list",implode(",",$price_array));
setcookie("t_id_list",implode(",",$quantity_array));

//重定向shopping_car
header("location:shopping_car.php");
?>