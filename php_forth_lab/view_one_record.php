<!-- view_user_html.php (HTML file) -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View User</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5 ">
        <h2 class="text-center">User Details</h2>
        <div class="card">
            <div class="card-body">
                <div class="mb-3">
                    <label for="name" class="form-label" style="font-weight: bold;">Name</label>
                    <p class="card-title" name="name"><?php echo htmlspecialchars($row['user_name']); ?></p>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label" style="font-weight: bold;">Email</label>
                    <p class="card-text" name="email"><?php echo htmlspecialchars($row['user_email']); ?></p>
                </div>

                <div class="mb-3">
                    <label class="gender" style="font-weight: bold;">Gender</label>
                    <div>
                        <p class="card-text" name="gender"> <?php echo htmlspecialchars($row['user_gender']); ?></p>
                    </div>
                </div>

                <div class="mb-3 ">
                    <label class="mail" for="mail_status" style="font-weight: bold;">Receive E-mails from us.</label>
                    <p class="card-text" name="mail"><?php echo ($row['mail_status'] ? 'Yes' : 'No'); ?></p>
                </div>
            </div>
        </div>
        <a href="view_all.php" class="btn btn-primary mt-3">Back to List</a>
        <a href="index.php" class="btn btn-primary mt-3">Register a new user</a>
    </div>
</body>

</html>