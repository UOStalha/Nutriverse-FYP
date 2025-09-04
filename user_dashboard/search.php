<?php
session_start();
include 'dashbord_includes/config.php';

if (isset($_POST['query'])) {
    $search = mysqli_real_escape_string($con, $_POST['query']);

    $sql = "SELECT * FROM `category_details` WHERE `content_title` LIKE '%$search%'";
    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo "<ul>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<li><strong>" . htmlspecialchars($row['content_title']) . " : </strong>" . "<span>" .htmlspecialchars($row['add_calories']) . " calories</span>" . "</li>";
        }
        echo "</ul>";
    } else {
        echo "<p>No food items found.</p>";
    }
}
?>