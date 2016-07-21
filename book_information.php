<!DOCTYPE html>
<html lang="en" xmlns:100px>
<head>
    <meta charset="UTF-8">
    <title>买买买</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/book_information.css">
    <script src="js/jquery2.0.0.min.js"></script>
    <script src="js/jquery.cookie.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/book_information.js"></script>
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
                <input type="text">
            </div>
            <div class="col-md-1">
                <span class="glyphicon glyphicon-search"></span>
            </div>
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
<div class="information_in row">
    <div class="col-md-10 col-md-offset-1">
        <div class="book_img col-md-4">
            <?php
            require ('test.php');
            $jjj = $_GET['buy_name'];
            $q = "SELECT * FROM more_book WHERE more_book_name='$jjj'";
            $ra = mysqli_fetch_array(@mysqli_query($con, $q));
            echo '<img src="'.$ra['more_book_img'].'">';
            ?>
<!--            <img src="img/big2.jpg">-->
        </div>
        <?php
        echo '<div class="col-md-8" data-book="'.$ra['more_book_name'].'">';
        ?>
<!--        <div class="col-md-8">-->
            <div class="col-md-12 book_name">
                <?php
                echo '<h3>《'.$ra['more_book_name'].'》</h3>';
                echo '<p>'.$ra['more_book_information'].'</p>';
                ?>
<!--                <h3>《极花》</h3>-->
<!--                <p>贾平凹2016新长篇小说，写被拐卖的女子胡蝶，也是写作家内心的恐惧与无奈，更是写作家对乡村沦落的担忧</p>-->
            </div>
            <div class="col-md-12 book_buy_box">
                <?php
                echo '<p>作者:'.$ra['more_book_author'].' &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;出版社:'.$ra['more_book_publish'].' &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;出版时间:'.$ra['more_book_put_time'].'</p>';
                ?>
<!--                <p>作者:贾平凹 出版社:人民文学出版社 出版时间:2016年4月</p>-->
                <div class="price_box">
                    <?php
                    echo '<p>原价&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;￥'.$ra['more_book_oldprice'].'</p>';
                    echo '<p>现价&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>￥'.$ra['more_book_price'].'.'.$ra['more_book_littleprice'].'</span></p>';
                    ?>
<!--                    <p>原价&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;￥27.00</p>-->
<!--                    <p>现价&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>￥23.00</span></p>-->
                </div>
                <div class="form-group col-md-3">
                    <label class="sr-only" for="exampleInputAmount">Amount (in dollars)</label>
                    <div class="input-group">
                        <div class="input-group-addon" id="count_minus">-</div>
                        <input type="text" class="form-control" id="exampleInputAmount" value="1">
                        <div class="input-group-addon" id="count_add">+</div>
                    </div>
                </div>
                <button type="button" class="btn btn-success">立即购买</button>
                <button type="button" class="btn btn-danger" id="buy_btn">放入购物车</button>
            </div>
        </div>
    </div>
</div>
<div class="col-md-10 col-md-offset-1">
    <div class="col-md-3 like_list">
        <h4>同类图书推荐</h4>
        <?php
        $fff=$ra['more_book_kind'];
        $q="SELECT * FROM more_book WHERE id >= ((SELECT MAX(id) FROM more_book)-(SELECT MIN(id) FROM more_book)) * RAND() + (SELECT MIN(id) FROM more_book) AND more_book_publish='$fff' LIMIT 3";
        $r=@mysqli_query($con,$q);
        foreach ($r as $value){
            echo '<div class="media buy" data-buy="'.$value['more_book_name'].'">';
            echo '<div class="media-left">';
            echo '<img class="media-object" src="'.$value['more_book_img'].'" alt="..." style="height: 70px;width: 70px">';
            echo '</div>';
            echo '<div class="media-body">';
            echo '<h5 class="media-heading">'.$value['more_book_information'].'</h5>';
            echo '<p class="information_author">'.$value['more_book_author'].'</p>';
            echo '<p class="information_price">￥'.$value['more_book_price'].'.'.$value['more_book_littleprice'].'</p>';
            echo '</div>';
            echo '</div>';
        }
        ?>
