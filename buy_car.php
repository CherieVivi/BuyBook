<?php
require ('test.php');
$name = $_POST['buy_name'];
$user_name = $_POST['user_name'];
$count = $_POST['count'];
$q="insert into buy_car(user_name,buy_thing,buy_count) values('$user_name','$name','$count')";
//@mysqli_query($con, $q);
//$ql="SELECT * FROM more_book where more_book_name='$name'";
//$r = @mysqli_query($con, $ql);
//foreach ($r as $value){
//    echo $value['more_book_information'];
//}
if(@mysqli_query($con, $q)){

    $url="./book_main.php";         //设置重定向的URL
    function redirect($url)
    {           //重定向函数
        echo "<script language=\"javascript\">";
        echo "location.href=\"$url\"";
        echo "</script>";
    }
    redirect($url);                  //重定向页面

}