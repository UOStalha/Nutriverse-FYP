<style>
  .login{
    padding: 4px 12px!important;
    border-radius: 10px;
    border: 1px solid #FF8C00;
    color: #FF8C00 !important;
  }
  .login{
    margin: 0 10px 0 30px !important;
  }
  .login:hover{
    background-color: #FF8C00;
    border: 1px solid transparent;
    color:#fff !important;
  }
  .signup{
    background-color: #FF8C00;
    padding: 4px 12px!important;
    border-radius: 10px;
    border: 1px solid transparent;
  }
  .signup:hover{
    background-color: transparent;
    border: 1px solid #FF8C00;
  }
</style>

<form method="GET" action="main_search.php">
   <header class="header fixed-top" id="header">

     <a href="index.php" class="logo">
       <img src="assets/img/logo.png" alt="">
     </a>

     <nav class="navbar">
       <a href="index.php">Home</a>
       <a href="compare_product.php">Compare Dishes</a>
       <a href="categorie.php">All Categories</a>
       <a href="all_product.php">All Dishes</a>
       <a href="blog.php">Blog</a>
       <a href="calculate-calories.php">Calculate Calories</a>
       <a href="user_dashboard/login.php" target="_blank" class="login">Login</a>
       <a href="user_dashboard/signup.php" target="_blank" class="signup">Sign Up</a>
     </nav>

     <!-- <div class="icons">
       <div class="fas fa-search" id="search-btn"></div>
       <div class="fas fa-bars" id="menu-btn"></div>
     </div> -->


     <!-- <div class="search-form"> -->
       <?php
        error_reporting(0);
        $cat_id = $_GET['cat_id'];
        if ($cat_id == '') {
          $data = "SELECT * FROM `category_details`";
        } else {
          $data = "SELECT * FROM `category_details` WHERE `add_calories` LIKE '%$cat_id%' OR `content_title` LIKE '%$cat_id%' OR `incridients` LIKE '%$cat_id%' OR `type` LIKE '%$cat_id%' OR `fats` LIKE '%$cat_id%' OR `cholesterol` LIKE '%$cat_id%' OR `sodium` LIKE '%$cat_id%' OR `potassium` LIKE '%$cat_id%' OR `carbohydrate` LIKE '%$cat_id%' OR `protein` LIKE '%$cat_id%'";
        }
        $res = mysqli_query($con, $data);

        ?>
       <!-- <input type="search" name=   "cat_id" id="search-box" placeholder="search here..."> -->
       <!-- <label for="search-box" class="fas fa-search"></label> -->
     <!-- </div> -->
   </header>
 </form>