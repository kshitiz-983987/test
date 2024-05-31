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

        <h2>All Orders</h2>

        <p>
            <form method="post">
                Search by Date: <input type="date" name="inputDate" id="inputDate" />
                <input type="submit" name="submit" />
            </form>
        </p>

        <table border="1">
            <tr>
                <th>Order ID</th>
                <th>Customer Name</th>
                <th>Email</th>
                <th>Product</th>
                <th>Quantity</th>
                <th>Date</th>
                <th>Action</th>
            </tr>

            <?php
                $conn = mysqli_connect("localhost", "root", "", "footwear_db");
                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }

                $sql = mysqli_query($conn, "SELECT * FROM `orders`");

                if (isset($_POST['inputDate'])) {
                    $sql = mysqli_query($conn, "SELECT * FROM orders WHERE date = '" . $_POST['inputDate'] . "'");
                }

                while ($data = mysqli_fetch_array($sql)) {
                    $order_id = $data['order_id'];
                    echo "<tr>";
                    echo "<td>".$order_id."</td>";
                    echo "<td>".$data['customer_name']."</td>";
                    echo "<td>".$data['email']."</td>";
                    echo "<td>".$data['product']."</td>";
                    echo "<td>".$data['quantity']."</td>";
                    echo "<td>".$data['date']."</td>";
                    echo "<td><a href='processing/admin-delete-order.php?order_id=$order_id'>Delete</a></td>";
                    echo "</tr>";
                }
            ?>
        </table>
    </div>
</div>

<?php include('footer.php');?>
