<?php
require ('test.php');
$name = $_POST['name'];
$q="DELETE FROM buy_car WHERE buy_thing='$name'";
@mysqli_query($con, $q);