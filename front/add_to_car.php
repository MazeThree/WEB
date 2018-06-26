<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/4/23
 * Time: 19:56
 */
  $id=$_GET["id"];
  $name=$_GET["name"];
  $price=$_GET["price"];
  $quantity=$_POST["quantity"];

  if(empty($quantity)) $quantity=1;

  //购物车无产品，添加
  if (empty ($_COOKIE["t_id_list"]))
  {
      echo $id;
      echo $quantity;
     setcookie("t_id_list",$id);
     setcookie("t_name_list",$name);
     setcookie("price_list",$price);
     setcookie("quantity_list",$quantity);
  }
  //有产品，则更新数据
  else
  {
      //将字符串拆分为数组
      $t_id_array=explode(",",$_COOKIE["t_id_list"]);
      $t_name_array=explode(",",$_COOKIE["t_name_list"]);
      $price_array=explode(",",$_COOKIE["price_list"]);
      $quantity_array=explode(",",$_COOKIE["quantity_list"]);
       ///搜索是否存在对应$id，存在增加对应数量，不存在则创建
      if(in_array($id,$t_id_array))
      {
          $key=array_search($id,$t_id_array);
          $quantity_array[$key]+=$quantity;
      }
      else
      {
          $t_id_array[]=$id;
          $t_name_array[]=$name;
          $price_array[]=$price;
          $quantity_array[]=$quantity;
      }
        //将数组元素组合为字符串
      setcookie("t_id_list",implode(",",$t_id_array));
      setcookie("t_name_list",implode(",",$t_name_array));
      setcookie("price_list",implode(",",$price_array));
      setcookie("quantity_list",implode(",",$quantity_array));
  }
  ?>
<!doctype html>
<html>
   <head>
     <meta charset="utf-8">
   </head>
   <body>
   <div id="loader"></div>
   <p align="center"><img src="../images/中指.jpg"></p>
   <p align="center">已加入购物车</p>
   <p align="center"><a href="index.php">继续购物</a></p>
   <p align="center"><a href="shopping_car.php">我的购物车</a></p>
   </body>
</html>

