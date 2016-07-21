<?php
require ('test.php');
$name = $_POST['name'];
$sql = "select * from users where user_name='$name'";
$result = @mysqli_query($con, $sql);
$num_rows = mysqli_num_rows($result);
if($num_rows==1){
    echo 'false';
}else if($num_rows==0){
    echo 'success';
}else{
    echo '错误';
}
