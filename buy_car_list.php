<!DOCTYPE html>
<html lang="en" xmlns:100px>
<head>
    <meta charset="UTF-8">
    <title>买买买</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/buy_car_list.css">
    <script src="js/jquery2.0.0.min.js"></script>
    <script src="js/jquery.cookie.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/buy_car_list.js"></script>

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
            <div class="col-md-9 search_input_box">
                <input >
            </div>
            <div class="col-md-1">
                <span class="glyphicon glyphicon-search"></span>
            </div>
        </div>
    </div>
    <div class="col-md-3 buy_car_box">
        <div class="col-md-8 col-md-offset-2 buy_car">
            <div class="col-md-8" style="align-content: center">
                <span class="glyphicon glyphicon-shopping-cart"></span><span>购物车</span><span>0</span>
            </div>
            <div class="col-md-4" style="background-color: #ffffff;padding: 0">
                <div id="login_btn" data-toggle="modal" data-target="#myModal" style="border: 1px solid red;height: 50px;width: 50px;color: red;">
                    <b style="line-height: 45px">login</b>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="line row"></div>
<div class="row list">
    <?php
    require ('test.php');
    $user_name=$_COOKIE['user_name'];
    $q="SELECT * FROM buy_car WHERE user_name='$user_name'";
    $r = @mysqli_query($con, $q);
    foreach ($r as $value) {
        echo '<div class="background col-md-offset-2 col-md-8">';
        echo '<div class="col-md-2">';
        $aaa = $value['buy_thing'];
        $sql="SELECT more_book_img,more_book_information,more_book_price,more_book_littleprice FROM more_book WHERE more_book_name='$aaa'";
        $ra = mysqli_fetch_array(@mysqli_query($con, $sql));
        echo '<img src="'.$ra['more_book_img'].'">';
        echo '</div>';
        echo '<div class="col-md-3">';
        echo '<p>'.$ra['more_book_information'].'</p>';
        echo '</div>';
        echo '<div class="col-md-2">￥'.$ra['more_book_price'].'.'.$ra['more_book_littleprice'].'</div>';
        echo '<div class="col-md-2">'.$value['buy_count'].'</div>';
        $price=$ra['more_book_price'].'.'.$ra['more_book_littleprice'];
        $cPrice =number_format($price*$value['buy_count'],2);
        echo '<div class="col-md-2">'.$cPrice.'</div>';
        echo '<div class="col-md-1"><p class="delete_btn" data-buy_name="'.$value['buy_thing'].'">删除</p></div>';
        echo '</div>';
    }
    ?>
</>
</body>
</html>