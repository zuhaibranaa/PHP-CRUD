<?php
include('connection.php');
if (isset($_POST['token']) && isset($_POST['email'])) {
    $sqlQuery = 'SELECT TOKEN FROM DATA WHERE EMAIL="' . $_POST['email'] . '"';
    try {
        $token = $con->query($sqlQuery)->fetch_assoc()['TOKEN'];
    }catch (Exception $e){
        print_r('Enter Valid Email Or Token');
        die();
    }
    if ($_POST['token'] === $token) {
        include "connection.php";
        $sqlQuery = 'UPDATE DATA SET STATUS="1" WHERE EMAIL="' . $_POST['email'] . '"';
        if ($con->query($sqlQuery)) {
            print_r("Verified Successfully");
        }
    } else {
        print_r('Invalid Token');
    }
} else {
    print_r('Kindly input Both Token And Email');
    die();
}
