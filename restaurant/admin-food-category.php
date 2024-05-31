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

        <h2>Manage Footwear Categories</h2>

        <script>
            function confirm() {
                var category_name = document.getElementById('category_name').value;
                var category_details = document.getElementById('category_details').value;

                if (category_name !== null && category_name !== '' && category_details !== null && category_details !== '') {
                    alert("Footwear Category added Successfully.");
                }
            }
        </script>

        <form method="post" action="processing/admin-category.php">
            <table>
                <tr>
                    <td>Footwear Category Name: *</td>
                    <td><input type="text" name="category_name" id="category_name" required="required"></td>
                </tr>
                <tr>
                    <td>Footwear Category Details: *</td>
                    <td><input type="text" name="category_details" id="category_details" required="required"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="ADD FOOTWEAR CATEGORY" name="submit" id="submit" onclick="return confirm()"></td>
                </tr>
            </table>
        </form>

        <h2>List of Footwear Categories</h2>
        <p>
            <table border="1">
                <tr>
                    <th>Category ID</th>
                    <th>Footwear Category Name</th>
                    <th>Footwear Category Details</th>
                    <th>Action</th>
                </tr>
                <?php
                    $conn = mysqli_connect("localhost", "root", "", "footwear_db");
                    if (!$conn) {
                        die("Connection failed: " . mysqli_connect_error());
                    }

                    $sql = mysqli_query($conn, "SELECT * FROM `footwear_categories`");

                    while ($data = mysqli_fetch_array($sql)) {
                        $category_id = $data['category_id'];
                        $category_name = $data['category_name'];
                        $category_details = $data['category_details'];
                ?>
                <tr>
                    <td><?php echo $category_id; ?></td>
                    <td><?php echo $category_name; ?></td>
                    <td><?php echo $category_details; ?></td>
                    <td><a href="processing/admin-delete-category.php?category_id=<?php echo $category_id ?>"><button type="button">Delete</button></a></td>
                </tr>
                <?php } ?>
            </table>
        </p>
    </div>
</div>

<?php include('footer.php');?>
