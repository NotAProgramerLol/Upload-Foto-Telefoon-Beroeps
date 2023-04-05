<?php

require 'config.php';

$username = $_POST["inputusername"];
$password = $_POST["inputpassword"];



if (strlen($username)>0 && strlen($password)>0){
    // $password=sha1($password);

    $query = "SELECT * FROM users ";
    $query .= "WHERE name='$username' AND password='$password'";
    echo $query;
    $result1 = mysqli_query($mysqli, $query);


    if (mysqli_num_rows($result1) == 1){
        session_start();
        $row = mysqli_fetch_assoc($result1);
        $_SESSION['id'] = $row['ID'];
        header("Location: ../index.php");
        // echo "<p>Ingelogd ". $row['ID'] ."!</p>";

    }
    else {
        echo "<p>Naam en of wachtwoord fout.</p>";
    }
    echo "<br><a href='login.php'>Ga Terug</a>";
}