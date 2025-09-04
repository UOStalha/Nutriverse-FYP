<?php
session_start();
if (!isset($_SESSION['email'])) {
  header('Location: /nutriverse/user_dashboard/login.php');
  exit();
}

include 'dashbord_includes/header.php';
include 'dashbord_includes/topbar.php';
include 'dashbord_includes/sidebar.php';

$email = $_SESSION['email'];
$query = "SELECT * FROM users WHERE email = '$email'";
$result = mysqli_query($con, $query);
$user = mysqli_fetch_assoc($result);
?>

<div class="content-wrapper">
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Update Profile</h3>
            </div>

            <form method="POST" action="">
              <div class="card-body">
                <div class="form-group">
                  <label for="name">Name</label>
                  <input type="text" name="name" class="form-control" value="<?php echo $user['Name']; ?>" required>
                </div>
                <div class="form-group">
                  <label for="age">Age</label>
                  <input type="number" name="age" min="10" max="100" class="form-control" value="<?php echo $user['Age']; ?>" required>
                </div>
                <div class="form-group">
                  <label for="weight">Weight (kg)</label>
                  <input type="number" step="0.1" name="weight" min="20" max="300" class="form-control" value="<?php echo $user['Weight']; ?>" required>
                </div>
                <div class="form-group">
                  <label for="height">Height (cm)</label>
                  <input type="number" step="0.1" name="height" min="70" max="250" class="form-control" value="<?php echo $user['Height']; ?>" required>
                </div>
                <div class="form-group">
                  <label for="gender">Gender</label>
                  <select name="gender" class="form-control" required>
                    <option value="Male" <?php echo ($user['Gender'] == 'Male') ? 'selected' : ''; ?>>Male</option>
                    <option value="Female" <?php echo ($user['Gender'] == 'Female') ? 'selected' : ''; ?>>Female</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="activity">Activity</label>
                  <select name="activity" class="form-control" required>
                    <option value="" disabled selected>Select Activity Level</option>
                    <option value="1" <?php echo ($user['Activity'] == '1') ? 'selected' : ''; ?>>Sedentary (little or no exercise)</option>
                    <option value="2" <?php echo ($user['Activity'] == '2') ? 'selected' : ''; ?>>Lightly active (1-3 days/week)</option>
                    <option value="3" <?php echo ($user['Activity'] == '3') ? 'selected' : ''; ?>>Moderately active (3-5 days/week)</option>
                    <option value="4" <?php echo ($user['Activity'] == '4') ? 'selected' : ''; ?>>Very active (6-7 days/week)</option>
                    <option value="5" <?php echo ($user['Activity'] == '5') ? 'selected' : ''; ?>>Extra active (very hard exercise)</option>
                  </select>
                </div>
              </div>
              <div class="card-footer">
                <input type="submit" class="btn" name="updateProfile" value="Update Profile" style="background-color:#FF8C00; color:#fff;">
              </div>
            </form>

            <?php
            if (isset($_POST['updateProfile'])) {
              $name = $_POST['name'];
              $age = $_POST['age'];
              $weight = $_POST['weight'];
              $height = $_POST['height'];
              $gender = $_POST['gender'];
              $activity = $_POST['activity'];

              $sql = "UPDATE `users` SET `name` = '$name', `age` = '$age', `weight` = '$weight', `height` = '$height', `Gender` = '$gender', `Activity` = '$activity' WHERE `email` = '$email'";
              $run = mysqli_query($con, $sql);

              if ($run) {
                echo "<script>alert('Profile updated successfully'); window.location.href='profile.php';</script>";
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