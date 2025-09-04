<!-- header---here -->
<?php include 'include/header.php' ?>
<link rel="stylesheet" type="text/css" href="assets/css/plug_in.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600&display=swap" rel="stylesheet">
<style type="text/css">
  #hero2 {
    position: relative;
    background-position: bottom center;
    background-image: linear-gradient(rgba(37, 35, 42, 1), rgba(37, 35, 42, 0.51)), url("assets/img/food-1.jpeg");
    width: 100%;
    height: 60vh;
    background-repeat: no-repeat;
    background-size: cover;

  }

  .heading h1 {
    letter-spacing: 10px;
    font-family: 'Montserrat', sans-serif;
    text-transform: uppercase;
  }

  #header.header-scrolled,
  #header.header-inner-pages {
    background: #333;
  }

  .img img {
    width: 100%;
    height: 20rem;
  }


  .section-row {
    margin: 0 0 80px 0;
  }

  .section-color {
    background: #fff;
  }

  .section-row-col-1 {
    height: 360px;
    padding: 0 3% 0 0;
  }

  .section-padding {
    padding-right: 3%;
  }

  .section-row-col-1 img {
    width: 100%;
    height: 100%;
    border-radius: 10px;
    box-shadow: 4px 4px 8px #898989;
  }

  .section-row-col-2 h3 {
    font-size: 2.2em;
    color: hsl(240, 10%, 16%);
    margin: 0;
    padding: 20px 0 15px 0;
  }

  .section-row-col-2 h3 span {
    padding-bottom: 15px;
    border-bottom: 3px solid #FF8C00;
  }

  .section-row-col-2 p {
    font-size: 1em;
    color: hsl(208, 49%, 24%);
    margin: 20px 0;
    line-height: 26px;
  }
</style>

<?php include('include/navbar.php') ?>

<!--------- box----------  -->

<section id="hero2" class="d-flex align-items-center justify-content-center">
  <div class="container" data-aos="fade-up">
    <div class="row justi-cfyontent-center" data-aos="fade-up" data-aos-delay="150">
      <div class="col-xl-12 col-lg-8">
        <a href="#" class="heading">
          <h1 class="text-center display-5">Blogs</h1>
        </a>
      </div>
    </div>
  </div>
</section><!-- End Hero -->

<!-- Blog Section -->

<section>
  <div class="container-fluid">
    <div class="container">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="section-title">
          <h2>Blogs</h2>
          <p>Blogs</p>
        </div>
      </div>
    </div>
  </div>
  <div class="container-fluid section-row section-color-1 float-start" id="learn-more">
    <div class="container">
      <div class="col-6 col-lg-6 col-md-12 col-sm-12 section-row-col-1 float-start">
        <img src="images/article1.jpg" alt="Dish Image">
      </div>
      <div class="col-6 col-lg-6 col-md-12 col-sm-12 section-row-col-2 float-end">
        <h3><span>Track</span> Your Weight & Measurements</h3>
        <p>Maintaining a healthy weight is essential for overall well-being. A digital scale and a measuring tape can help track progress and ensure fitness goals are on track. Regularly monitoring weight and body measurements provides motivation and helps adjust diet and exercise plans. Small changes can lead to significant improvements over time, making it easier to maintain a balanced lifestyle.</p>
      </div>
    </div>
  </div>

  <div class="container-fluid section-row section-color float-start">
    <div class="container">
      <div class="col-6 col-lg-6 col-md-12 col-sm-12 section-row-col-2 section-padding float-start">
        <h3><span>Eat</span> Smart, Burn Fat</h3>
        <p>Losing weight is not just about exercising—it also involves eating the right foods in the right portions. The phrase "Burn Fat" on the plate reminds us that mindful eating is key. Consuming a balanced diet rich in proteins, fiber, and healthy fats while reducing processed foods can accelerate fat loss. Staying hydrated and eating in moderation further contribute to a healthier lifestyle.</p>
      </div>
      <div class="col-6 col-lg-6 col-md-12 col-sm-12 section-row-col-1 float-end">
        <img src="images/article2.jpg" alt="Dish Image">
      </div>
    </div>
  </div>

  <div class="container-fluid section-row float-start">
    <div class="container">
      <div class="col-6 col-lg-6 col-md-12 col-sm-12 section-row-col-1 float-start">
        <img src="images/article3.jpg" alt="Dish Image">
      </div>
      <div class="col-6 col-lg-6 col-md-12 col-sm-12 section-row-col-2 float-end">
        <h3><span>Nuts:</span> A Healthy Snack</h3>
        <p>Nuts are a great source of essential nutrients, including healthy fats, protein, and fiber. Almonds, walnuts, cashews, and hazelnuts provide energy and promote heart health. They also help with weight management by keeping you full for longer. Incorporating a handful of mixed nuts into your daily diet can be a simple yet effective way to improve overall nutrition.</p>
      </div>
    </div>
  </div>

</section>


<?php include 'include/footer.php' ?>