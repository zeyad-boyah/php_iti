<?php


$server_name = "localhost";
$mysql_user_name = "root";
$mysql_password = "";
$dbname = "ITI";


$conn = mysqli_connect($server_name, $mysql_user_name, $mysql_password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


if (isset($_POST['user_id'])) {
    $user_id = $_POST['user_id'];

    // Check if user_id is a valid number
    if (is_numeric($user_id)) {
        // Query to fetch the record based on the ID
        $sql = "SELECT user_id, user_name, user_email, user_gender, mail_status FROM users_iti WHERE user_id = ?";

        // Prepare, bind and  execute the query to prevent SQL injection
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "i", $user_id);
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            // Include the HTML to display the data
            include 'view_one_record.php';
        } else {
            echo "No record found.";
        }
        mysqli_stmt_close($stmt);
    } else {
        echo "Invalid ID.";
    }
} else {
    echo "No ID specified.";
}

// Close the connection
mysqli_close($conn);
?>
