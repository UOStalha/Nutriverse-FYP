<!-- header---here -->
<?php include 'include/header.php' ?>


<link rel="stylesheet" type="text/css" href="assets/css/plug_in.css">

<style type="text/css">
  #hero {
    position: relative;
    background-position: bottom center;
    background-image: linear-gradient(rgba(37, 35, 42, 1), rgba(37, 35, 42, 0.51)), url("assets/img/food-1.jpeg");
    width: 100%;
    height: 80vh;
    background-repeat: no-repeat;
    background-size: cover;
  }

  @media (max-width: 999px) {
    #hero {

      height: auto !important;
    }
  }
  .filters {
    display: inline-block;
    width: 100%;
  }

  .filters h2 {
    font-size: 20px;
    color: rgb(100, 100, 100);
    margin: 0 16px 0 0;
    float: left;
    line-height: 46px;
  }

  .dropdown-container {
    position: relative;
    width: 100px;
    margin-right: 10px;
    float: left;
  }

  .dropdown-search {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
  }

  .dropdown-search:hover {
    border: 1px solid #FF8C00;
  }

  .dropdown-search:focus {
    box-shadow: 0 0 4px #FF8C00;
    border: 1px solid #FF8C00;
  }

  .dropdown-options {
    position: absolute;
    top: 100%;
    left: 0;
    width: 100%;
    border: 1px solid #ccc;
    border-radius: 5px;
    background-color: #fff;
    max-height: 160px;
    overflow-y: auto;
    z-index: 10;
    display: none;
  }

  .dropdown-option {
    padding: 6px 10px;
    cursor: pointer;
    font-size: 14px;
  }

  .dropdown-option:hover {
    background-color: #f0f0f0;
  }
</style>
<!-- ======= Header ======= -->
<!-- nav-bar section starts  -->
<?php include('include/navbar.php') ?>
<!-- nav-bar section ends -->


<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center justify-content-center">
  <div class="container" data-aos="fade-up">
    <div class="row gy-4  justify-content-center" data-aos="zoom-in" data-aos-delay="250">
      <div class="col-xl-2 col-md-4">
        <div class="icon-box">
          <i class="fa-solid fa-burger"></i>
          <h3><a href="">Fast Food</a></h3>
        </div>
      </div>
      <div class="col-xl-2 col-md-4">
        <div class="icon-box">
          <i class="fa-solid fa-cake-candles"></i>

          <h3><a href="">Sweets</a></h3>
        </div>
      </div>
      <div class="col-xl-2 col-md-4">
        <div class="icon-box">
          <i class="fa-solid fa-solid fa-bell-concierge"></i>

          <h3><a href="">Desi Foods</a></h3>
        </div>
      </div>
      <div class="col-xl-2 col-md-4">
        <div class="icon-box">
          <i class="fa-regular fa-lemon"></i>

          <h3><a href="">Vegetables</a></h3>
        </div>
      </div>
      <div class="col-xl-2 col-md-4">
        <div class="icon-box">
          <i class="fa-solid fa-bowl-food"></i>

          <h3><a href="">Chinese</a></h3>
        </div>
      </div>
    </div>

  </div>
</section>
<!-- End Hero -->



