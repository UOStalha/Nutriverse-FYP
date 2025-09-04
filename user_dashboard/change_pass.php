<?php
session_start();
if (!isset($_SESSION['email'])) {
  header('Location: /nutriverse/user_dashboard/login.php');
  exit();
}
include 'dashbord_includes/header.php';
include 'dashbord_includes/topbar.php';
include 'dashbord_includes/sidebar.php';
?>

<div class="content-wrapper">
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">CHANGE PASSWORD</h3>
            </div>

            <!-- form start -->
            <form id="quickForm" method="POST" action="">
              <div class="card-body">
                <div class="form-group">
                  <label for="newPassword">NEW PASSWORD</label>
                  <input type="password" name="pass" class="form-control" id="newPassword" placeholder="Enter Your New Password" required>
                </div>
              </div>
              <div class="card-footer">
                <input type="submit" class="btn" name="changepass" value="Submit" style="background-color:#FF8C00; color:#fff;">
              </div>
            </form>

            <?php
            if (isset($_POST['changepass'])) {
              $pass = $_POST['pass'];
              $email = $_SESSION['email'];

              $sql = "UPDATE `users` SET `password` = '$pass' WHERE `email` = '$email'";
              $run = mysqli_query($con, $sql);

              if ($run) {
                echo "<script>alert('Password changed successfully');</script>";
              } else {
                echo "<script>alert('Something went wrong, please try again');</script>";
              }
            }
            ?>

          </div>
        </div>
      </div>
    </div>
  </section>
</div>

<?php
include 'dashbord_includes/footer.php';
?>