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

  .calc-calories-main {
    display: flex;
    justify-content: center;
  }

  .calc-calories-inner {
    border-radius: 16px;
    box-shadow: 2px 2px 8px #D4D4D4;
    background: #F5F5F5;
  }

  .calc-calories-inner form {
    padding: 30px 20px;
    width: 100%;
  }

  .calc-calories-inner form label {
    display: block;
    margin: 10px 0 5px;
    font-weight: bold;
    color: #333;
  }

  .calc-calories-inner form input[type="number"],
  select {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ddd;
    border-radius: 5px;
    font-size: 14px;
  }

  .calc-calories-inner form input[type="number"]:focus {
    box-shadow: 0 0 5px rgb(188, 188, 188);
  }

  .calc-calories-inner form select:focus {
    box-shadow: 0 0 5px rgb(188, 188, 188);
  }

  .calc-calories-inner form input[type="radio"] {
    margin-right: 5px;
  }

  .calc-calories-inner form .radio-group {
    display: flex;
    flex-direction: row;
    gap: 30px;
    margin-bottom: 15px;
  }

  .calc-calories-inner form .radio-group label {
    margin: 0;
    font-weight: normal;
  }

  .calc-calories-inner form select {
    background: #f9f9f9;
  }

  .calc-calories-inner form button {
    width: 100%;
    padding: 10px;
    background: #FF8C00;
    color: white;
    font-size: 16px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: 0.3s ease all;
    border: 2px solid transparent;
  }

  .calc-calories-inner form button:hover {
    color: #FF8C00;
    border: 2px solid #FF8C00;
    background: none;
    font-weight: 700;
  }

  .calculated-result {
    width: 100%;
    padding: 14px 20px;
    border: 1px solid #FF8C00;
    border-bottom-left-radius: 16px;
    border-bottom-right-radius: 16px;
    display: none;
  }

  .calculated-result p {
    margin: 0;
    color: gray;
  }
  #calc_form sup{
    color: red;
    font-size: 14px;
  }
</style>

<?php include('include/navbar.php') ?>

<!--------- box----------  -->

<section id="hero2" class="d-flex align-items-center justify-content-center">
  <div class="container" data-aos="fade-up">
    <div class="row justi-cfyontent-center" data-aos="fade-up" data-aos-delay="150">
      <div class="col-xl-12 col-lg-8">
        <a href="#" class="heading">
          <h1 class="text-center display-5">Calculate Calories</h1>
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
          <h2>Calculate</h2>
          <p>Calories</p>
        </div>
      </div>

      <!-- Calories Calculation Section -->

      <div class="col-12 col-md-12 col-sm-12 calc-calories-main float-start">
        <div class="col-4  col-md-4 col-sm-4 calc-calories-inner">
          <form id="calc_form">
            <label for="age">Age</label>
            <input type="number" id="age" min="10" max="100" placeholder="Enter your age" required>

            <label>Gender</label>
            <div class="radio-group">
              <label><input type="radio" name="gender" value="Male" required checked> Male</label>
              <label><input type="radio" name="gender" value="Female" required> Female</label>
            </div>

            <label for="height">Height (cm)</label>
            <input type="number" id="height" min="70" max="250" placeholder="Enter your height" required>

            <label for="weight">Weight (kg)</label>
            <input type="number" id="weight" min="20" max="300" placeholder="Enter your weight" required>

            <label for="activity">Activities<sup>*</sup></label>
            <select id="activity" required>
              <option selected disabled>Choose Best Fit Option for You</option>
              <option value="1">No Exercise</option>
              <option value="2">Exercise 1-2 Days / Week</option>
              <option value="3">Exercise 3-4 Days / Week</option>
              <option value="4">Exercise Everyday</option>
              <option value="5">Do Extreme Exercise</option>
            </select>

            <button type="submit" id="calc_result">Calculate</button>
          </form>
          <div class="calculated-result" id="result-box">
            <p id="calorie-result"></p>
          </div>
        </div>
      </div>


    </div>
  </div>
</section>

<script>
  document.getElementById('calc_result').addEventListener('click', function(event) {
    event.preventDefault(); 
    var age = document.getElementById('age');
    var weight = document.getElementById('weight');
    var height = document.getElementById('height');
    var gender = document.querySelector('input[name="gender"]:checked');
    var activity = document.getElementById('activity').value;
    var result;

    if (activity == 'Choose Best Fit Option for You' || age.value > 100 || age.value < 10 || weight.value > 300 || weight.value < 20 || height.value > 250 || height.value < 70) {
      document.getElementById('calorie-result').innerHTML = '<i>Enter Valid Details</i>';
      document.getElementById('result-box').style.display = 'block';

    } else if (gender.value === 'Male' && activity === "1") {
      result = 1.2 * (66.5 + (13.75 * parseFloat(weight.value)) + (5.003 * parseFloat(height.value)) - (6.755 * parseFloat(age.value)));
    } else if (gender.value === 'Male' && activity === "2") {
      result = 1.375 * (66.5 + (13.75 * parseFloat(weight.value)) + (5.003 * parseFloat(height.value)) - (6.755 * parseFloat(age.value)));
    } else if (gender.value === 'Male' && activity === "3") {
      result = 1.55 * (66.5 + (13.75 * parseFloat(weight.value)) + (5.003 * parseFloat(height.value)) - (6.755 * parseFloat(age.value)));
    } else if (gender.value === 'Male' && activity === "4") {
      result = 1.725 * (66.5 + (13.75 * parseFloat(weight.value)) + (5.003 * parseFloat(height.value)) - (6.755 * parseFloat(age.value)));
    } else if (gender.value === 'Male' && activity === "5") {
      result = 1.9 * (66.5 + (13.75 * parseFloat(weight.value)) + (5.003 * parseFloat(height.value)) - (6.755 * parseFloat(age.value)));
    } else if (gender.value === 'Female' && activity === "1") {
      result = 1.2 * (655 + (9.563 * parseFloat(weight.value)) + (1.850 * parseFloat(height.value)) - (4.676 * parseFloat(age.value)));
    } else if (gender.value === 'Female' && activity === "2") {
      result = 1.375 * (655 + (9.563 * parseFloat(weight.value)) + (1.850 * parseFloat(height.value)) - (4.676 * parseFloat(age.value)));
    } else if (gender.value === 'Female' && activity === "3") {
      result = 1.55 * (655 + (9.563 * parseFloat(weight.value)) + (1.850 * parseFloat(height.value)) - (4.676 * parseFloat(age.value)));
    } else if (gender.value === 'Female' && activity === "4") {
      result = 1.725 * (655 + (9.563 * parseFloat(weight.value)) + (1.850 * parseFloat(height.value)) - (4.676 * parseFloat(age.value)));
    } else {
      result = 1.9 * (655 + (9.563 * parseFloat(weight.value)) + (1.850 * parseFloat(height.value)) - (4.676 * parseFloat(age.value)));
    }

    document.getElementById('calorie-result').innerHTML = result.toFixed(3) + '<i> Calories Recommended Daily</i>';
    document.getElementById('result-box').style.display = 'block';
  });
    document.getElementById('calc_result').addEventListener('click', function() {
    window.scrollBy({
    top: 100
  });
  });
</script>

<?php include 'include/footer.php' ?>