<?php
	$category_id = $_GET['category_id'];
	echo "category_id= ".$category_id;
	$conn = mysqli_connect("localhost", "root", "", "restaurant_db");
    mysqli_query($conn, "DELETE FROM `food_category` WHERE category_id = ".$category_id);

    
	header('Location: ../admin-food-category.php');
?>