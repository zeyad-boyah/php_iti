<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // clear user input from any malicious inputs
    $name = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);
    $gender = $_POST["gender"];
    // mail_status is a checkbox so it can only return 1 as per the value it was set
    $mail_status = isset($_POST["mail_status"]) ? 1:0;

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: index.php?error=invalid_email");
        exit;
    } elseif (!$name || !$gender ) {
        header("Location: index.php?error=missing_data");
        exit;
    }
    $agree = isset($_POST['agree']) ? 1 : 0;

    // database inserting logic
    $server_name = "localhost";  
    $mysql_user_name = "root";         
    $mysql_password = "";            
    $dbname = "ITI";    

    // Create connection
    $conn = mysqli_connect($server_name, $mysql_user_name, $mysql_password, $dbname);

    if(! $conn ) {
        die('Could not connect: ' . mysqli_connect_error());
    }
     

    // Insert data into the database
    // to prevent SQL injection we need to prep the query
    $sql = "INSERT INTO users_iti (user_name, user_email, user_gender, mail_status) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    
    if (!$stmt) {
        die('Could not prepare statement: ' . mysqli_error($conn));
    }
    
    // Bind parameters (sssi indicates 3 strings and 1 integer) and this is also to prevent SQL injection
    mysqli_stmt_bind_param($stmt, "sssi", $name, $email, $gender, $mail_status);

    // Execute the statement
    $retval = mysqli_stmt_execute($stmt);

    if (!$retval) {
        
        die('Could not prepare statement: ' . mysqli_stmt_error($stmt));
    }
    
   mysqli_stmt_close($stmt);
   mysqli_close($conn);
}


// Redirect to the form page after processing
// header("Location: index.php");
exit;
