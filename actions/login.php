<?php
session_start();
$email = $_POST['email'];
$password = $_POST['password'];
include 'connection.php';
$query = 'SELECT * FROM DATA WHERE EMAIL="' . $email . '" AND PASSWORD="' . $password . '"';
$data = $con->query($query)->fetch_assoc();
$_SESSION['FIRST_NAME'] = $data['FIRST_NAME'];
$_SESSION['LAST_NAME'] = $data['LAST_NAME'];
$_SESSION['EMAIL'] = $data['EMAIL'];
$_SESSION['PASSWORD'] = $data['PASSWORD'];
header('Location: /PHP-CRUD/');