<?php

$server_name = "localhost";
$mysql_user_name = "root";
$mysql_password = "";
$dbname = "ITI";

// Create connection
$conn = mysqli_connect($server_name, $mysql_user_name, $mysql_password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Query to fetch data
$sql = "SELECT user_id, user_name, user_email, user_gender, mail_status FROM users_iti";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<tr>';
        echo '<td>' . htmlspecialchars($row["user_id"]) . '</td>';
        echo '<td>' . htmlspecialchars($row["user_name"]) . '</td>';
        echo '<td>' . htmlspecialchars($row["user_email"]) . '</td>';
        echo '<td>' . htmlspecialchars($row["user_gender"]) . '</td>';
        echo '<td>' . ($row["mail_status"] ? 'yes' : 'no') . '</td>';
        // buttons for manipulating the data later
        echo '<td>
            <a href="view.php?id=' . htmlspecialchars($row["user_id"]) . '" class="btn btn-info btn-sm  rounded-circle btn-lg" title="View" >
                <i class="fas fa-eye" style="color: white;"></i>
            </a>
                <a href="edit.php?id=' . htmlspecialchars($row["user_id"]) . '" class="btn btn-warning btn-sm" title="Edit">
                    <i class="fas fa-edit" style="color: white;"></i>
                </a>
                <a href="delete.php?id=' . htmlspecialchars($row["user_id"]) . '" class="btn btn-danger btn-sm" title="Delete" onclick="return confirm(\'Are you sure?\')">
                    <i class="fas fa-trash-alt"></i>
                </a>
            </td>';
        echo '</tr>';
    }
} else {
    echo '<tr><td colspan="5" class="text-center">No records found</td></tr>';
}

// Close the connection
mysqli_close($conn);
