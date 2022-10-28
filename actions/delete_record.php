<?php
$item_id = $_GET['id'];
$query = 'DELETE FROM DATA WHERE(id=' . $item_id . ')';
include('./connection.php');
if ($con->query($query)) {
    echo '<script>alert("Record Deleted Successfully")</script>';
    header('Location: ../records.php');
} else {
    echo 'Nothing Deleted Check Errors';
    header('Location: /');
    die();
}