$(document).ready(function(){
    $(".delete_btn").click(function () {
        var name = $(this).attr("data-buy_name");
        $(this).parent().parent().css("display","none");
        $.ajax("delete_list.php",{
            type:"POST",
            data:{name:name}
        });
    });
});