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
<div class="in row">
    <div class="classification col-md-2 col-md-offset-1">
        <div class="in_title"><span>分类</span></div>
        <ul class="classification_content">
            <li class="li_btn">文艺</li>
            <li class="li_btn">青春</li>
            <li class="li_btn">童书</li>
            <li class="li_btn">励志/成功</li>
            <li class="li_btn">生活</li>
            <li class="li_btn">人文社科</li>
            <li class="li_btn">科技</li>
            <li class="li_btn">教育</li>
        </ul>
    </div>
    <div class="book_top10 col-md-4 col-md-offset-1">
        <div class="in_title"><span>图书畅销榜</span></div>
        <?php

        $q = "SELECT * from best_book";
        $r = @mysqli_query($con, $q);
        foreach ($r as $value) {
            echo '<div class="media buy one_book_top10" data-buy='.$value['best_book_name'].'>';
            echo '<div class="media-left">';
            echo '<a href="#">';
            echo '<img class="media-object" src="'.$value['best_book_img'].'" alt="白说">';
            echo '</a>';
            echo '</div>';
            echo '<div class="media-body">';
            echo '<h4 class="media-heading">《'.$value['best_book_name'].'》&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>作者：'.$value['best_book_author'].'</span></h4>';
            echo $value['best_book_information'];
            $aaa = $value['best_book_name'];
            $sql="SELECT more_book_img,more_book_information,more_book_price,more_book_littleprice,more_book_oldprice FROM more_book WHERE more_book_name='$aaa'";
            $ra = mysqli_fetch_array(@mysqli_query($con, $sql));
            echo '<p class="top_book_price">￥'.$ra['more_book_price'].'.'.$ra['more_book_littleprice'].'&nbsp;&nbsp;&nbsp;<span class="top_book_oldprice">￥'.$ra['more_book_oldprice'].'</span></p>';
            echo '</div>';
            echo '</div>';
        }
        ?>
<!--        <div class="media">-->
<!--            <div class="media-left">-->
<!--                <a href="#">-->
<!--                    <img class="media-object" src="img/no1.jpg" alt="白说">-->
<!--                </a>-->
<!--            </div>-->
<!--            <div class="media-body">-->
<!--                <h4 class="media-heading">《白说》</h4>-->
<!--                新闻人白岩松：言语中的心灵之路，与我和我们的未来有关-->
<!--            </div>-->
<!--        </div>-->
<!--        <div class="media">-->
<!--            <div class="media-left">-->
<!--                <a href="#">-->
<!--                    <img class="media-object" src="img/no1.jpg" alt="白说">-->
<!--                </a>-->
<!--            </div>-->
<!--            <div class="media-body">-->
<!--                <h4 class="media-heading">《白说》</h4>-->
<!--                新闻人白岩松：言语中的心灵之路，与我和我们的未来有关-->
<!--            </div>-->
<!--        </div>-->
<!--        <div class="media">-->
<!--            <div class="media-left">-->
<!--                <a href="#">-->
<!--                    <img class="media-object" src="img/no1.jpg" alt="白说">-->
<!--                </a>-->
<!--            </div>-->
<!--            <div class="media-body">-->
<!--                <h4 class="media-heading">《白说》</h4>-->
<!--                新闻人白岩松：言语中的心灵之路，与我和我们的未来有关-->
<!--            </div>-->
<!--        </div>-->
    </div>
    <div class="book_expect col-md-2 col-md-offset-1">
        <div class="in_title"><span>图书期待榜</span></div>
        <?php
        $q = "SELECT * from expect_book";
        $r = @mysqli_query($con, $q);
        $ii=1;
        foreach ($r as $value) {
            echo '<div class="expect_btn">';
            echo '<p class="top123"><span>'.$ii.'</span>《'.$value['expect_book_name'].'》</p>';
            echo '</div>';
            echo '<div class="one_expect buy" data-buy="'.$value['expect_book_name'].'">';
            echo '<img src="'.$value['expect_book_img'].'">';
            echo '<p class="one_expect_title">'.$value['expect_book_name'].'</p>';
            echo '<p class="one_expect_title">'.$value['expect_book_name'].'</p>';
            echo '<p class="one_expect_title">'.$value['expect_book_name'].'</p>';
            echo '<p class="one_expect_title">'.$value['expect_book_name'].'</p>';
            echo '<p class="one_expect_author">'.$value['expect_book_author'].'</p>';
            echo '<p class="one_expect_price">￥'.$value['expect_book_price'].'</p>';
            echo '<p class="one_expect_oldprice">￥'.$value['expect_book_oldprice'].'</p>';
            echo '<span>'.$ii.'</span>';
            echo '</div>';
            $ii=$ii+1;
        }
        ?>
