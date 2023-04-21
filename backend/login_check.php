<?php 
error_reporting(E_ALL);
ini_set("display_errors", 1);

session_start();

// echo "id = " . $_SESSION['id'] . "<br>";

if (isset($_SESSION['id'])){
    if ($_SESSION['id'] == ''){
        echo "sessie is leeg";
        header('Location: https://87957.stu.sd-lab.nl/Upload-Foto-Telefoon-Beroeps/backend/login.php');
    }
    
    
}

else {
    echo "geen sessie";
    header('Location: https://87957.stu.sd-lab.nl/Upload-Foto-Telefoon-Beroeps/backend/login.php');
}