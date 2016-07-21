$(document).ready(function(){
    // if($.cookie("user_name")=='admmin'){
    //
    // }
    $("#login_btn").click(function () {
        if($.cookie('user_name')){
            alert("您已登录，是否要重新登录");
        }
    });
    $("#login_register").click(function () {
        $(".login_box").toggle(0);
        $(".register_box").toggle(0);
    });
    var reg_name = "";
    var reg_name_again = "";
    var reg_password = "";
    var reg_password_again = "";
    function chkreg() {
        if(reg_name&&reg_password&&reg_password_again){
            $("#register_true").removeAttr("disabled");
        }else{
            $("#register_true").attr("disabled","disabled");
        }
    }

    $("#register_name").keyup(function () {
        $("#name_false1,#name_false2,#name_false3,#name_true").css("display","none");
    });
    $("#register_name").keyup(function () {
        var str_name = $("#register_name").val();
        var re = /[^\w]/g;
        if(str_name==""){
            $("#name_false1").css("display","block");
            reg_name=false;
        }
        else if(str_name.match(re)){
            $("#name_false2").css("display","block");
            reg_name=false;
        }
        else{
            reg_name=true;
        }
        chkreg()
    });
    $("#register_password").keyup(function () {
        $("#password_false1,#password_false2,#password_true").css("display","none");
    });
    $("#register_password").keyup(function () {
        var str_password = $("#register_password").val();
        var re = /./g;
        if(str_password==""){
            $("#password_false1").css("display","block");
            reg_password = "";
        }
        else if(str_password.match(re).length<6||str_password.match(re).length>16){
            $("#password_false2").css("display","block");
            reg_password = "";
        }
        else{
            $("#password_true").css("display","block");
            reg_password = true;
        }
        chkreg()
    });
    $("#register_password_again").keyup(function () {
        $("#password_again_false1,#password_again_false2,#password_again_true").css("display","none");
    });
    $("#register_password_again").keyup(function () {
        var str_password = $("#register_password").val();
        var str_password_again = $("#register_password_again").val();
        if(str_password_again==""){
            $("#password_again_false1").css("display","block");
            reg_password_again = "";
        }
        else if(str_password_again!=str_password){
            $("#password_again_false2").css("display","block");
            reg_password_again = "";
        }
        else{
            $("#password_again_true").css("display","block");
            reg_password_again = true;
        }
        chkreg()
    });
    $("#register_name").blur(function () {
        var name = $("#register_name").val();
        // alert(name);
        if(reg_name){
            $.ajax("chkname.php",{
                type:"POST",
                data:{name:name},
                success:function(data){
                    if(data=='false'){
                        $("#name_false3").css("display","block");
                        reg_name = false;
                    }else if(data=='success'){
                        $("#name_true").css("display","block");
                        reg_name = true;
                    }
                }
            });
        }
    });
    // $(".buy").click(function () {
    //     var buy_name = $(this).attr("data-buy");
    //     // $.cookie('buy_name',buy_name);
    //     // $.cookie('buy_name',buy_name);
    //     // $('#myOtherModal').modal('show');
    //     // $('#put_in_car').click(function () {
    //         if ($.cookie('user_name')) {
    //             var user_name = $.cookie('user_name');
    //             var count = $("#buy_count").val();
    //             // alert(buy_name);
    //             $.ajax("buy_car.php", {
    //                 type: "POST",
    //                 data: {
    //                     buy_name: buy_name,
    //                     user_name: user_name
    //                     // count: count
    //                 }
    //             });
    //             // alert($.cookie('buy_name'));
    //         } else {
    //             // $('#myOtherModal').modal('hide');
    //             $('#myModal').modal('show');
    //         }
    //     // });
    // });
    $(".buy").click(function () {
        var buy_name = $(this).attr("data-buy");
        $.ajax("book_information.php", {
            type: "GET",
            data: {
                buy_name: buy_name
                // user_name: user_name
                // // count: count
            },
            success:function () {
                location.href="book_information.php?buy_name="+buy_name;
            }
        });
    });
    $("#buy_car_btn").click(function () {
        if($.cookie("user_name")&&$.cookie("user_name")!='admin'){
            location.href="buy_car_list.php";
        }else if($.cookie("user_name")=='admin'){
            location.href="admin_function.php";
        }
        else {
            $('#myModal').modal('show');
        }
    });
    $(".li_btn").click(function () {
        var book_kind = $(this).text();
        $.ajax("book_information.php", {
            type: "GET",
            data: {
                kind:book_kind
                // user_name: user_name
                // // count: count
            },
            success:function () {
                location.href="kind_list.php?kind="+book_kind;
            }
        });
    });
    $(".expect_btn").mouseover(function () {
        $(".expect_btn").css("display","block");
        $(this).css("display","none");
        $(".one_expect").css("display","none");
        $(this).next().css("display","block");
    })
});
