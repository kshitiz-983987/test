<?php
		$category_name = $_POST['category_name'];
		$category_details = $_POST['category_details'];

		$conn = mysqli_connect("localhost", "root", "", "restaurant_db");
		mysqli_query($conn, "INSERT INTO `food_category` (`category_name`, `category_details`) VALUES ('".$category_name."', '".$category_details."');");
		
		header("Location: ../admin-food-category.php");
?>