<main id="main">


  <!-- ======= Services Section ======= -->
  <section id="services" class="services">
    <div class="container" data-aos="fade-up">

      <div class="filters">
        <h2>Filters:</h2>
        <div class="dropdown-container">
          <input type="text" class="dropdown-search" id="calories-search" placeholder="Calories" autocomplete="off"/>
          <div class="dropdown-options" id="calories-options">

            <?php
            $sel = "SELECT `add_calories` FROM `category_details`";
            $sel_query = mysqli_query($con, $sel);

            while ($fetch = mysqli_fetch_assoc($sel_query)) {

            ?>

              <!-- <div class="dropdown-option"><?php // echo $fetch['add_calories'] 
                                                ?></div> -->

              <form method="POST" class="form ">
                <button type="submit" class="btn text-black" name="search2" value="<?php echo $fetch['add_calories']; ?>"> <?php echo $fetch['add_calories']; ?> G</button>
              </form>

            <?php
            }
            ?>
          </div>
        </div>

        <div class="dropdown-container">
          <input type="text" class="dropdown-search" id="fats-search" placeholder="Fats" autocomplete="off"/>
          <div class="dropdown-options" id="fats-options">

            <?php
            $sel2 = "SELECT `fats` FROM `category_details`";
            $sel_query2 = mysqli_query($con, $sel2);

            while ($fetch = mysqli_fetch_assoc($sel_query2)) {

            ?>

              <!-- <div class="dropdown-option"><?php // echo $fetch['add_calories'] 
                                                ?></div> -->
              <form method="POST" class="form ">
                <button type="submit" class="btn text-black" name="search3" value="<?php echo $fetch['fats']; ?>"> <?php echo $fetch['fats']; ?> G</button>
              </form>

            <?php
            }
            ?>
          </div>
        </div>

        <div class="dropdown-container">
          <input type="text" class="dropdown-search" id="protein-search" placeholder="Protein" autocomplete="off" />
          <div class="dropdown-options" id="protein-options">
            <?php
            $sel3 = "SELECT `protein` FROM `category_details`";
            $sel_query3 = mysqli_query($con, $sel3);

            while ($fetch = mysqli_fetch_assoc($sel_query3)) {

            ?>

              <!-- <div class="dropdown-option"><?php // echo $fetch['add_calories'] 
                                                ?></div> -->
              <form method="POST" class="form">
                <button type="submit" class="btn text-black" name="search4" value="<?php echo $fetch['protein']; ?>"> <?php echo $fetch['protein']; ?> G</button>
              </form>

            <?php
            }
            ?>
          </div>
        </div>
      </div>


      <div class="section-title">

        <div class="col-lg-12">
          <input class="search form-control mt-4 shadow-none" type="search" placeholder="Search for names.." title="Type in a name" name="" id="myInput" onkeyup="myFunction()">
          <p class="mt-5 mb-5">Enhance Your Healthy Eating</p>
        </div>

        <?php
        $sear = $_POST['search2'];
        $se = "SELECT * FROM category_details WHERE `add_calories` LIKE '%$sear%' ";
        $se2 = mysqli_query($con, $se);

        $sear1 = $_POST['search3'];
        $see = "SELECT * FROM category_details WHERE `fats` LIKE '%$sear1%' ";
        $see2 = mysqli_query($con, $see);

        $sear2 = $_POST['search4'];
        $see4 = "SELECT * FROM category_details WHERE `protein` LIKE '%$sear2%' ";
        $see3 = mysqli_query($con, $see4);

        $sear2 = $_GET['cat_search'];
        $cat_se = "SELECT * FROM category_details WHERE `type` LIKE '%$sear2%'";
        $cat_se2 = mysqli_query($con, $cat_se);


        $sql = "SELECT * FROM category_details";
        $run = $con->query($sql);
        if (isset($_POST['search2'])) {


          while ($fetch = $se2->fetch_assoc()) {

        ?>
            <section id="add_calories">
              <div class="row" id="myTable">
                <div class="container py-4">
                  <article class="postcard dark blue">
                    <a class="postcard__img_link" href="#">
                      <img class="postcard__img" src="dashboard/<?php echo $fetch['image'] ?>" alt="Image Title" />
                    </a>
                    <div class="postcard__text">
                      <h1 class="postcard__title blue"><a href="#"><?php echo $fetch['content_title'] ?></a></h1>
                      <div class="postcard__subtitle small">
                        <span>
                          <lable class="card-text text-uppercase"><b>Calorie :</b> <?php echo $fetch['add_calories'] ?>KCAL</lable>
                          <lable class="card-text text-uppercase"><b>Fats :</b> <?php echo $fetch['fats'] ?>g</lable>
                          <lable class="card-text text-uppercase"><b>Protien :</b> <?php echo $fetch['protein'] ?>g</lable>
                          <lable class="card-text text-uppercase"><b>Type :</b> <?php echo $fetch['type'] ?></lable>
                        </span>
                      </div>
                      <a href="view_details.php?cat_id=<?php echo $fetch['content_title']; ?>"><button type="button" class="btn button_clr w-25 mt-3">View Detail</button></a>
                    </div>

                  </article>
                </div>
              </div>
            </section>
          <?php }
        } else if (isset($_GET['cat_search'])) {


          while ($fetch = $cat_se2->fetch_assoc()) {
          ?>
            <section id="add_calories">
              <div class="row" id="myTable">
                <div class="container py-4">
                  <article class="postcard dark blue">
                    <a class="postcard__img_link" href="#">
                      <img class="postcard__img" src="dashboard/<?php echo $fetch['image'] ?>" alt="Image Title" />
                    </a>
                    <div class="postcard__text">
                      <h1 class="postcard__title blue"><a href="#"><?php echo $fetch['content_title'] ?></a></h1>
                      <div class="postcard__subtitle small">
                        <span>
                          <lable class="card-text text-uppercase"><b>Calorie :</b> <?php echo $fetch['add_calories'] ?></lable>
                          <lable class="card-text text-uppercase"><b>Type :</b> <?php echo $fetch['type'] ?></lable>
                        </span>
                      </div>
                      <div class="postcard__bar"></div>
                      <a href="view_details.php?cat_id=<?php echo $fetch['content_title']; ?>"><button type="button" class="btn button_clr w-25 mt-3">View Detail</button></a>

                    </div>

                  </article>
                </div>
              </div>
            </section>
          <?php

          }
        } else if (isset($_POST['search3'])) {


          while ($fetch = $see2->fetch_assoc()) {

          ?>
            <section id="add_calories">
              <div class="row" id="myTable">
                <div class="container py-4">
                  <article class="postcard dark blue">
                    <a class="postcard__img_link" href="#">
                      <img class="postcard__img" src="dashboard/<?php echo $fetch['image'] ?>" alt="Image Title" />
                    </a>
                    <div class="postcard__text">
                      <h1 class="postcard__title blue"><a href="#"><?php echo $fetch['content_title'] ?></a></h1>
                      <div class="postcard__subtitle small">
                        <span>
                          <lable class="card-text text-uppercase"><b>Calorie :</b> <?php echo $fetch['add_calories'] ?></lable>
                          <lable class="card-text text-uppercase"><b>Type :</b> <?php echo $fetch['type'] ?></lable>
                        </span>
                      </div>
                      <div class="postcard__bar"></div>
                      <a href="view_details.php?cat_id=<?php echo $fetch['content_title']; ?>"><button type="button" class="btn button_clr w-25 mt-3">View Detail</button></a>
                    </div>

                  </article>
                </div>
              </div>
            </section>
          <?php }
        } else if (isset($_POST['search4'])) {


         while ($fetch = $see3->fetch_assoc()) {

          ?>
            <section id="add_calories">
              <div class="row" id="myTable">
                <div class="container py-4">
                  <article class="postcard dark blue">
                    <a class="postcard__img_link" href="#">
                      <img class="postcard__img" src="dashboard/<?php echo $fetch['image'] ?>" alt="Image Title" />
                    </a>
                    <div class="postcard__text">
                      <h1 class="postcard__title blue"><a href="#"><?php echo $fetch['content_title'] ?></a></h1>
                      <div class="postcard__subtitle small">
                        <span>
                          <lable class="card-text text-uppercase"><b>Calorie :</b> <?php echo $fetch['add_calories'] ?></lable>
                          <lable class="card-text text-uppercase"><b>Type :</b> <?php echo $fetch['type'] ?></lable>
                        </span>
                      </div>
                      <div class="postcard__bar"></div>
                      <a href="view_details.php?cat_id=<?php echo $fetch['content_title']; ?>"><button type="button" class="btn button_clr w-25 mt-3">View Detail</button></a>
                    </div>

                  </article>
                </div>
              </div>
            </section>
          <?php }
        } else {
          ?>
          <section id="add_calories">
            <div class="row" id="myTable">
              <?php
              // $count=0;
              while ($fetch = $run->fetch_assoc()) {
                if ($fetch) {
                  $count += 1;
                }
                if ($count >= 4) {
                  break;
                }
              ?>

                <div class="container py-4">
                  <article class="postcard dark blue">
                    <a class="postcard__img_link" href="#">
                      <img class="postcard__img" src="dashboard/<?php echo $fetch['image'] ?>" alt="Image Title" />
                    </a>
                    <div class="postcard__text">
                      <h1 class="postcard__title blue"><a href="#"><?php echo $fetch['content_title'] ?></a></h1>
                      <div class="postcard__subtitle small">
                        <span>
                          <lable class="card-text text-uppercase"><b>Calorie :</b> <?php echo $fetch['add_calories'] ?>KCAL</lable>
                          <lable class="card-text text-uppercase"><b>Fats :</b> <?php echo $fetch['fats'] ?>g</lable>
                          <lable class="card-text text-uppercase"><b>Protien :</b> <?php echo $fetch['protein'] ?>g</lable>
                          <lable class="card-text text-uppercase"><b>Type :</b> <?php echo $fetch['type'] ?></lable>
                        </span>
                      </div>
                      <div class="postcard__bar"></div>
                      <div class="postcard__preview-txt">
                        <span>
                          <a href="view_details.php?cat_id=<?php echo $fetch['content_title']; ?>"><button type="button" class="btn button_clr w-25 mt-3">View Details</button></a>
                      </div>

                  </article>
                </div>
            <?php }
            } ?>
            </div>
          </section>
          <div class="row">
            <div class="col-lg-12 text-center" data-aos="fade-left" data-aos-delay="20">
              <ul class="caloriesbtn d-inline-block text-center w-25">
                <li class="text-center">
                  <a href="#"><button type="submit" class="btn text-white">VIEW MORE</button></a>
                </li>
                <ul>
            </div>
          </div>

      </div>
  </section>

  <!-- End Dishes Section -->




  <!-- ======= About Section ======= -->
  <section id="about" class="about">
    <div class="container" data-aos="fade-up">
      <div class="section-title">
        <h2>About Us</h2>
        <p>About Us</p>
      </div>

      <div class="row">
        <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-left" data-aos-delay="20">
          <img src="assets/img/Poke_Bowl_Image.jpg" class="img-fluid" alt="">
        </div>
        <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content" data-aos="fade-right" data-aos-delay="20">
          <p>
            At NutriVerse, we understand the growing importance of nutrition in today’s health-conscious world. However, with information often scattered across various sources, it can be difficult and time-consuming to track your nutrition effectively. That’s where we come in. NutriVerse is a platform designed to streamline the process, offering users a comprehensive and user-friendly space to track their nutrition intake and gain detailed insights into the nutrients in their food. Our mission is to make it easier for everyone to make informed dietary choices by providing all the information they need in one convenient place. Whether you’re looking to improve your diet or simply understand the food you consume better, NutriVerse is here to support you every step of the way.
          </p>
        </div>
      </div>
    </div>
  </section><!-- End About Section -->

  <!-- ======= Clients Section ======= -->
  <section id="clients" class="clients">
    <div class="container" data-aos="zoom-in">

      <div class="clients-slider swiper">
        <div class="swiper-wrapper align-items-center">
          <div class="swiper-slide"><img src="assets/img/clients/1.png" class="img-fluid" alt=""></div>
          <div class="swiper-slide"><img src="assets/img/clients/2.png" class="img-fluid" alt=""></div>
          <div class="swiper-slide"><img src="assets/img/clients/3.png" class="img-fluid" alt=""></div>
          <div class="swiper-slide"><img src="assets/img/clients/4.png" class="img-fluid" alt=""></div>
          <div class="swiper-slide"><img src="assets/img/clients/5.png" class="img-fluid" alt=""></div>
          <div class="swiper-slide"><img src="assets/img/clients/6.png" class="img-fluid" alt=""></div>
          <div class="swiper-slide"><img src="assets/img/clients/7.png" class="img-fluid" alt=""></div>
          <div class="swiper-slide"><img src="assets/img/clients/8.png" class="img-fluid" alt=""></div>
          <div class="swiper-slide"><img src="assets/img/clients/9.png" class="img-fluid" alt=""></div>
          <div class="swiper-slide"><img src="assets/img/clients/10.png" class="img-fluid" alt=""></div>
        </div>
        <div class="swiper-pagination"></div>
      </div>

    </div>
  </section><!-- End Clients Section -->
  <!-- ======= Features Section ======= -->
  <section id="features" class="features">
    <div class="container" data-aos="fade-up">

      <div class="row">
        <div class="image col-lg-6" style='background-image: url("assets/img/features.jpg");' data-aos="fade-right"></div>
        <div class="col-lg-6 my-content mr-5" data-aos="fade-left" data-aos-delay="20">
          <div class="icon-box mt-5 mt-lg-0" data-aos="zoom-in" data-aos-delay="150">
            <h3>Health Benefits of Protein</h3>
          </div>
          <ul>
            <li><i class="ri-check-double-line"></i>Muscle Development</li>
            <li><i class="ri-check-double-line"></i>Help with bone metabolism</li>
            <li><i class="ri-check-double-line"></i>Prevent heart related diseases</li>
            <li><i class="ri-check-double-line"></i>Control sugar levels</li>
            <li><i class="ri-check-double-line"></i>Promotes the health of neurons in the brains</li>
            <li><i class="ri-check-double-line"></i>Slow down ageing process</li>
            <li><i class="ri-check-double-line"></i>Improved immune system</li>
            <li><i class="ri-check-double-line"></i>Help in hormone balance</li>
            <li><i class="ri-check-double-line"></i>Prevent hair damage</li>
            <li><i class="ri-check-double-line"></i>Makes skin healthy</li>
            <li><i class="ri-check-double-line"></i>Eliminates anxiety</li>
          </ul>
        </div>
      </div>

    </div>
  </section><!-- End Features Section -->
  <!-- ======= Cta Section ======= -->
  <section id="cta" class="cta">
    <div class="container" data-aos="zoom-in">

      <div class="text-center">
        <h3>High protein intake may boost your metabolism significantly, helping you burn more calories throughout the day.</h3>

      </div>

    </div>
  </section><!-- End Cta Section -->

  <!-- ======= Counts Section ======= -->
  <section id="counts" class="counts">
    <div class="container" data-aos="fade-up">

      <div class="row no-gutters">
        <div class="image col-xl-5 d-flex align-items-stretch justify-content-center justify-content-lg-start" data-aos="fade-right" data-aos-delay="20"></div>
        <div class="col-xl-7 ps-0 ps-lg-5 pe-lg-1 d-flex align-items-stretch" data-aos="fade-left" data-aos-delay="20">
          <div class="content d-flex flex-column justify-content-center">
            <h3>Get Your personalized Diet Chart</h3>
            <p>
              Get your personalized diet chart today by reaching out to us below! Tailored to meet your unique nutritional needs, our comprehensive guide is designed to help you achieve your health goals—whether it's weight management, muscle building, or embracing a healthier lifestyle.
              With a focus on portion control, balanced macronutrients, and nutrient-dense meals, this diet plan will fuel your body and support your journey to optimal well-being. Start your path to a healthier, more vibrant life. Contact us now to begin! </p>
          </div>
        </div>
      </div>

    </div>
  </section>

  <!-- ======= Contact Section ======= -->
  <section id="contact" class="contact">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>Contact</h2>
        <p>Contact Us</p>
      </div>

      <div class="row mt-5">

        <div class="col-lg-4">
          <div class="info">
            <div class="address">
              <i class="bi bi-geo-alt"></i>
              <h4>Location:</h4>
              <p>Latifabad Unit no 10 Latifabad, Hyderabad</p>
            </div>

            <div class="email">
              <i class="bi bi-envelope"></i>
              <h4>Email:</h4>
              <p>info@nutriverse.com</p>
            </div>

            <div class="phone">
              <i class="bi bi-phone"></i>
              <h4>Call:</h4>
              <p>+92 3138601260</p>
            </div>

          </div>

        </div>

        <div class="col-lg-8 mt-5 mt-lg-0">

          <form action="forms/contact.php" method="post" role="form" class="php-email-form">
            <div class="row">
              <div class="col-md-6 form-group">
                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
              </div>
              <div class="col-md-6 form-group mt-3 mt-md-0">
                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
              </div>
            </div>
            <div class="form-group mt-3">
              <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
            </div>
            <div class="form-group mt-3">
              <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
            </div>
            <div class="my-3">
              <div class="loading">Loading</div>
              <div class="error-message"></div>
              <div class="sent-message">Your message has been sent. Thank you!</div>
            </div>
            <div class="text-center"><button type="submit">Send Message</button></div>
          </form>

        </div>

      </div>

    </div>
  </section><!-- End Contact Section -->

</main><!-- End #main -->

<!-- footer---here -->

<script>
  function setupDropdown(searchId, optionsId) {
    const searchInput = document.getElementById(searchId);
    const dropdownOptions = document.getElementById(optionsId);
    const options = dropdownOptions.getElementsByClassName("dropdown-option");

    searchInput.addEventListener("focus", () => {
      dropdownOptions.style.display = "block";
    });

    document.addEventListener("click", (event) => {
      if (!event.target.closest(`#${optionsId}, #${searchId}`)) {
        dropdownOptions.style.display = "none";
      }
    });

    searchInput.addEventListener("input", () => {
      const filter = searchInput.value.toLowerCase();

      for (let option of options) {
        if (option.textContent.toLowerCase().includes(filter)) {
          option.style.display = "block";
        } else {
          option.style.display = "none";
        }
      }
    });

    for (let option of options) {
      option.addEventListener("click", () => {
        searchInput.value = option.textContent;
        dropdownOptions.style.display = "none";
      });
    }
  }
  setupDropdown('calories-search', 'calories-options');
  setupDropdown('fats-search', 'fats-options');
  setupDropdown('protein-search', 'protein-options');
</script>


<?php include 'include/footer.php' ?>