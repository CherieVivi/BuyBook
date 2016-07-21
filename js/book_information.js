/**
 * Created by ys-iww on 2016/4/30.
 */
function isPositiveNum(s){//是否为正整数
    var re = /^[0-9]*[1-9][0-9]*$/ ;
    return re.test(s)
}
$(document).ready(function(){
    $("#buy_btn").click(function () {
        // var buy_name = $(this).attr("data-buy");
        var buy_name = $(this).parent().parent().attr("data-book");
        var count = $("#exampleInputAmount").val();
        if(isPositiveNum(count)) {

            // $.cookie('buy_name',buy_name);
            // $.cookie('buy_name',buy_name);
            // $('#myOtherModal').modal('show');
            // $('#put_in_car').click(function () {
            if ($.cookie('user_name')) {
                var user_name = $.cookie('user_name');
                // var count = $("#buy_count").val();
                // alert(buy_name);
                $.ajax("buy_car.php", {
                    type: "POST",
                    data: {
                        buy_name: buy_name,
                        user_name: user_name,
                        count: count
                    }
                });
                // alert($.cookie('buy_name'));
            } else {
                // $('#myOtherModal').modal('hide');
                $('#myModal').modal('show');
            }
            // });
        }else {
            alert("请输入正确的数量")
        }
    });
    $("#count_minus").click(function () {
        if($("#exampleInputAmount").val()>=2){
            $("#exampleInputAmount").val(parseInt($("#exampleInputAmount").val())-1);
        }
    });
    $("#count_add").click(function () {
        if($("#exampleInputAmount").val()>=1) {
            $("#exampleInputAmount").val(parseInt($("#exampleInputAmount").val())+1);
        }
    });
});