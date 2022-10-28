<?php
// Creating Variables for All Values Except Image
$data_arr = array();
$form_data = isset($_POST['form_data']) ? parse_str($_POST['form_data'], $data_arr) : array();
$firstName = $data_arr['firstName'];
$lastName = $data_arr['lastName'];
$email = $data_arr['email'];
$password = $data_arr['password'];
$confirm_password = $data_arr['confirm_password'];
if ($password !== $confirm_password) {
    print_r('Invalid Passwords');
    die();
}
// Updating Data For A Record
function getFile_name()
{
    $file_names = [];
    for ($i = 0; $i < sizeof($_FILES['image']['name']); $i++) {
        $file_name = $_FILES['image']['name'][$i];
        $file_tmp = $_FILES['image']['tmp_name'][$i];
        $file = "/xampp/htdocs/PHP-CRUD/images/" . $file_name;
        if (move_uploaded_file($file_tmp, $file)) {
            $file_names[] = $file_name;
        }
    }
    $file_names = json_encode($file_names);
    $escapes = array("\\", "/", "\"", "\n", "\r", "\t", "\x08", "\x0c");
    $replacements = array("\\\\", "\\/", "\\\"", "\\n", "\\r", "\\t", "\\f", "\\b");
    return str_replace($escapes, $replacements, $file_names);
}

if ($data_arr['user_id']) {
    if (isset($_FILES['image'])) {
        $file_name = getFile_name();
        $insert_record_query = 'UPDATE DATA SET FIRST_NAME="' . $firstName . '",LAST_NAME="' . $lastName . '", EMAIL="' . $email . '",PASSWORD="' . $password . '",IMAGES="' . $file_name . '" WHERE ID=' . $data_arr['user_id'];
    } else {
        $insert_record_query = 'UPDATE DATA SET FIRST_NAME="' . $firstName . '",LAST_NAME="' . $lastName . '", EMAIL="' . $email . '",PASSWORD="' . $password . '" WHERE ID=' . $data_arr['user_id'];
    }
    include('connection.php');
    // Updating Records
    if ($con->query($insert_record_query)) {
        print_r('Record Updated Successfully');
    }
} else {
    // Creating New Record
    if (isset($_FILES)) {

        include('connection.php');
        // Building Queries
        $check_table_query = 'SHOW TABLES';
        $create_table_query = 'CREATE TABLE DATA(ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY, FIRST_NAME VARCHAR(50), LAST_NAME VARCHAR(50), EMAIL VARCHAR(50) UNIQUE , PASSWORD VARCHAR(50), IMAGES MEDIUMTEXT, STATUS INTEGER(1) DEFAULT 0, TOKEN INTEGER(6) NOT NULL) ';
        $res = $con->query($check_table_query);
        if ($res->num_rows == 0) {
            $con->close();
            include('connection.php');
            $con->query($create_table_query);
            $con->close();
        }

        $file_names = getFile_name();
        // Loading Database Connection File
        $insert_record_query = 'INSERT INTO DATA
        (FIRST_NAME, LAST_NAME, EMAIL, PASSWORD , IMAGES , TOKEN) values 
        ("' . $firstName . '","' . $lastName . '","' . $email . '","' . $confirm_password . '","' . $file_names . '","' . rand(100000, 999999) . '")';
        // Executing Table Check Query And creating If Not Exists
        include('connection.php');
        // Saving Records
        if ($con->query($insert_record_query)) {
            print_r('Record Added Successfully');
        }
    }
}