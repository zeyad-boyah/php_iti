<?php
$students = [
    ['name' => 'Alaa', 'email' => 'ahmed@test.com', 'track' => 'PHP'],
    ['name' => 'Shamy', 'email' => 'ali@test.com', 'track' => 'CMS'],
    ['name' => 'Youssef', 'email' => 'basem@test.com', 'track' => 'PHP'],
    ['name' => 'Waleid', 'email' => 'farouk@test.com', 'track' => 'CMS'],
    ['name' => 'Rahma', 'email' => 'hany@test.com', 'track' => 'PHP'],
];

echo "<h1>Application Name: PHP class registration</h1>";
echo "<table border='1' style='border-collapse: collapse;'>";
echo "<thead><tr>";

echo "<table border='1' style='border-collapse: collapse; border: none;'>";
echo "<thead><tr>";
foreach (array_keys(current($students)) as $key) {
    echo "<th>" . $key . "</th>";
}
echo "</tr></thead><tbody>";
foreach ($students as $student) {
    if ($student['track'] == 'CMS') {
        echo "<tr style='color: red;' >";
        foreach ($student as $data) {
            echo "<td>" . $data . "</td>";
        }
        echo "</tr>";
    } else {
        echo "<tr>";
        foreach ($student as $data) {
            echo "<td>" . $data . "</td>";
        }
        echo "</tr>";
    }
}


echo "</tbody></table>";