<?php include('header.php');?>
<?php include('admin-nav.php');?>
<?php
    session_start();
    $_SESSION['loginErrorMessage'] = "";

    // Check if admin is logged in
    if ($_SESSION['admin_id'] <= 0) {
        $_SESSION['loginErrorMessage'] = "<div class='alert alert-danger'>You have not logged in. Please log in to proceed...</div>";
        header('Location: admin.php');
        exit(); // Stop script execution after redirection
    }
?>

<div class="content">
    <div class="content">
        <h1>Welcome to Alphafootware Admin Panel</h1>

        <h2>Today's Reservation Details</h2>

        <table border="1">
            <tr>
                <th>Reservation ID</th>
                <th>Reserved By</th>
                <th>Phone Number</th>
                <th>Party Size</th>
                <th>Date</th>
                <th>Time</th>
            </tr>

            <?php
                $conn = mysqli_connect("localhost", "root", "", "footwear_db");
                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }

                $today_date = date('Y-m-d');
                $sql = mysqli_query($conn, "SELECT * FROM `reservations` WHERE date = '$today_date' ORDER BY time");

                while($data = mysqli_fetch_array($sql)){
                    $reservation_id = $data['reservation_id']; 
                    echo "<tr>";
                        echo "<td>".$reservation_id."</td>";
                        echo "<td>".$data['reserved_by']."</td>";
                        echo "<td>".$data['phone_number']."</td>";
                        echo "<td>".$data['party_size']."</td>";
                        echo "<td>".$data['date']."</td>";
                        echo "<td>".$data['time']."</td>";
                    echo "</tr>";
                }
            ?>
        </table>
    </div>
</div>

<?php include('footer.php');?>