<!--        <div class="expect_btn" style="display: none;">-->
<!--            <p class="top123"><span>1</span>皮囊</p>-->
<!--        </div>-->
<!--        <div class="one_expect buy" style="display: block;">-->
<!--            <img src="img/big2.jpg">-->
<!--            <p class="one_expect_title">《呵呵》</p>-->
<!--            <p class="one_expect_title">《呵呵》</p>-->
<!--            <p class="one_expect_title">《呵呵》</p>-->
<!--            <p class="one_expect_title">《呵呵》</p>-->
<!--            <p class="one_expect_author">叶爽</p>-->
<!--            <p class="one_expect_price">￥44.44</p>-->
<!--            <p class="one_expect_oldprice">￥55.55</p>-->
<!--            <span>1</span>-->
<!--        </div>-->
<!--        <div class="expect_btn">-->
<!--            <p class="top123"><span>2</span>皮囊</p>-->
<!--        </div>-->
<!--        <div class="one_expect">-->
<!--            <img src="img/big2.jpg">-->
<!--            <p class="one_expect_title">《呵呵》</p>-->
<!--            <p class="one_expect_title">《呵呵》</p>-->
<!--            <p class="one_expect_title">《呵呵》</p>-->
<!--            <p class="one_expect_title">《呵呵》</p>-->
<!--            <p class="one_expect_author">叶爽</p>-->
<!--            <p class="one_expect_price">￥44.44</p>-->
<!--            <p class="one_expect_oldprice">￥55.55</p>-->
<!--            <span>2</span>-->
<!--        </div>-->
<!--        <div class="expect_btn">-->
<!--            <p class="top123"><span>3</span>皮囊</p>-->
<!--        </div>-->
<!--        <div class="one_expect">-->
<!--            <img src="img/big2.jpg">-->
<!--            <p class="one_expect_title">《呵呵》</p>-->
<!--            <p class="one_expect_title">《呵呵》</p>-->
<!--            <p class="one_expect_title">《呵呵》</p>-->
<!--            <p class="one_expect_title">《呵呵》</p>-->
<!--            <p class="one_expect_author">叶爽</p>-->
<!--            <p class="one_expect_price">￥44.44</p>-->
<!--            <p class="one_expect_oldprice">￥55.55</p>-->
<!--            <span>3</span>-->
<!--        </div>-->
<!--        <div class="expect_btn">-->
<!--            <p><span>4</span>11111111111111111111122222222222</p>-->
<!--        </div>-->
<!--        <div class="one_expect">-->
<!--            <img src="img/big2.jpg">-->
<!--            <p class="one_expect_title">《呵呵》</p>-->
<!--            <p class="one_expect_title">《呵呵》</p>-->
<!--            <p class="one_expect_title">《呵呵》</p>-->
<!--            <p class="one_expect_title">《呵呵》</p>-->
<!--            <p class="one_expect_author">叶爽</p>-->
<!--            <p class="one_expect_price">￥44.44</p>-->
<!--            <p class="one_expect_oldprice">￥55.55</p>-->
<!--            <span style="color: black;">4</span>-->
<!--        </div>-->
<!--        <div class="expect_btn">-->
<!--            <p><span>5</span>皮囊</p>-->
<!--        </div>-->
<!--        <div class="one_expect">-->
<!--            <img src="img/big2.jpg">-->
<!--            <p class="one_expect_title">《呵呵》</p>-->
<!--            <p class="one_expect_title">《呵呵》</p>-->
<!--            <p class="one_expect_title">《呵呵》</p>-->
<!--            <p class="one_expect_title">《呵呵》</p>-->
<!--            <p class="one_expect_author">叶爽</p>-->
<!--            <p class="one_expect_price">￥44.44</p>-->
<!--            <p class="one_expect_oldprice">￥55.55</p>-->
<!--            <span style="color: black;">5</span>-->
<!--        </div>-->
    </div>
</div>
<h3 class="line_head">更多图书</h3>
<div class="line row"></div>
<?php
//require ('test.php');
$q = "SELECT COUNT(more_book_name) from more_book";
$r = @mysqli_query($con, $q);
$row = @mysqli_fetch_array($r);
$records = $row[0];

//$display = 4;
//$records = ceil($records/$display);
//for($i=0;$i<=$records;$i=$i+1)
//{
    echo '<div class="more_book row">';
    echo '<div class="col-md-offset-1 col-md-10">';
