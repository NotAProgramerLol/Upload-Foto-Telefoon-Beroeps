<?php

require 'config.php';

$username = $_POST["inputusername"];
$password = $_POST["inputpassword"];
$password2 = $_POST["inputpassword2"];

if (isset($_POST['submit'])) {
    
if ($password == $password2){

$query = "INSERT INTO `users`(`name`, `password`) ";
$query .= "VALUES ('". $username ."','". $password ."')";

$result = mysqli_query($mysqli, $query);
echo $query;
if ($result) {
    header("Location: login.php");
}
else {
    echo "Er is een fout opgetreden";
}

}
else {
    echo "Niet 2 keer hetzelfde wachtwoord ingetypt, Probeer het nog eens.";
}
}
// if (strlen($username)>0 && strlen($password)>0){
//     $password=sha1($password);

//     $query = "SELECT * FROM `usersblog` ";
//     $query .= "WHERE username='$username' AND password='$password'";

//     $querynaam = "SELECT 'username' FROM `usersblog` ";
//     $querynaam .= "WHERE username='$username' AND password='$password'";

//     $queryww = "SELECT 'password' FROM `usersblog` ";
//     $queryww .= "WHERE username='$username' AND password='$password'";


//     $result1 = mysqli_query($mysqli, $query);

//     $result2 = mysqli_query($mysqli, $querynaam);

//     $result3 = mysqli_query($mysqli, $queryww);

//     if (mysqli_num_rows($result2) == 1){
//         session_start();
//         $_SESSION['username'] = $username;
//         header("Location: ../frontend/index.php");
//         // echo "<p>Ingelogd ". $username ."!</p>";

//     }
//     else {
//         echo "<p>Naam en of wachtwoord fout.</p>";
//     }
//     echo "<br><a href='inlog.php'>Ga Terug</a>";
// }