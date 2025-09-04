<?php
session_start();
include 'dashbord_includes/config.php';

$user_id = $_SESSION['user_id'];
$sql = "DELETE FROM user_calorie_intake 
        WHERE user_id = $user_id";

if(mysqli_query($con, $sql)) {
    echo "success";
}
?>