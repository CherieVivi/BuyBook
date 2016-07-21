$(document).ready(function(){
    $(".function_list").css("height",$(window).height());
    $(window).resize(function(){
        $(".function_list").css("height",$(window).height());
    });
    $("#top_box_btn").click(function () {
        $("#top_box_btn,#expect_box_btn,#more_box_btn").css({
            backgroundColor : "#FF4040",
            color:"#ffffff"
        });
        $("#top_box_btn").css({
            backgroundColor : "#ffffff",
            color:"red"
        });
        $(".top_box,.expect_box,.more_box").css("display","none");
        $(".top_box").css("display","block")
    });
    $("#expect_box_btn").click(function () {
        $("#top_box_btn,#expect_box_btn,#more_box_btn").css({
            backgroundColor : "#FF4040",
            color:"#ffffff"
        });
        $("#expect_box_btn").css({
            backgroundColor : "#ffffff",
            color:"red"
        });
        $(".top_box,.expect_box,.more_box").css("display","none");
        $(".expect_box").css("display","block")
    });
    $("#more_box_btn").click(function () {
        $("#top_box_btn,#expect_box_btn,#more_box_btn").css({
            backgroundColor : "#FF4040",
            color:"#ffffff"
        });
        $("#more_box_btn").css({
            backgroundColor : "#ffffff",
            color:"red"
        });
        $(".top_box,.expect_box,.more_box").css("display","none");
        $(".more_box").css("display","block")
    });
});
