<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // clear user input from any malicious inputs
    $name = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);
    $gender = $_POST["gender"];
    
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Proceed with further logic (e.g., store in a database, etc.)
        echo "Form submitted successfully!";
    } else {
        header("Location: index.php?error=invalid_email");
        exit;
    }
}


// Redirect to the form page after processing
// header("Location: index.php");
exit;


