<?php

require 'config.php';

$username = $_POST["inputusername"];
$password = $_POST["inputpassword"];



if (strlen($username)>0 && strlen($password)>0){
    // $password=sha1($password);

    $query = "SELECT * FROM `users` ";
    $query .= "WHERE username='$username' AND password='$password'";

    $querynaam = "SELECT 'name' FROM `users` ";
    $querynaam .= "WHERE name='$username' AND password='$password'";

    $queryww = "SELECT 'password' FROM `users` ";
    $queryww .= "WHERE name='$username' AND password='$password'";

    $queryid = "SELECT 'id' FROM `users` ";
    $queryid .= "WHERE name='$username' AND password='$password'";


    $result1 = mysqli_query($mysqli, $query);

    $result2 = mysqli_query($mysqli, $querynaam);

    $result3 = mysqli_query($mysqli, $queryww);

    $result4 = mysqli_query($mysqli, $queryid);

    

    if (mysqli_num_rows($result2) == 1){
        session_start();
        
        $_SESSION['id'] = $result4;
        header("Location: ../index.php");
        // echo "<p>Ingelogd ". $username ."!</p>";

    }
    else {
        echo "<p>Naam en of wachtwoord fout.</p>";
    }
    echo "<br><a href='login.php'>Ga Terug</a>";
}