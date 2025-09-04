<?php
session_start();
if (!isset($_SESSION['email'])) {
  header('Location: /nutriverse/user_dashboard/login.php');
  exit();
}
include 'dashbord_includes/header.php';
include 'dashbord_includes/topbar.php';
include 'dashbord_includes/sidebar.php';

// user details
$email = $_SESSION['email'];
$user_query = "SELECT * FROM users WHERE Email = '$email'";
$user_result = mysqli_query($con, $user_query);
$user_data = mysqli_fetch_assoc($user_result);

$user_id = $user_data['ID'];
$_SESSION['user_id'] = $user_id;
$calories_query = "SELECT SUM(calories) as total FROM user_calorie_intake WHERE user_id = $user_id";
$calories_result = mysqli_query($con, $calories_query);
$calories_data = mysqli_fetch_assoc($calories_result);
$today_calories = $calories_data['total'] ?? 0;
?>

<style>
  #searchResults {
    margin-top: 10px;
    background: #fff;
    border-radius: 5px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    max-width: 400px;
  }

  #searchResults ul {
    list-style: none;
    padding: 0;
    margin: 0;
  }

  #searchResults li {
    padding: 10px;
    border-bottom: 1px solid #eee;
    transition: background 0.3s ease;
  }

  #searchResults li:last-child {
    border-bottom: none;
  }

  #searchResults li:hover {
    background: #f9f9f9;
    cursor: pointer;
  }

  #searchResults li strong {
    color: #007bff;
    font-size: 18px;
  }

  #searchResults li span {
    color: #007bff;
    font-size: 18px;
    float: right;
  }

  #searchResults p {
    padding: 10px;
  }

  .total-calories {
    margin-top: 20px;
    font-weight: bold;
    font-size: 18px;
  }

  .calorie-boxes {
    display: flex;
    gap: 20px;
    margin-bottom: 20px;
  }

  .calorie-box {
    flex: 1;
    padding: 20px;
    background: white;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    text-align: center;
  }

  .calorie-box h4 {
    margin: 0 0 10px 0;
    color: #333;
  }

  .calorie-box .value {
    font-size: 24px;
    font-weight: bold;
    color: #007bff;
  }

  .clear-btn {
    margin-top: 20px;
    padding: 8px 16px;
    background: #dc3545;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
  }

  .clear-btn:hover {
    background: #c82333;
  }
</style>

<div class="content-wrapper">
  <section class="content">
    <div class="container-fluid">
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Daily Calorie's Intake</h3>
        </div>
      </div>

      <!-- Recommended and Todays Caloire  -->
      <div class="calorie-boxes">
        <div class="calorie-box">
          <h4>Today's Calories</h4>
          <div class="value" id="consumed-calories"><?php echo $today_calories; ?></div>
        </div>
        <div class="calorie-box">
          <h4>Recommended Daily Calories</h4>
          <div class="value" id="recommended-calories">0</div>
        </div>
      </div>

      <!-- Search or Add Food -->
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Search / Add Food</h3>
        </div>
        <div class="card-body">
          <input type="text" class="form-control" id="search" placeholder="Enter Food Name" autocomplete="off">
          <div id="searchResults"></div>
        </div>
      </div>

      <?php
      $food_items_query = "SELECT id, food_name, calories FROM user_calorie_intake WHERE user_id = $user_id";
      $food_items_result = mysqli_query($con, $food_items_query);
      ?>

      <!-- selected Food Table -->
      <div class="card mt-4">
        <div class="card-header">
          <h3 class="card-title">Selected Foods</h3>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Food Name</th>
                  <th>Weight</th>
                  <th>Calories</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody class="table_body">
                <?php if (mysqli_num_rows($food_items_result) > 0): ?>
                  <?php while ($food = mysqli_fetch_assoc($food_items_result)): ?>
                    <tr>
                      <td><?php echo htmlspecialchars($food['food_name']); ?></td>
                      <td>250gm</td>
                      <td><?php echo htmlspecialchars($food['calories']); ?></td>
                      <td>
                        <button class="btn btn-danger btn-sm"
                          onclick="removeFood(<?php echo $food['id']; ?>)">
                          Remove
                        </button>

                      </td>
                    </tr>
                  <?php endwhile; ?>
                <?php else: ?>
                  <tr>
                    <td colspan="4" class="text-center">No foods added today</td>
                  </tr>
                <?php endif; ?>
              </tbody>
            </table>
          </div>
          <div class="total-calories">Total Calories: <span><?php echo $today_calories; ?></span></div>
          <button class="clear-btn" onclick="clearAllFoods()">Clear All Foods</button>
        </div>
      </div>

    </div>
  </section>
