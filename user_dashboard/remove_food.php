<?php
session_start();
include 'dashbord_includes/config.php';

if (isset($_POST['food_id'])) {
    $food_id = $_POST['food_id'];

    $remove = "DELETE FROM `user_calorie_intake` WHERE `id` = $food_id";
    $remove_query = mysqli_query($con, $remove);

    if ($remove_query) {
        echo 'success';
    }
}
?>
