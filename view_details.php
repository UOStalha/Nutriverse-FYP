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
    	#header.header-scrolled, #header.header-inner-pages {
   		 background: #333;
		}
    .img img
    {
    	width: 100%;
    	height: 20rem;
    }



 .container-main {
	  margin: 30px;
  width: 100%;
  max-width: 1200px;
  justify-content: center;
  flex-direction: column;
  align-items: center;

}
 h5 {
	 margin: 0;
	 font-size: 14px;
}
 ul {
	 list-style: none;
	 margin: 0;
	 padding: 0;
}
 a {
	 text-decoration: none;
	 color: #af8466;
}
 .product-image {
	 display: flex;
	 flex-direction: column;
	 align-items: center;
	 background: linear-gradient(to bottom, #333 0%, orange 100%);
	 border-radius: 20px 20px 0 0;
	 padding: 55px 0;
	 width: 100%;
	 margin: auto;
}
 .product-pic {
	 max-width: 180px;
	 position: relative;
	 left: 0;
	 margin: 40px 0;
	 filter: drop-shadow(-6px 40px 23px rgba(0, 0, 0, 0.5));
}
 .product-details {
	 padding: 40px;
	 background-color: white;
	 border-radius: 0 0 20px 20px;
}
 .product-details .title {
	 text-transform: uppercase;
	 margin: 0;
}
 .product-details .colorCat {
	 text-transform: uppercase;
	 font-style: italic;
	 color: #bbb;
	 font-weight: 700;
	 font-size: 14px;
}
 .product-details .price {
	 font-weight: 700;
	 margin-top: 5px;
	 font-size: 18px;
}
 .product-details .price .current {
	 color: #fe6168;
	 margin-left: 6px;
}
 .product-details .before {
	 text-decoration: line-through;
}
 .product-details header {
	 margin-bottom: 50px;
	 position: relative;
}
 .product-details article > h5 {
	 margin: 0;
}
 .product-details article > p {
	 color: #af8466;
	 margin: 0.5em 0;
	 font-size: 17px;
	 line-height: 1.6;
}
 .product-details .controls {
	 margin: 3em 0;
}
 .product-details .controls > div {
	 flex: 1;
}
 .product-details article p
 {	
 	color: #af8466;
 }
 .product-details article h4
 {
 	font-weight: 700;
 	color: orange;
 }
 
 
 @media (min-width: 56.25em) {
	 .container-main {
		 display: flex;
		 flex-direction: row;
		 align-items: normal;
		 margin: auto;
	}
	 .product-image {
		 border-radius: 20px 0 0 20px;
		 max-width: 330px;
	}
	 .product-pic {
		 left: -40px;
		 max-width: 330px;
	}
	 .product-details {
		 width: 100%;
		 border-radius: 0 20px 20px 0;
	}
}
  
</style>
<?php include ('include/navbar.php')?>

<!--------- box----------  -->

<section id="hero2" class="d-flex align-items-center justify-content-center">
  <div class="container" data-aos="fade-up">
    <div class="row justi-cfyontent-center" data-aos="fade-up" data-aos-delay="150">
      <div class="col-xl-12 col-lg-8">
        	<a href="#" class="heading">
        		<h1 class="text-center display-5">View Details</h1>
        	</a>
      </div>
    </div>
  </div>
</section><!-- End Hero -->



<section>

<?php 

	$dis = $_GET['cat_id'];
	$sql = "SELECT * FROM category_details WHERE content_title = '$dis'";
  $run = $con->query($sql);	
  while ($fetch = $run->fetch_assoc()) {

 ?>

	<div class="container-main">
	  <div class="product-image">
	    <img src="dashboard/<?php echo $fetch['image']; ?>" alt="" class="product-pic">
	  </div>
	  <div class="product-details">
	    <header>
	      <h1 class="title"><?php echo $fetch['content_title']; ?></h1>
	      <span class="colorCat">Type : <?php echo $fetch['type']; ?></span>
	      <div class="price">
	        <span class="current">Total Calories : <?php echo $fetch['add_calories']; ?> g</span>
	      </div>
	    </header>




	    <article>
	      <h4>INGREDIENTS :</h4>
	      <p><?php echo $fetch['incridients']; ?></p>
	    </article>
	   	 <article class="mt-4" >
					<h4>NUTRITION FATS :</h4>
	    	<table class="table text-center table-bordered">
				  <thead>
				    <tr>
				      <th scope="col">Fats</th>
				      <td scope="col" ><?php echo $fetch['fats']; ?> g</td>
				    </tr>
				  </thead>
				  <tbody >
				    <tr>
				      <th scope="col">cholesterol</th>
				      <td scope="col" style="text-transform: lowercase!important;"><?php echo $fetch['cholesterol']; ?> g</td>
				    </tr>
				     <tr>
				      <th scope="col" >Sodium</th>
				      <td scope="col" style="text-transform: lowercase!important;"><?php echo $fetch['sodium']; ?> g</td>
				    </tr>
				     <tr>
				      <th scope="col">Potassium</th>
				      <td scope="col" style="text-transform: lowercase!important;"><?php echo $fetch['potassium']; ?> g</td>
				    </tr>
				     <tr>
				      <th scope="col">carbohydrate</th>
				      <td scope="col" style="text-transform: lowercase!important;"><?php echo $fetch['carbohydrate']; ?> g</td>
				    </tr>
				     <tr>
				      <th scope="col">protein</th>
				      <td scope="col" style="text-transform: lowercase!important;"><?php echo $fetch['protein']; ?> g</td>
				    </tr>
				    <tr>
				      <th scope="col">Total Calories</th>
				      <td scope="col" style="text-transform: uppercase !important;">
				      	(fats x 9 = <?php echo $fetch['fats']; ?>, carbohydrate x 4 = <?php echo $fetch['carbohydrate']; ?>, protein x 4 = <?php echo $fetch['protein']; ?>)  Total Calories : <?php echo $fetch['add_calories']; ?>g</td>
				    </tr>
				  </tbody>
				</table>
	  	</article>
	   	
	  </div> 
	</div>

<?php } ?>	
</section>

<?php include 'include/footer.php'?>