</div>



<script>
  $(document).ready(function() {
    let selectedFoods = [];
    calculateRecommendedCalories();

    // Search Food
    $("#search").on("keyup", function() {
      let searchQuery = $(this).val();
      if (searchQuery !== "") {
        $.ajax({
          type: "POST",
          url: "search.php",
          data: {
            query: searchQuery
          },
          success: function(response) {
            $("#searchResults").html(response);

            $("#searchResults li").click(function() {
              const foodTitle = $(this).find('strong').text().split(' : ')[0];
              const calories = parseInt($(this).find('span').text());
              addFoodItem(foodTitle, calories);
              $("#search").val('');
              $("#searchResults").html('');
            });
          }
        });
      } else {
        $("#searchResults").html("");
      }
    });

    // Save Food Items to Database
    function addFoodItem(title, calories) {
      if (!selectedFoods.some(food => food.title === title)) {
        selectedFoods.push({
          title,
          calories
        });

        $.ajax({
          type: "POST",
          url: "save_food.php",
          data: {
            food_name: title,
            calories: calories
          },
          success: function(response) {
            if (response === 'success') {
              const currentCalories = parseInt($("#consumed-calories").text()) || 0;
              $("#consumed-calories").text(currentCalories + calories);
            }
          }
        });
        window.location.reload();
      }
    }
  });

  // Remove Food
  function removeFood(foodId) {
    $.ajax({
      type: "POST",
      url: "remove_food.php",
      data: {
        food_id: foodId
      },
      success: function(response) {
        if (response === 'success') {
          window.location.reload();
        } else {
          alert('Error removing food item');
        }
      }
    });
  }

  // Recommended Caloires with Activity Level
  function calculateRecommendedCalories() {
    const gender = '<?php echo $user_data['Gender']; ?>';
    const age = <?php echo $user_data['Age']; ?>;
    const weight = <?php echo $user_data['Weight']; ?>;
    const height = <?php echo $user_data['Height']; ?>;
    const activity = '<?php echo $user_data['Activity']; ?>';

    let result;
    if (gender === 'Male') {
        result = (66.5 + (13.75 * weight) + (5.003 * height) - (6.755 * age));
    } else {
        result = (655 + (9.563 * weight) + (1.850 * height) - (4.676 * age));
    }

    const multipliers = {
        "1": 1.2,
        "2": 1.375,
        "3": 1.55,
        "4": 1.725,
        "5": 1.9
    };

    if (activity && multipliers[activity]) {
        result *= multipliers[activity];
    }

    document.getElementById('recommended-calories').textContent = Math.round(result);
}


  // Clear all Food
  function clearAllFoods() {
    if (confirm('Are you sure you want to clear all foods for today?')) {
      $.ajax({
        type: "POST",
        url: "clear_foods.php",
        success: function(response) {
          if (response === 'success') {
            selectedFoods = [];
            updateSelectedFoodsList();
            $("#consumed-calories").text('0');
          }
        }
      });
      window.location = 'dashboard.php';
    }
  }
</script>

<?php include 'dashbord_includes/footer.php'; ?>