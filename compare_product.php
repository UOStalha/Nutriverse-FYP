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

	.dish-1,
	.dish-2 {
		box-shadow: 4px 4px 10px rgba(37, 35, 42, 0.2);
		border-radius: 20px;
		padding: 40px 20px;
		/* display: none; */
	}

	.dish-row {
		text-align: center;
	}

	.dish-row h2 {
		font-weight: 700;
	}

	.dish-row img {
		border-radius: 14px;
		width: 60%;
		height: 200px;
		margin: 20px 0;
	}

	.dish-row p {
		font-size: 20px;
		margin: 20px 0;
		padding: 0.5rem;
	}

	.dish-row p span {
		font-weight: 600;
		color: #FF8C00;
	}

	.compare-btn {
		text-align: center;
	}

	.compare-btn button {
		padding: 6px 16px;
		border: 2px solid #FF8C00;
		background: none;
		border-radius: 10px;
		color: #FF8C00;
		font-weight: 600;
	}

	.compare-btn button:hover {
		border: 2px solid transparent;
		background-color: #FF8C00;
		color: #fff;
	}

	.dropdown-container {
		position: relative;
		width: 200px;

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

	.select-box {
		display: flex;
		flex-direction: column;
		align-items: center;
	}
</style>
<?php include('include/navbar.php') ?>


<!--------- box----------  -->

<section id="hero2" class="d-flex align-items-center justify-content-center">
	<div class="container" data-aos="fade-up">
		<div class="row justify-content-center" data-aos="fade-up" data-aos-delay="150">
			<div class="col-xl-12 col-lg-8">
				<a href="#" class="heading">
					<h1 class="text-center display-5">Compare Dishes</h1>
				</a>
			</div>
		</div>
	</div>
</section><!-- End Hero -->

<!-- Comparison Section -->
<section>
	<div class="container-fluid compare-section float-start">
		<div class="container">
			<div class="col-lg-12 col-md-12 col-sm-12">
				<div class="section-title">
					<h2>Compare</h2>
					<p>Dishes</p>
				</div>
			</div>

			<!-- compare-filter -->

			<div class="col-12 d-inline-block mb-4">

				<!-- Form Start -->
				<form method="POST" id="compareForm">
					<div class="col-5 col-md-5 col-sm-5 select-box float-start">
						<select name="search5" id="dish1" class="form-control">
							<option value="">Select Dish One</option>
							<?php
							$sel = mysqli_query($con, "SELECT `content_title` FROM `category_details`");
							while ($fetch = mysqli_fetch_assoc($sel)) {
								echo '<option value="' . $fetch['content_title'] . '">' . $fetch['content_title'] . '</option>';
							}
							?>
						</select>
					</div>

					<div class="col-5 col-md-5 col-sm-5 select-box float-end">
						<select name="search6" id="dish2" class="form-control">
							<option value="">Select Dish Two</option>
							<?php
							$sel = mysqli_query($con, "SELECT `content_title` FROM `category_details`");
							while ($fetch = mysqli_fetch_assoc($sel)) {
								echo '<option value="' . $fetch['content_title'] . '">' . $fetch['content_title'] . '</option>';
							}
							?>
						</select>
					</div>

					<div class="col-2 col-md-2 col-sm-2 compare-btn float-start">
						<button type="submit" name="compare" id="submitBtn" disabled>Compare</button>
					</div>
				</form>
				<!-- Form End -->
			</div>

			<!-- Compare Result -->
			<?php
			if (isset($_POST['compare']) && !empty($_POST['search5']) && !empty($_POST['search6'])) {
				$dish1 = mysqli_real_escape_string($con, $_POST['search5']);
				$dish2 = mysqli_real_escape_string($con, $_POST['search6']);

				$query1 = mysqli_query($con, "SELECT * FROM category_details WHERE content_title='$dish1'");
				$query2 = mysqli_query($con, "SELECT * FROM category_details WHERE content_title='$dish2'");

				$data1 = mysqli_fetch_assoc($query1);
				$data2 = mysqli_fetch_assoc($query2);

				$content_title = $data1['content_title'];
				$image = $data1['image'];
				$ingridients = $data1['incridients'];
				$fats = $data1['fats'];
				$cholesterol = $data1['cholesterol'];
				$sodium = $data1['sodium'];
				$potassium = $data1['potassium'];
				$carbohydrate = $data1['carbohydrate'];
				$protein = $data1['protein'];
				$add_calories = $data1['add_calories'];

				$content_title2 = $data2['content_title'];
				$image2 = $data2['image'];
				$ingridients2 = $data2['incridients'];
				$fats2 = $data2['fats'];
				$cholesterol2 = $data2['cholesterol'];
				$sodium2 = $data2['sodium'];
				$potassium2 = $data2['potassium'];
				$carbohydrate2 = $data2['carbohydrate'];
				$protein2 = $data2['protein'];
				$add_calories2 = $data2['add_calories'];
			?>

				<!-- Dish Comparison Section -->
				<section id="comparison-section">
					<div class="col-5 col-lg-5 col-md-5 dish-1 ms-3 float-start">
						<div class="dish-row">
							<h2><?php echo $content_title; ?></h2>
							<img class="postcard__img" src="dashboard/<?php echo $image; ?>" alt="Image Title" />
							<p class="float-start"><span>Ingredients:</span> <?php echo $ingridients; ?></p>
						</div>
						<table class="table">
							<tbody class="table-group">
								<tr>
									<th>Fats</th>
									<td><?php echo $fats; ?> G</td>
								</tr>
								<tr>
									<th>Cholesterol</th>
									<td><?php echo $cholesterol; ?> G</td>
								</tr>
								<tr>
									<th>Sodium</th>
									<td><?php echo $sodium; ?> G</td>
								</tr>
								<tr>
									<th>Potassium</th>
									<td><?php echo $potassium; ?> G</td>
								</tr>
								<tr>
									<th>Carbohydrate</th>
									<td><?php echo $carbohydrate; ?> G</td>
								</tr>
								<tr>
									<th>Protein</th>
									<td><?php echo $protein; ?> G</td>
								</tr>
								<tr>
									<th>Total Calories</th>
									<td><?php echo $add_calories; ?> G</td>
								</tr>
							</tbody>
						</table>
					</div>

					<div class="col-5 col-lg-5 col-md-5 dish-2 me-3 float-end">
						<div class="dish-row">
							<h2><?php echo $content_title2; ?></h2>
							<img src="dashboard/<?php echo $image2; ?>" alt="Dish Two">
							<p class="float-start"><span>Ingredients:</span> <?php echo $ingridients2; ?></p>
						</div>
						<table class="table">
							<tbody class="table-group">
								<tr>
									<th>Fats</th>
									<td><?php echo $fats2; ?> G</td>
								</tr>
								<tr>
									<th>Cholesterol</th>
									<td><?php echo $cholesterol2; ?> G</td>
								</tr>
								<tr>
									<th>Sodium</th>
									<td><?php echo $sodium2; ?> G</td>
								</tr>
								<tr>
									<th>Potassium</th>
									<td><?php echo $potassium2; ?> G</td>
								</tr>
								<tr>
									<th>Carbohydrate</th>
									<td><?php echo $carbohydrate2; ?> G</td>
								</tr>
								<tr>
									<th>Protein</th>
									<td><?php echo $protein2; ?> G</td>
								</tr>
								<tr>
									<th>Total Calories</th>
									<td><?php echo $add_calories2; ?> G</td>
								</tr>
							</tbody>
						</table>
					</div>
				</section>
			<?php
			}
			?>

			<script>
				document.addEventListener("DOMContentLoaded", function() {
					const dish1 = document.getElementById("dish1");
					const dish2 = document.getElementById("dish2");
					const submitBtn = document.getElementById("submitBtn");

					function checkSelection() {
						if (dish1.value !== "" && dish2.value !== "") {
							submitBtn.removeAttribute("disabled");
						} else {
							submitBtn.setAttribute("disabled", "disabled");
						}
					}

					dish1.addEventListener("change", checkSelection);
					dish2.addEventListener("change", checkSelection);
				});
			</script>
</section>
<?php include 'include/footer.php' ?>