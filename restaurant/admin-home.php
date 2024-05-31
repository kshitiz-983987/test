<?php include('header.php');?>
<?php include('admin-nav.php');?>
<?php
    session_start();
    $_SESSION['loginErrorMessage'] = "";

    // Check if admin is logged in
    if ($_SESSION['admin_id'] > 0) {
        $_SESSION['loginErrorMessage'] = "";
    } else {
        $_SESSION['loginErrorMessage'] = "<div class='alert alert-danger'>You have not logged in. Please log in to proceed...</div>";
        header('Location: admin.php');
        exit(); // Stop script execution after redirection
    }
?>

<div class="content">
    <div class="content">
        <h1>Welcome to Alphafootware Admin Panel</h1>

        <h2>ADMIN HOME PAGE</h2>

        <h3>Select a Menu Option to Perform ADMIN Operation...</h3>

        <p><a href="admin-footwear-categories.php">Add or Delete Footwear Categories</a></p>
        <p><a href="admin-footwear-inventory.php">Add or Delete Footwear Inventory</a></p>
        <p><a href="admin-orders.php">View Orders</a></p>
        <p><a href="logout.php">Logout</a></p>
 
    </div>
</div>

<?php include('footer.php');?>
