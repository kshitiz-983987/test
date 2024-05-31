<?php
    $customer_name = $_POST['customer_name'];
    $contact_number = $_POST['contact_number'];
    $selected_size = $_POST['selected_size'];
    $selected_color = $_POST['selected_color'];

    $conn = mysqli_connect("localhost", "root", "", "footwear_db");
    mysqli_query($conn, "INSERT INTO `orders` (`customer_name`, `contact_number`, `selected_size`, `selected_color`) VALUES ('".$customer_name."', '".$contact_number."', '".$selected_size."', '".$selected_color."');");
    
    header("Location: ../order_confirmation.php");
?>
