<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);


require 'config.php';
// require_once 'login_check.php';

$titel = $_POST['title'];
$image = $_FILES['image'];
$user = $_POST['user'];
$group = $_POST['group'];
// echo $user;


// photo upload > Filezilla

$ext = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);

$directory = "afbeelding";
$naam = $_POST["title"];
$temp = $_FILES["image"]["tmp_name"];
$timestamp = date('d:m:y:h:i:s');
$filename = $naam;
$filename .= $timestamp. "." . $ext;
$dir = "afbeelding/";






$query = "INSERT INTO `items`(`name`, `src`, `user`, `group`) VALUES ('" . $titel . "','" . $filename . "','" . $user . "','" . $group . "')";


// echo $query;

$result = mysqli_query($mysqli, $query);

if ($result){
    // echo "Het item is toegevoegd!<br/>";
    // header('Location: ../frontend/browse.php');
}
else{
    echo "FOUT bij toevoegen!<br/>";
    echo mysqli_error($mysqli);
}


if (move_uploaded_file($temp, $directory. "/" .$filename))
{
    // echo "$filename uploaded <br/>";
}
else {
    echo "FOUT! bij het uploaden $filename";
}
// Sort in ascending order - this is default
$a = scandir($dir);
echo "<pre>";
print_r($a);
echo "</pre>";
// echo ($a)[3];
unset($a[0]);
unset($a[1]);

if (is_array($a)) {
    unset($a[0]);
    unset($a[1]);
    foreach ($a as $item ) {
        echo "<img src='afbeelding/".$item."'><br/>";
    }
} else {
    echo "Failed to read directory contents.";
}


// foreach ($a as $item )
// {
//   echo "<img src='afbeelding/".$item."'><br/>";
// }
// header('Location: ../frontend/browse.php');