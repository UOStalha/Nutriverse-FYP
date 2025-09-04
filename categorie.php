<!-- header---here -->
<?php include 'include/header.php'?>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600&display=swap" rel="stylesheet">
<style type="text/css">

    #hero2
    {
    	 position: relative;
		  background-position: bottom center; 
		  background-image: linear-gradient(rgba(37,35,42,1),rgba(37,35,42,0.51)),url("assets/img/food-1.jpeg");
		  width: 100%;
		  height: 60vh;
		  background-repeat: no-repeat;
		  background-size: cover;

    }
    .heading h1
    {
    	letter-spacing: 10px;
    	font-family: 'Montserrat', sans-serif;
    	text-transform: uppercase;
    }
</style>
<?php include ('include/navbar.php')?>

<!--------- box----------  -->

<section id="hero2" class="d-flex align-items-center justify-content-center">
  <div class="container" data-aos="fade-up">
    <div class="row justi-cfyontent-center" data-aos="fade-up" data-aos-delay="150">
      <div class="col-xl-12 col-lg-8">
        	<a href="#" class="heading">
        		<h1 class="text-center display-5">All Categories</h1>
        	</a>
      </div>
    </div>
  </div>
</section><!-- End Hero -->




<section id="categorie">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12">
				 <div class="section-title">
	        <h2>CATEGORIES</h2>
	        <p>Categories</p>
      	 </div>
			</div>

			<div class="row">
        <?php
        $cat = "SELECT * FROM categories";
        $cat_qry = mysqli_query($con, $cat);
        while ($row = mysqli_fetch_array($cat_qry)) {
        ?>
          <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 mt-5">
            <form method="get" class="form" action="all_product.php">
            <div class="box-view p-4">
              <div class="img-view">
                <img src="dashboard/<?php echo $row['category_image'] ?>" class="img">
              </div>
              <div class="view-text text-center">
                  <button type="submit" class="btn cat_button" name="cat_search" value="<?php echo $row['category_name'] ?>">
                    <h1><?php echo $row['category_name'] ?></h1>
                  </button>
              </div>
            </div>
            </form>

          </div>
        <?php
        }
        ?>
      </div>


		</div>
	</div>
</section>



<?php include 'include/footer.php'?>