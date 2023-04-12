<?php

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require 'config.php';
require_once 'login_check.php';

$name = $_POST["name"];
$user = $_SESSION['id'];

    

$query = "INSERT INTO `groups`(`name`, `user`) ";
$query .= "VALUES ('". $name ."','". $user ."')";

$result = mysqli_query($mysqli, $query);


if ($result) {
    header("Location: login.php.php");
}
else {
    echo "Er is een fout opgetreden";
}


?>