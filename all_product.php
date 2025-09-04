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
<?php include('include/navbar.php') ?>

<!--------- box----------  -->

<section id="hero2" class="d-flex align-items-center justify-content-center">
  <div class="container" data-aos="fade-up">
    <div class="row justi-cfyontent-center" data-aos="fade-up" data-aos-delay="150">
      <div class="col-xl-12 col-lg-8">
        <a href="#" class="heading">
          <h1 class="text-center display-5">All Dishes</h1>
        </a>
      </div>
    </div>
  </div>
</section><!-- End Hero -->




<!-- ======= Services Section ======= -->
<section id="services" class="services">
  <div class="container" data-aos="fade-up">

    <div class="row">
      <div class="section-title">
        <h2>All Dishes</h2>
        <p>All Dishes</p>
      </div>
    </div>


    <!-- Product Filters -->

    <div class="filters">
        <h2>Filters:</h2>
        <div class="dropdown-container">
          <input type="text" class="dropdown-search" id="calories-search" placeholder="Calories" />
          <div class="dropdown-options" id="calories-options">
            
            <?php
              $sel = "SELECT `add_calories` FROM `category_details`";
              $sel_query = mysqli_query($con,$sel);
              
              while ($fetch = mysqli_fetch_assoc($sel_query)) {
                
                ?> 
                
                <!-- <div class="dropdown-option"><?php // echo $fetch['add_calories'] ?></div> -->
                <form method="POST" class="form ">
                  <button type="submit" class="btn text-black" name="search2" value="<?php echo $fetch['add_calories']; ?>"> <?php echo $fetch['add_calories']; ?> G</button>
                </form>

                <?php
              }
            ?>
          </div>
        </div>

        
        <div class="dropdown-container">
          <input type="text" class="dropdown-search" id="fats-search" placeholder="Fats" />
          <div class="dropdown-options" id="fats-options">
            
            <?php
              $sel2 = "SELECT `fats` FROM `category_details`";
              $sel_query2 = mysqli_query($con,$sel2);
              
              while ($fetch = mysqli_fetch_assoc($sel_query2)) {
                
                ?> 
                
                <!-- <div class="dropdown-option"><?php // echo $fetch['add_calories'] ?></div> -->
                <form method="POST" class="form ">
                  <button type="submit" class="btn text-black" name="search3" value="<?php echo $fetch['fats']; ?>"> <?php echo $fetch['fats']; ?> G</button>
                </form>

                <?php
              }
            ?>
          </div>
        </div>

        <div class="dropdown-container">
          <input type="text" class="dropdown-search" id="protein-search" placeholder="Protein" />
          <div class="dropdown-options" id="protein-options">
          <?php
              $sel3 = "SELECT `protein` FROM `category_details`";
              $sel_query3 = mysqli_query($con,$sel3);
              
              while ($fetch = mysqli_fetch_assoc($sel_query3)) {
                
                ?> 
                
                <!-- <div class="dropdown-option"><?php // echo $fetch['add_calories'] ?></div> -->
                <form method="POST" class="form ">
                  <button type="submit" class="btn text-black" name="search4" value="<?php echo $fetch['protein']; ?>"> <?php echo $fetch['protein']; ?> G</button>
                </form>

                <?php
              }
            ?>
          </div>
            </div>
      </div>

    <!-- Product Filters End -->

    <div class="col-lg-2"></div>
    <div class="section-title">

      <div class="col-lg-12">
        <input class="search form-control mt-4 shadow-none" type="search" placeholder="Search for names.." title="Type in a name" name="" id="myInput" onkeyup="myFunction()">
        <p class="mt-5 mb-5">Improve Your Daily Nutrition</p>
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
        }

        else if (isset($_POST['search3'])) {


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
        }

        else if (isset($_POST['search4'])) {


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
        }

        else {
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
                          <lable class="card-text text-uppercase"><b>Type :</b> <?php echo $fetch['type'] ?></lable>                        </span>
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
<!-- End Services Section -->

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