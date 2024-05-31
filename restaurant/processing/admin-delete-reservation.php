<?php
	$reservation_id = $_GET['reservation_id'];
	$conn = mysqli_connect("localhost", "root", "", "restaurant_db");
    mysqli_query($conn, "DELETE FROM `reservation` WHERE reservation_id = ".$reservation_id);

    
	header('Location: ../admin-all-reservation.php');
?>