//    $a=$i*4;
//    $b=$a+4;
//    $q = "SELECT * FROM more_book limit $a, $b";
//    $r = @mysqli_query($con, $q);
    $q = "SELECT * FROM more_book";
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
//}
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

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">登陆</h4>
            </div>
            <div class="modal-body">
                <div class="login_box">
                    <form action="login_submit.php" method="POST" id="register-form" enctype="multipart/form-data">
                    <div class="input-group col-md-8 col-md-offset-2 login_input">
                        <span class="input-group-addon" id="sizing-addon2"><span class="glyphicon glyphicon-user"></span></span>
                        <input type="text" id="login_name" class="form-control" name="login_name" placeholder="用户名" aria-describedby="sizing-addon2">
                    </div>
                    <div class="input-group col-md-8 col-md-offset-2 login_input">
                        <span class="input-group-addon" id="sizing-addon2"><span class="glyphicon glyphicon-pencil"></span></span>
                        <input type="password" id="login_password" class="form-control" name="login_password" placeholder="密码" aria-describedby="sizing-addon2">
                    </div>
                        <div class="row" style="margin: 20px 0">
                            <button type="submit" name="submit" id="login_true" class="btn btn-default col-md-8 col-md-offset-2">登陆</button>
                        </div>
                    </form>
                </div>
                <div class="register_box">
                    <form action="register_submit.php" method="POST" id="register-form" enctype="multipart/form-data">
                    <div class="input-group col-md-8 col-md-offset-2 login_input">
                        <span class="input-group-addon" id="sizing-addon2"><span class="glyphicon glyphicon-user"></span></span>
                        <input type="text" id="register_name" class="form-control" name="register_name" placeholder="用户名" aria-describedby="sizing-addon2">
                    </div>
                    <p class="register_false col-md-offset-2" id="name_false1">您的用户名不能为空</p>
                    <p class="register_false col-md-offset-2" id="name_false2">您的用户名不能含有特殊字符</p>
                    <p class="register_false col-md-offset-2" id="name_false3">您的输入的用户名已存在</p>
                    <p class="register_true col-md-offset-2" id="name_true">您的用户名可以使用</p>
                    <div class="input-group col-md-8 col-md-offset-2 login_input">
                        <span class="input-group-addon" id="sizing-addon2"><span class="glyphicon glyphicon-pencil"></span></span>
                        <input type="password" id="register_password" class="form-control" name="register_password" placeholder="密码" aria-describedby="sizing-addon2">
                    </div>
                    <p class="register_false col-md-offset-2" id="password_false1">您的密码不能为空</p>
                    <p class="register_false col-md-offset-2" id="password_false2">您的密码不能小于六位，大于十六位</p>
                    <p class="register_true col-md-offset-2" id="password_true">您的密码可以使用</p>
                    <div class="input-group col-md-8 col-md-offset-2 login_input">
                        <span class="input-group-addon" id="sizing-addon2"><span class="glyphicon glyphicon-pencil"></span></span>
                        <input type="password" id="register_password_again" class="form-control" placeholder="确认密码" aria-describedby="sizing-addon2">
                    </div>
                    <p class="register_false col-md-offset-2" id="password_again_false1">您的确认密码不能为空</p>
                    <p class="register_false col-md-offset-2" id="password_again_false2">您两次输入的密码不一致</p>
                    <p class="register_true col-md-offset-2" id="password_again_true">您两次输入的密码一致</p>
                        <div class="row" style="margin: 20px 0">
                            <button type="submit" name="submit" id="register_true" class="btn btn-default col-md-8 col-md-offset-2" disabled="disabled">注册</button>
                        </div>
                        </form>
                </div>
            </div>
            <div class="modal-footer">
                <p style="float: left">没有账号？<span id="login_register">注册</span></p>
            </div>
        </div>
    </div>
</div>
<!-- otherModal -->
<div class="modal fade" id="myOtherModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Modal title</h4>
            </div>
            <div class="modal-body">
                <?php
//                $name=$_COOKIE['buy_name'];
                    echo '<div class="media">';
                    echo '<div class="media-left media-middle">';
                    echo '<a href="#">';
                    echo '<img class="media-object" src="..." alt="...">';
                    echo '</a>';
                    echo '</div>';
                    echo '<div class="media-body">';
                    echo '<h4 class="media-heading"></h4>';
                    echo '</div>';
                    echo '</div>';
                //                    <div class="media">
//  <div class="media-left media-middle">
//    <a href="#">
//      <img class="media-object" src="..." alt="...">
//    </a>
//  </div>
//  <div class="media-body">
//    <h4 class="media-heading">Middle aligned media</h4>
//    ...
//  </div>
//</div>
                ?>
                <input type="text" class="form-control" id="buy_count">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">立即购买</button>
                <button type="button" class="btn btn-primary" id="put_in_car">放入购物车</button>
            </div>
        </div>
    </div>
</div>
</body>
</html>