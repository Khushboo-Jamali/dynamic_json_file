<?php

$conn = mysqli_connect('localhost', 'root', '', 'jsondata');
$sql = "SELECT * FROM students";
$result = mysqli_query($conn, $sql);

$output = mysqli_fetch_all($result, MYSQLI_ASSOC);

$json_data = json_encode($output, JSON_PRETTY_PRINT);
// echo "<pre>";
// print_r($output);
// echo "</pre>";
$file_name = "my-" . date("d-m-Y") . ".json";
if (file_put_contents("json/{$file_name}", $json_data)) {
    echo $file_name . " file created";
} else {
    echo "not found";
}
