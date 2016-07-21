<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <title>管理员界面</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/admin.css">
    <script src="js/jquery2.0.0.min.js"></script>
    <script src="js/jquery.cookie.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/admin.js"></script>
</head>
<body>
<div class="col-md-2 function_list">
    <p id="top_box_btn">图书畅销榜</p>
    <p id="expect_box_btn">图书期待榜</p>
    <p id="more_box_btn">更多图书</p>
    <a href="book_main.php"><p>&nbsp;&nbsp;返回首页</p></a>
</div>
<div class="col-md-10 function_box">
    <div class="top_box">
        <form action="best_book.php" method="POST" id="best_book" class="col-md-10 col-md-offset-1"  enctype="multipart/form-data">
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="best_book_name">书名</label>
                    <input type="text" class="form-control" id="best_book_name" name="best_book_name" placeholder="" required>
                </div>
                <div class="form-group col-md-5 col-md-offset-1">
                    <label for="best_book_author">作者</label>
                    <input type="text" class="form-control" id="best_book_author" name="best_book_author" placeholder="" required>
                </div>
            </div>
            <div class="form-group">
                <label for="best_book_information">简介</label>
                <input type="text" class="form-control" id="best_book_information" name="best_book_information" placeholder="" required>
            </div>
            <div class="row">
                <div class="form-group col-md-4">
                <label for="exampleInputFile">封面</label>
                <input type="file" id="exampleInputFile" name="file">
                <p class="help-block">请选择图片</p>
            </div>
            <div class="form-group col-md-4 col-md-offset-1">
                <label style="display: block">名次</label>
                <label class="radio-inline">
                    <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="1"> 第一
                </label>
                <label class="radio-inline">
                    <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="2"> 第二
                </label>
                <label class="radio-inline">
                    <input type="radio" name="inlineRadioOptions" id="inlineRadio3" value="3"> 第三
                </label>
            </div>
            </div>
            <button type="submit" name="submit" id="top_true" class="btn btn-default">确认</button>
        </form>
    </div>
    <div class="expect_box">
        <form action="expect_book.php" method="POST" id="expect_book" class="col-md-10 col-md-offset-1"  enctype="multipart/form-data">
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="expect_book_name">书名</label>
                    <input type="text" class="form-control" id="expect_book_name" name="expect_book_name">
                </div>
                <div class="form-group col-md-5 col-md-offset-1">
                    <label for="expect_book_author">作者</label>
                    <input type="text" class="form-control" id="expect_book_author" name="expect_book_author">
                </div>
            </div>
            <div class="form-group">
                <label for="expect_book_information">简介</label>
                <input type="text" class="form-control" id="expect_book_information" name="expect_book_information">
            </div>
            <div class="row">
                <div class="form-group col-md-4">
                    <label for="exampleInputFile">封面</label>
                    <input type="file" id="exampleInputFile" name="file2">
                    <p class="help-block">请选择图片</p>
                </div>
                <div class="form-group col-md-5 col-md-offset-1">
                    <label style="display: block">名次</label>
                    <label class="radio-inline">
                        <input type="radio" name="expectRadioOptions" id="inlineRadio1" value="1"> 第一
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="expectRadioOptions" id="inlineRadio2" value="2"> 第二
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="expectRadioOptions" id="inlineRadio3" value="3"> 第三
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="expectRadioOptions" id="inlineRadio4" value="4"> 第四
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="expectRadioOptions" id="inlineRadio5" value="5"> 第五
                    </label>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <label for="expect_book_oldprice">原价</label>
                    <div class="input-group">
                        <span class="input-group-addon" id="basic-addon1">￥</span>
                        <input type="text" id="expect_book_oldprice" name="expect_book_oldprice" class="form-control">
                    </div>
                </div>
                <div class="col-md-4 col-md-offset-1">
                    <label for="expect_book_price">折后价格</label>
                    <div class="input-group">
                        <span class="input-group-addon" id="basic-addon1">￥</span>
                        <input type="text" id="expect_book_price" name="expect_book_price" class="form-control">
                    </div>
                </div>
            </div>
            <button type="submit" name="submit" id="expect_true" class="btn btn-default">确认</button>
        </form>
    </div>
    <div class="more_box">
        <form action="more_book.php" method="POST" id="more_book" class="col-md-10 col-md-offset-1" enctype="multipart/form-data">
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="more_book_name">书名</label>
                    <input type="text" class="form-control" id="more_book_name" name="more_book_name">
                </div>
                <div class="form-group col-md-5 col-md-offset-1">
                    <label for="more_book_author">作者</label>
                    <input type="text" class="form-control" id="more_book_author" name="more_book_author">
                </div>
            </div>
            <div class="form-group">
                <label for="more_book_information">简介</label>
                <input type="text" class="form-control" id="more_book_information" name="more_book_information">
            </div>
            <div class="row">
                <div class="form-group col-md-3">
                    <label for="more_book_kind">类型</label>
                    <input type="text" class="form-control" id="more_book_kind" name="more_book_kind">
                </div>
                <div class="form-group col-md-3 col-md-offset-1">
                    <label for="more_book_put_time">出版日期</label>
                    <input type ="date" class="form-control" name ="more_book_put_time" id="more_book_put_time">
<!--                    <input type="text" class="form-control" id="more_book_author" name="more_book_author">-->
                </div>
                <div class="form-group col-md-4 col-md-offset-1">
                    <label for="more_book_publish">出版社</label>
                    <input type="text" class="form-control" id="more_book_publish" name="more_book_publish">
<!--                    <input type ="date" class="form-control" name ="date">-->
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-4">
                    <label for="exampleInputFile">封面</label>
                    <input type="file" id="exampleInputFile" name="file3">
                    <p class="help-block">请选择图片</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <label for="more_book_oldprice">原价</label>
                    <div class="input-group">
                        <span class="input-group-addon" id="basic-addon1">￥</span>
                        <input type="text" id="more_book_oldprice" name="more_book_oldprice" class="form-control">
                    </div>
                </div>
                <div class="col-md-4 col-md-offset-1">
                    <label for="more_book_price">折后价格</label>
                    <div class="input-group">
                        <span class="input-group-addon" id="basic-addon1">￥</span>
                        <input type="text" id="more_book_price" name="more_book_price" class="form-control">
                    </div>
                </div>
                <div class="col-md-2">
                    <label for="more_book_littleprice">小数</label>
                    <div class="input-group">
                        <span class="input-group-addon" id="basic-addon1">.</span>
                        <input type="text" id="more_book_littleprice" name="more_book_littleprice" class="form-control">
                    </div>
                </div>
            </div>
            <button type="submit" name="submit" id="more_true" class="btn btn-default">确认</button>
        </form>
    </div>
</div>
</body>
</html>