<?php 
session_start();
setcookie("sus","susuus");
echo '<pre>';
var_dump($_SESSION);
echo '</pre>';

if (isset($_SESSION['visit_count'])){
    $_SESSION['visit_count'] += 1;
} else {
    $_SESSION['visit_count'] = 1;
}

$msg = "You have visited my website {$_SESSION['visit_count']} times." ;


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    echo "$msg";
    ?>
</body>
</html>