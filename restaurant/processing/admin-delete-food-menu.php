<?php
	$food_menu_id = $_GET['food_menu_id'];
	$conn = mysqli_connect("localhost", "root", "", "restaurant_db");
    mysqli_query($conn, "DELETE FROM `food_menu` WHERE food_menu_id = ".$food_menu_id);

    
	header('Location: ../admin-food-menu.php');
?>