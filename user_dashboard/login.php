<?php
session_start();
require('dashbord_includes/config.php');
if (isset($_SESSION['email'])) {
  header('Location: /nutriverse/user_dashboard/dashboard.php');
  exit();
}
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Nutriverse Login</title>
  <link rel="shortcut icon" type="image/png" href="dist/icons/favicon.png"/>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <div
      class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
      <div class="d-flex align-items-center justify-content-center w-100">
        <div class="row justify-content-center w-100">
          <div class="col-md-8 col-lg-6 col-xxl-3">
            <div class="card mb-0">
              <div class="card-body">
                <a href="../index.php" class="text-nowrap logo-img text-center d-block py-3 w-100">
                  <img src="dist/icons/logo.png" width="180" alt="Site Logo">
                </a>
                <p class="text-center">Nutriverse Login</p>
                <form method="POST">
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
                  </div>
                  <div class="mb-4">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" name="pass">
                  </div>
                  <input type="hidden" name="sub">
                  <input type="submit" value="Login" class="btn w-100 py-8 fs-5 mb-4 rounded-2" style="background-color:#FF8C00; color:#fff;">
                  <div class="d-flex align-items-center justify-content-center">
                    <p class="fs-7 mb-0">New to Nutriverse?</p>
                    <a class="text-primary ms-2" href="signup.php">Create an account</a>
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

</html>

<?php
if (isset($_POST['sub'])) {
  session_start();
  $email = $_POST['email'];
  $pass = $_POST['pass'];
  if (!empty($email) && !empty($pass)) {

    $select = "SELECT * FROM `users` WHERE `Email` = '$email' AND `Password` = '$pass'";
    $select_query = mysqli_query($con, $select);
    if ($select_query) {
      $fetch = mysqli_fetch_assoc($select_query);
      $fetch_email = $fetch['Email'];
      $fetch_pass = $fetch['Password'];
      if ($email == $fetch_email && $pass == $fetch_pass) {
        $_SESSION['email'] = $fetch['Email'];
        $_SESSION['username'] = $fetch['Name'];
        header('location: dashboard.php');
      } else {
?>
        <script>
          alert('Incorrect Email or Password');
        </script>
      <?php
      }
    } else {
      ?>
      <script>
        alert('Login Error!');
      </script>
    <?php
    }
  } else {
    ?>
    <script>
      alert('Fill Correctly');
    </script>
<?php
  }
}
?>