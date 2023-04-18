<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require_once '../backend/login_check.php';
require_once '../backend/config.php';

$id = $_GET["id"];

$query = "DELETE FROM `items` WHERE `ID` = $id";
        
$result = mysqli_query($mysqli, $query);
        
header('Location: ../frontend/browse.php');

// $item = mysqli_fetch_assoc($result);