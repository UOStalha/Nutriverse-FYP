<?php
session_start();
include 'dashbord_includes/config.php';

if(isset($_POST['food_name']) && isset($_POST['calories'])) {
    $user_id = $_SESSION['user_id'];
    $food_name = mysqli_real_escape_string($con, $_POST['food_name']);
    $calories = (int)$_POST['calories'];
    
    $sql = "INSERT INTO user_calorie_intake (user_id, food_name, calories) 
            VALUES ($user_id, '$food_name', $calories)";
    
    if(mysqli_query($con, $sql)) {
        echo "success";
    }
}
?>