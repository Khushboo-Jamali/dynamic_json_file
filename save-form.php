<?php
if ($_POST['name'] != '' || $_POST['email'] != '' || $_POST['password'] != '') {
    if (file_exists('json/student_data.json')) {
        $current_data = file_get_contents('json/student_data.json');
        $array_data = json_decode($current_data, true);
        $new_data = array(
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'password' => $_POST['password']
        );
        $array_data[] = $new_data;
        $json_data = json_encode($array_data, JSON_PRETTY_PRINT);
        if (file_put_contents('json/student_data.json', $json_data)) {
            echo "Successfully saved data";
        } else {
            echo "Error";
        }
    } else {
        echo "UnSuccessfully saved data";
    }
} else {
    echo "<h3>All form fields are required </h3>";
}
