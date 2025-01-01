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
        <form method="post" action="form_insert_logic.php">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" required>
            </div>
            
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
            </div>
            
            <div class="mb-3">
                <label class="form-label">Gender</label>
                <div>
                    <div class="form-check ">
                        <input class="form-check-input" type="radio" name="gender" id="male" value="male" required>
                        <label class="form-check-label" for="male">Male</label>
                    </div>
                    <div class="form-check ">
                        <input class="form-check-input" type="radio" name="gender" id="female" value="female" required>
                        <label class="form-check-label" for="female">Female</label>
                    </div>
                </div>
            </div>
            
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="mail_status" name ="mail_status" value= "1">
                <label class="form-check-label" for="mail_status">Receive E-mails from us.</label>
            </div>
            
            <button type="submit" class="btn btn-primary w-100">Register</button>
        </form>
        <a href="view_all.php" class="btn btn-primary mt-3 w-100">view all users</a>
        <?php
        // Display error message if "error" query parameter is set
        if (isset($_GET['error']) && $_GET['error'] == 'invalid_email') {
            echo "<p style='color: red;'>Invalid email format. Please enter a valid email address.</p>";
        }
        if (isset($_GET['error']) && $_GET['error'] == 'missing_data'){
            echo "<p style='color: red;'>missing name or gender or email status. Please don't edit the html.</p>";
        }
        ?>
    </div>

</body>
</html>
