<?php
		$category_id = $_POST['category_id'];
		$food_name = $_POST['food_name'];
		$food_price = $_POST['food_price'];
		$food_details = $_POST['food_details'];
		$food_image = $_POST['food_image'];

		$conn = mysqli_connect("localhost", "root", "", "restaurant_db");
		mysqli_query($conn, "INSERT INTO `food_menu` (`category_id`, `food_name`, `food_price`, `food_details`, `food_image`) VALUES ('".$category_id."', '".$food_name."', '".$food_price."', '".$food_details."', '".$food_image."');");
		
		header("Location: ../admin-food-menu.php");
?>