<!--        <div class="media">-->
<!--            <div class="media-left">-->
<!--                <a href="#">-->
<!--                    <img class="media-object" src="img/no1.jpg" alt="..." style="height: 70px;width: 70px">-->
<!--                </a>-->
<!--            </div>-->
<!--            <div class="media-body">-->
<!--                <h5 class="media-heading">岛上书店（没有谁是一</h5>-->
<!--                （美）加布瑞埃拉泽文-->
<!--                ￥22.00-->
<!--            </div>-->
<!--        </div>-->
<!--        <div class="media">-->
<!--            <div class="media-left">-->
<!--                <a href="#">-->
<!--                    <img class="media-object" src="img/no1.jpg" alt="..." style="height: 70px;width: 70px">-->
<!--                </a>-->
<!--            </div>-->
<!--            <div class="media-body">-->
<!--                <h5 class="media-heading">岛上书店（没有谁是一</h5>-->
<!--                （美）加布瑞埃拉泽文-->
<!--                ￥22.00-->
<!--            </div>-->
<!--        </div>-->
<!--        <div class="media">-->
<!--            <div class="media-left">-->
<!--                <a href="#">-->
<!--                    <img class="media-object" src="img/no1.jpg" alt="..." style="height: 70px;width: 70px">-->
<!--                </a>-->
<!--            </div>-->
<!--            <div class="media-body">-->
<!--                <h5 class="media-heading">岛上书店（没有谁是一</h5>-->
<!--                （美）加布瑞埃拉泽文-->
<!--                ￥22.00-->
<!--            </div>-->
<!--        </div>-->
    </div>
    <div class="col-md-9 book_talk">
        <h4>编辑推荐</h4>
        <div class="line row"></div>
        <p>◎  被称为大神的采铜，到底是谁？



            ——知乎第41161号用户，至今为止，他贡献了975个回答，获得了493598个赞同  、  115293次感谢。他的每一次回答，都振聋发聩，引来上万人的喝彩！



            ——被公认为“知乎精神”的代表者之一，他的较真与理想主义在这个浮躁的时代赢得了无数人的点赞！



            ——他曾出版的电子书 知乎「盐」系列之《深度学习的艺术》 《开放的智力》连续84周占领同类书榜首，全五星评价，豆瓣9.4分高分推荐！



            ——《25岁，为什么我仍在一无所有的起点上？》《人长大后就一定要变得很功利很现实吗？》 《如果你的资源贫乏，那么专注做好一件事将是你的唯一出路》……多篇文章引爆互联网各大社区与平台！



            ◎ 被无数人点赞的惊喜之作，是一部什么样的作品？



            ——完美的竞争战略让你远离竞争 ,成功的不二法门是找准支点。这本书为你规划精进之路，帮你找准核心支点，用持续精确的努力，撬动更大的可能。



            ——采铜用手术刀一样的文字，剖开迷宫一般的现实世界，提炼出知识背后的知识、方法背后的方法。



            ——读完这本书只是一个开始，把这本书运用到学习、工作中才是真正的改变；

            全书68道实践练习贴身指导，打造7大精进技能，帮助你实现飞跃！



            ——如果你即将或者已经进入大学，这本书将帮助你打造以一敌百的竞争力；

            如果你已经踏上社会的征途，这本书将让你在短时间内发生质的转变与提升！
        </p>
        <h4>内容推荐</h4>
        <div class="line row"></div>
        <p>盲目的努力，只是一种缓慢的叠加。

            在《精进：如何成为一个很厉害的人》中，作者提出了一种更有效的提升自我的方法：用持续精确的努力，撬动更大的可能，这便是精进。



            这本书为大家提供了时间、选择、行动、学习、思维、才能、成功七个方面的精进路径，只要依循书中的方法反复磨练，便可以日益精进，成为一个很厉害的人，找到实现自我的那条成功之道。



            这本书将帮助你——



            ◎  建立平衡的【时间】观，度过真正有质量的人生

            ◎  建立选择标准，解决【选择】中的两难困境，找到适合选项

            ◎  高效、即刻行动，在【行动】中增长智慧

            ◎  通过提问、解码、操练、融合，成为高段位的【学习】者

            ◎  了解潜意识特性，借助【思维】工具，突破大脑的限制

            ◎  优化个人资源，有策略地培养后天【才能】，成长为T型人才

            ◎  找到你的独特性，开辟个人独一无二的【成功】之路
        </p>
        <h4>在线试读部分章节</h4>
        <div class="line row"></div>
        <p>不痛苦地坚持到底

            （只有深入下去，才能培养出真正的兴趣）

            意志力只是一个神话

            当一件需要长期坚持的事情摆在我们面前时，我们总喜欢谈论意志力的重要性，好像只要你意志力足够强，你就能坚持到底一样。而如果你没有坚持到底，那一定是意志力的原因。我从没有相信过这种意志力的神话。在我看来，意志力是非常不可靠的，你越强调它，越依赖它，你中途放弃的可能性就越大。因为意志力总有可以承受的极限，就像一根已经绷得很紧的绳子，若是再用力的话，随时都会绷断。

            如果我能长期坚持去做一件事，一定是这件事带给我的丰盈感和满足感超过了我的所有付出，一定是这件事日日夜夜萦绕在我的心头让我欲罢不能，一定是这件事唤起了我内心深处最强烈的兴趣。也就是说，赐予我力量的，是激情的驱动，而不是意志力的鞭策。

            这种想法不只是我独有，科学研究也证实了这一点。心理学家爱德华·德西（EdwardDeci）通过实验发现，在兴趣这种内部动机的驱动下，人们完成同一任务的表现比在物质奖励的驱动下更好。

            可现在这个时代，很多人同时患上了“兴趣饥渴症”和“兴趣寡淡症”。人们很想知道自己到底喜欢什么，所以做了很多尝试，但是不论怎么尝试，过不了几天、几个星期最初的激情就差不多消失殆尽。

            如果对一件事的了解不深、不透，总是浅尝辄止，那自然体会不到这件事的妙处，也自然不会产生持久的兴趣。这让人容易滑入一个死循环：了解不够导致兴趣不足，而兴趣不足又无法加深对它的了解。

            另一个原因是，人总是喜欢轻易地作评判、下定论、贴标签，用过于简单的概括来代替细致深入的观察。可是，在你还没有深入了解一件事情之前，你对它的判断很可能会差得十万八千里。这像是另一个死循环：由于了解不足而判断失误，而判断失误又妨碍了深入了解。

            越是急于寻找自己“真正的”兴趣，就越是寻觅不到，因为这个急于求成的心态，常使我们浅尝辄止或者妄加评判，消耗了我们原本就不多的耐心，使我们离“真正的”兴趣越来越远。
        </p>
    </div>
</div>

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
</body>