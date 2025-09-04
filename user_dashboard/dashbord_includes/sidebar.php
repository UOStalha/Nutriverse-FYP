<?php
// session_start();
if (!isset($_SESSION['email'])) {
  header('Location: /nutriverse/user_dashboard/login.php');
  exit();
}
?>
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="dashboard.php" class="brand-link">
    <img src="dist/icons/logo.png" alt="Nutriverse Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">Nutriverse</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar mt-4">

    <!-- SidebarSearch Form -->
    <div class="form-inline">
      <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-sidebar">
            <i class="fas fa-search fa-fw"></i>
          </button>
        </div>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-3">

      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
          <a href="dashboard.php" class="nav-link active">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>Dashboard</p>
          </a>
        </li>

        <li class="nav-item mt-2">
          <a href="profile.php" class="nav-link">
            <img src="dist/icons/checklist.png" width="20px" alt="">&nbsp;
            <p>Update Profile</p>
          </a>
        </li>



        <li class="nav-item mt-2">
          <a href="change_pass.php" class="nav-link">
            <img src="dist/icons/reset-password.png" width="20px" alt="">&nbsp;
            <p>Change Password</p>
          </a>
        </li>



        <li class="nav-item mt-2">
          <a href="logout.php" class="nav-link">
            <img src="dist/icons/log-out.png" width="20px" alt="">&nbsp;
            <p>Logout</p>
          </a>
        </li>


      </ul>


    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>