<!-- view data first in a form that looks like the reg form -->
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




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h2 class="text-center">Registration Form</h2>
        <p>Please fill this form and submit to add user record to the database.</p>
        <!-- make a form and redirect the input data to the server side -->
        <form method="post" action="edit_logic.php">
            <input type="hidden" name="user_id" value="<?php echo htmlspecialchars($row['user_id']); ?>">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name"
                    value="<?php echo isset($row['user_name']) ? htmlspecialchars($row['user_name']) : ''; ?>"
                    <?php echo empty($row['user_name']) ? 'required' : '';?>>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email"
                    value="<?php echo isset($row['user_email']) ? htmlspecialchars($row['user_email']) : ''; ?>"
                    <?php echo empty($row['user_email']) ? 'required' : '';?>>
            </div>

            <div class="mb-3">
                <label class="form-label">Gender</label>
                <div>
                    <div class="form-check ">
                        <input class="form-check-input" type="radio" name="gender" id="male" value="male"
                            <?php echo ($row['user_gender'] == 'male' ? 'checked' : ''); ?> required>
                        <label class="form-check-label" for="male">Male</label>
                    </div>
                    <div class="form-check ">
                        <input class="form-check-input" type="radio" name="gender" id="female" value="female"
                            <?php echo ($row['user_gender'] == 'female' ? 'checked' : ''); ?> required>
                        <label class="form-check-label" for="female">Female</label>
                    </div>
                </div>
            </div>

            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="mail_status" name="mail_status"
                    <?php echo ($row['mail_status'] ? 'checked' : ''); ?> value="1">
                <label class="form-check-label" for="mail_status">Receive E-mails from us.</label>
            </div>

            <button type="submit" class="btn btn-primary w-100">Edit</button>
        </form>
        <a href="view_all.php" class="btn btn-primary mt-3 w-100">view all users</a>


    </div>

</body>

</html>