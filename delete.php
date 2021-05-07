<?php
require "./users.php";

if (!isset($_GET['id'])) {
    echo "not found";
    exit;
}
$userId = $_GET['id'];
deleteUser($userId);
header("location: index.php");
?>