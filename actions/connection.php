<?php

$username = 'root';
$pwd = '';
$database = 'task';
$host = 'localhost';

$con = new mysqli($host, $username, $pwd, $database);

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}