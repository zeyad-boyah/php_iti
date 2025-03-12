<!DOCTYPE HTML>
<html>

<head>
    <style>
    .error {
        color: #FF0000;
    }
    </style>
</head>

<body>

    <?php

    $nameErr = $emailErr = $genderErr  = $agreeErr = "";
    $name = $email = $gender = $class_details = $group =  $agree = "";
    $Selected_courses = [];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["name"])) {
            $nameErr = "Name is required";
        } else {
            $name = test_input($_POST["name"]);
            if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
                $nameErr = "Only letters and white space allowed";
            }
        }

        if (empty($_POST["email"])) {
            $emailErr = "Email is required";
        } else {
            $email = test_input($_POST["email"]);
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Invalid email format";
            }
        }

        if (empty($_POST["group"])) {
            $group = "";
        } else {
            $group = test_input($_POST["group"]);
        }

        if (empty($_POST["class_details"])) {
            $class_details = "";
        } else {
            $class_details = test_input($_POST["class_details"]);
        }

        if (empty($_POST["gender"])) {
            $genderErr = "Gender is required";
        } else {
            $gender = test_input($_POST["gender"]);
        }

        if (empty($_REQUEST["selected_courses"])) {
            $Selected_courses = [];
        } else {
            $Selected_courses = $_POST["selected_courses"];
        }

        if (empty($_REQUEST["agree"])){
            $agreeErr = " You must agree to terms";
            $agree = null;
        }
        else{
            $agree = $_REQUEST["agree"];
        }
    }

    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    ?>

    <h2>Application name: AAST_BIS class registration</h2>
    <p><span class="error">* Required field</span></p>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <table>
            <tr>
                <td>Name:</td>
                <td>
                    <input type="text" name="name" value="<?php echo $name; ?>">
                </td>
                <td>
                    <span class="error">* <?php echo $nameErr; ?></span>
                </td>
            </tr>
            <tr>
                <td>E-mail:</td>
                <td>
                    <input type="text" name="email" value="<?php echo $email; ?>">
                </td>
                <td>
                    <span class="error">* <?php echo $emailErr; ?></span>
                </td>
            </tr>
            <tr>
                <td>Group #</td>
                <td>
                    <input type="text" name="group" value="<?php echo $group; ?>">
                </td>
            </tr>
            <tr>
                <td>class details:</td>
                <td colspan="2">
                    <textarea name="class_details" rows="5" cols="40"><?php echo $class_details; ?></textarea>
                </td>
            </tr>
            <tr>
                <td>Gender:</td>
                <td>
                    <input type="radio" name="gender"
                        <?php if (isset($gender) && $gender == "female") echo "checked"; ?> value="female">Female
                    <input type="radio" name="gender" <?php if (isset($gender) && $gender == "male") echo "checked"; ?>
                        value="male">Male
                </td>
                <td>
                    <span class="error">* <?php echo $genderErr; ?></span>
                </td>
            </tr>
            <tr>
                <td>
                    Select courses:
                </td>
                <td>
                    <select name="selected_courses[]" multiple>
                        <option value="PHP" <?php echo (in_array("PHP", $Selected_courses)) ? "selected" : ""; ?>>PHP</option>
                        <option value="Java Script" <?php echo (in_array("Java Script", $Selected_courses)) ? "selected" : ""; ?>>Java Script</option>
                        <option value="MySQL" <?php echo (in_array("MySQL", $Selected_courses)) ? "selected" : ""; ?>>MySQL</option>
                        <option value="HTML" <?php echo (in_array("HTML", $Selected_courses)) ? "selected" : ""; ?>>HTML</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Agree</td>
                <td>
                    <input type="checkbox" name="agree" value="yes"
                        <?php if (isset($agree) && $agree == "yes") echo "checked"; ?>>
                </td>
                <td>
                    <span class="error">* <?php echo $agreeErr; ?></span>
                </td>
            </tr>
        </table>
        <input type="submit" name="submit" value="Submit">
    </form>


    <?php
    echo "<h2>Your Input:</h2>";
    echo "Name: " . $name;
    echo "<br>";
    echo "E-mail: " . $email;
    echo "<br>";
    echo "Group #:" . $group;
    echo "<br>";
    echo "Class details: " . $class_details;
    echo "<br>";
    echo "Gender: " . $gender;
    echo "<br>";
    echo "Your courses are: ";
    foreach ($Selected_courses as $course) {
        echo $course . ", ";
    }
    ?>

</body>

</html>