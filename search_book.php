<!DOCTYPE html>
<html lang="en" xmlns:100px>
<head>
    <meta charset="UTF-8">
    <title>买买买</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/main.css">
    <script src="js/jquery2.0.0.min.js"></script>
    <script src="js/jquery.cookie.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
</head>
<body>
<div class="head row">
    <div class="col-md-4 logo_box">
        <a href="book_main.php">
            <img src="img/dangdanglogo.gif" class="col-md-10 col-md-offset-1">
        </a>
    </div>
    <div class="col-md-5 search_box">
        <div class="col-md-12 search">
            <div class="col-md-2 search_p">
                <p>搜索</p>
            </div>
            <form action="search_book.php" method="GET">
                <div class="col-md-9 search_input_box">
                    <input type="text" name="search">
                </div>
                <div class="col-md-1">
                    <button type="submit" style="background-color: rgba(0,0,0,0);border: none"><span class="glyphicon glyphicon-search"></span></button>
                </div>
            </form>
        </div>
    </div>
    <div class="col-md-3 buy_car_box">
        <div class="col-md-8 col-md-offset-2 buy_car">
            <div class="col-md-8" style="align-content: center" id="buy_car_btn">
                <?php
                require ('test.php');
                if(@$_COOKIE['user_name']){
                    $user = $_COOKIE['user_name'];
                    $q = "SELECT * from buy_car WHERE user_name='$user'";
                    $r = @mysqli_query($con,$q);
                    $ra=mysqli_num_rows($r);
                }else{
                    $ra = 0;
                }
                echo '<span class="glyphicon glyphicon-shopping-cart"></span><span>购物车</span><span>'.$ra.'</span>';
                ?>
                <!--                <span class="glyphicon glyphicon-shopping-cart"></span><span>购物车</span><span>0</span>-->
            </div>
            <div class="col-md-4" style="background-color: #ffffff;padding: 0">
                <!--                <div id="login_btn" data-toggle="modal" data-target="#myModal" style="border: 1px solid red;height: 50px;width: 50px;color: red;">-->
                <?php
                if(@$_COOKIE['user_name']){
                    $aaa = $_COOKIE['user_name'];
                    $sql="SELECT user_img FROM users WHERE user_name='$aaa'";
                    $ra = mysqli_fetch_array(@mysqli_query($con, $sql));
                    echo '<div id="login_btn" data-toggle="modal" data-target="#myModal" style=height: 50px;width: 50px;color: red;">';
                    echo '<img src="'.$ra['user_img'].'" style="height: 50px;width: 50px;">';
                    echo '</div>';
                }else{
                    echo '<div id="login_btn" data-toggle="modal" data-target="#myModal" style="border: 1px solid red;height: 50px;width: 50px;color: red;">';
                    echo '<b style="line-height: 45px">login</b>';
                    echo '</div>';
                }
                ?>
                <!--                    <b style="line-height: 45px">login</b>-->
                <!--                </div>-->
            </div>
        </div>
    </div>
</div>
<div class="line row"></div>
<?php
require ('test.php');
$aaa = $_GET['search'];
$q = "SELECT * from more_book WHERE more_book_name LIKE '%$aaa%' OR more_book_author LIKE '%$aaa%'";
$r = @mysqli_query($con, $q);
$row = @mysqli_fetch_array($r);
$records = $row[0];

$display = 4;
$records = ceil($records/$display);
for($i=0;$i<=$records;$i=$i+1)
{
    echo '<div class="more_book row">';
    echo '<div class="col-md-offset-1 col-md-10">';
    $a=$i*4;
    $b=$i*4+$display;
    $q = "SELECT * FROM more_book WHERE more_book_name LIKE '%$aaa%' OR more_book_author LIKE '%$aaa%' limit $a, $b";
    $r = @mysqli_query($con, $q);
    foreach ($r as $value2) {
        echo '<div class="buy one_book col-md-3" data-buy="'.$value2['more_book_name'].'">';
        echo '<div class="one_book_in">';
        echo '<img src="'.$value2['more_book_img'].'">';
        echo '<div class="one_book_in_talk">';
        echo '<p>'.$value2['more_book_information'].'</p>';
        echo '<h4>￥'.$value2['more_book_price'].'.<span>'.$value2['more_book_littleprice'].'</span></h4>';
//        echo '<div class="put_in_car_btn">放入购物车</div>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }
    echo '</div>';
    echo '</div>';
}
//foreach ($r as $value) {
//    echo '<div class="more_book row">';
//    echo '<div class="col-md-offset-1 col-md-10">';
//    echo '<div class="one_book col-md-3">';
//    echo '<div class="one_book_in">';
//    echo '<img src="img/more_book1.jpg">';
//    echo '<div class="one_book_in_talk">';
//    echo '<p>'.$value['more_book_name'].'</p>';
//    echo '<h4>'.$value['more_book_price'].'<span>'.$value['more_book_littleprice'].'</span></h4>';
//    echo '</div>';
//    echo '</div>';
//    echo '</div>';
//}
?>
<?php
//$aaa = $_GET['search'];
//
//echo $aaa;