<?php

$server_name = "localhost";
$mysql_user_name = "root";
$mysql_password = "";
$dbname = "ITI";

// Create connection
$conn = mysqli_connect($server_name, $mysql_user_name, $mysql_password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the posted data
    $user_id = $_POST['user_id'];

    // sql delete by id
    $sql = "DELETE FROM users_iti WHERE user_id = ?";

    // Prepare and execute the query to prevent SQL injection
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $user_id);
    $retval = mysqli_stmt_execute($stmt);


    if ( $retval) {
        // Redirect to view all records
        header("Location: view_all.php");
        exit;
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
    mysqli_stmt_close($stmt);
}

// Close the connection
mysqli_close($conn);
