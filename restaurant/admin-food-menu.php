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

        <h2>Manage Footwear Products</h2>

        <script>
            function confirm() {
                var product_name = document.getElementById('product_name').value;
                var product_price = document.getElementById('product_price').value;
                var product_details = document.getElementById('product_details').value;
                var product_image = document.getElementById('product_image').value;

                if (product_name !== null && product_name !== '' && product_price !== null && product_price !== '' && product_details !== null && product_details !== '' && product_image !== null && product_image !== '') {
                    alert("Footwear added to inventory Successfully.");
                }
            }
        </script>

        <form method="post" action="processing/admin-footwear.php">
            <p>** Image should be in htdoc -> alphafootware -> images -> footwear folder</p>
            <table>
                <tr>
                    <td>Footwear Name: *</td>
                    <td><input type="text" name="product_name" id="product_name" required="required"></td>
                </tr>
                <tr>
                    <td>Footwear Price: *</td>
                    <td><input type="number" step="0.01" name="product_price" id="product_price" required="required"></td>
                </tr>
                <tr>
                    <td>Footwear Details: *</td>
                    <td><input type="text" name="product_details" id="product_details" required="required"></td>
                </tr>
                <tr>
                    <td>Footwear Image Name: *</td>
                    <td><input type="file" name="product_image" id="product_image" required="required" accept="image/*"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="ADD FOOTWEAR to INVENTORY" name="submit" id="submit" onclick="return confirm()"></td>
                </tr>
            </table>
        </form>

        <h2>List of Footwear Products</h2>
        <table border="1">
            <tr>
                <th>Product ID</th>
                <th>Product Name</th>
                <th>Price</th>
                <th>Details</th>
                <th>Image Name</th>
                <th>Action</th>
            </tr>

            <?php
                $conn = mysqli_connect("localhost", "root", "", "footwear_db");
                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }

                $sql = mysqli_query($conn, "SELECT * FROM `footwear_products`");

                while ($data = mysqli_fetch_array($sql)) {
                    $product_id = $data['product_id'];
            ?>
            <tr>
                <td><?php echo $product_id; ?></td>
                <td><?php echo $data['product_name']; ?></td>
                <td><?php echo $data['product_price']; ?></td>
                <td><?php echo $data['product_details']; ?></td>
                <td><?php echo $data['product_image']; ?></td>
                <td><a href="processing/admin-delete-footwear.php?product_id=<?php echo $product_id ?>"><button type="button">Delete</button></a></td>
            </tr>
            <?php } ?>
        </table>
    </div>
</div>

<?php include('footer.php');?>
