<?php
require('dashbord_includes/config.php');
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Nutriverse Sign Up</title>
  <link rel="shortcut icon" type="image/png" href="dist/icons/favicon.png" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
</head>

<body>
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <div class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
      <div class="d-flex align-items-center justify-content-center w-100">
        <div class="row justify-content-center w-100">
          <div class="col-md-8 col-lg-6 col-xxl-3 mt-5 mb-5">
            <div class="card mb-0">
              <div class="card-body">
                <a href="../index.php" class="text-nowrap logo-img text-center d-block py-3 w-100">
                  <img src="dist/icons/logo.png" width="180" alt="Site Logo">
                </a>
                <p class="text-center">Nutriverse Sign Up</p>
                <form method="POST">
                  <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" required>
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Email Address</label>
                    <input type="email" class="form-control" name="email" required>
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" class="form-control" name="pass" required>
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Age</label>
                    <input type="number" class="form-control" min="10" max="100" name="age" required>
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Gender</label>
                    <select class="form-control" name="gender" required>
                      <option value="" selected disabled>Select Gender</option>
                      <option value="Male">Male</option>
                      <option value="Female">Female</option>
                    </select>
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Height (cm)</label>
                    <input type="number" class="form-control" min="70" max="250" name="height" required>
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Weight (kg)</label>
                    <input type="number" class="form-control" min="20" max="300" name="weight" required>
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Activity</label>
                    <select class="form-control" name="activity" required>
                      <option value="" disabled selected>Select Activity Level</option>
                      <option value="1">Sedentary (little or no exercise)</option>
                      <option value="2">Lightly active (1-3 days/week)</option>
                      <option value="3">Moderately active (3-5 days/week)</option>
                      <option value="4">Very active (6-7 days/week)</option>
                      <option value="5">Extra active (very hard exercise)</option>
                    </select>
                  </div>
                  <input type="hidden" name="sub">
                  <input type="submit" value="Sign Up" class="btn w-100 py-8 fs-5 mb-4 rounded-2" style="background-color:#FF8C00; color:#fff;">
                  <div class="d-flex align-items-center justify-content-center">
                    <p class="fs-7 mb-0">Already have an Account?</p>
                    <a class="text-primary ms-2" href="login.php">Sign In</a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</body>

</html>


<?php
if (isset($_POST['sub'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $pass = $_POST['pass'];
  $age = $_POST['age'];
  $gender = $_POST['gender'];
  $height = $_POST['height'];
  $weight = $_POST['weight'];
  $activity = $_POST['activity'];

  if (!empty($name) && !empty($email) && !empty($pass) && !empty($age) && !empty($gender) && !empty($height) && !empty($weight) && !empty($activity)) {

    $check_email = "SELECT email FROM `users` WHERE email = '$email'";
    $check_query = mysqli_query($con, $check_email);
    $email_exists = mysqli_fetch_assoc($check_query);

    if ($email_exists) {
?>
      <script>
        alert('Email already exists! Please use a different email.');
      </script>
      <?php
    } else {
      $insert = "INSERT INTO `users` VALUES (`ID`, '$name', '$email', '$pass', '$age', '$gender', '$weight', '$height', '$activity')";
      $insert_query = mysqli_query($con, $insert);

      if ($insert_query) {
      ?>
        <script>
          window.location = 'login.php';
        </script>
      <?php
      } else {
      ?>
        <script>
          alert('Registration Error! Please try again.');
        </script>
    <?php
      }
    }
  } else {
    ?>
    <script>
      alert('Please fill all the fields correctly.');
    </script>
<?php
  }
}
?>