<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP 1st lab</title>
</head>

<body>
    <?php
        // phpinfo();
        define('website_name','PHP 1st lab');
        echo website_name ;
        echo '<br>';
        
        // Show your server name, address, port,filename and path of the currently executing script.
        echo "server name: ",$_SERVER['SERVER_NAME'];
        echo '<br>';
        echo "The current Server address is: " , $_SERVER['SERVER_ADDR'];
        echo '<br>';
        echo "The current port number is: " , $_SERVER['SERVER_PORT'];
        echo '<br>';
        echo "The current file name is: " , __FILE__;
        echo '<br>';
        echo "The current path is: ", __DIR__;
        echo '<br>';

        $brother_age = 10;

        switch ($brother_age) {
            case ($brother_age < 5):
                print 'Stay at home';
                break;
            case ($brother_age == 5):
                print "Go to kindergarten";
                break;
            case ($brother_age >= 6 && $brother_age <= 12):
                print "Go to grade: XXX";
                break;
        }


    ?>
</body>

</html>