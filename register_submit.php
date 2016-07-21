<?php
require ('test.php');
$name = $_POST['register_name'];
$password = md5($_POST['register_password']);
$q="insert into users(user_name,user_key) values('$name','$password')";
//$result = mysqli_query($con, $q);
if(@mysqli_query($con, $q)){
    setcookie("user_name",$name,time()+24*3600);

    $url="./book_main.php";         //设置重定向的URL
    function redirect($url)
    {           //重定向函数
        echo "<script language=\"javascript\">";
        echo "location.href=\"$url\"";
        echo "</script>";
    }
    redirect($url);                  //重定向页面

}
//mysqli_close($con);                //关闭数据库

//$url="book_main.php";         //设置重定向的URL
//redirect($url);                  //重定向页面
//function redirect($url)
//{           //重定向函数
//    echo "<script language=\"javascript\">";
//    echo "location.href=\"$url\"";
//    echo "</script>";
//}