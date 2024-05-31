<?php
session_start();

if (isset($_POST['submit'])) {
    $admin_username = $_POST['admin_username'];
    $admin_password = $_POST['admin_password'];

    // Check if username and password are empty
    if (empty($admin_username) || empty($admin_password)) {
        header('Location: ../admin-login-failed.php?error=emptyfields');
        exit();
    }

    $conn = mysqli_connect("localhost", "root", "", "restaurant_db");
    if (!$conn) {
        // Handle database connection error gracefully
        header('Location: ../admin-login-failed.php?error=dberror');
        exit();
    }

    $sql = "SELECT * FROM admin WHERE admin_username = ? AND admin_password = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ss", $admin_username, $admin_password);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) > 0) {
        $data = mysqli_fetch_assoc($result);
        $_SESSION['admin_id'] = $data['id']; // Set admin_id session variable
        header('Location: ../admin-home.php');
        exit();
    } else {
        // Handle invalid login credentials
        header('Location: ../admin-login-failed.php?error=invalidlogin');
        exit();
    }
} else {
    // Redirect users if they try to access this page directly without submitting the form
    header('Location: ../admin.php');
    exit();
}
?>
