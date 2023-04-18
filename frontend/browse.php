<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Excursieblog</title>
</head>
<body>
    <!-- <img id="logo" src="images/logo.png" alt=""> -->
    <div id="links">
    
        <a href="../index.php">Home</a>
        <a href="create.php">Create blog</a>
        <a href="browse.php">Browse blogs</a>

        <a href="../backend/login.php">Login</a>
        <a href="../backend/uitlog.php">Uitlog</a>
        <a href="../backend/registreren.php">Register</a>
    </div>
    <hr />
    <div id="body-container">

    <?php

        require '../backend/config.php';
        // require '../backend/createverwerk.php';

        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);

        $query = "SELECT * FROM items";

    $result = mysqli_query($mysqli, $query);

    if(!$result)
    {
        echo "<p>FOUT!</p>";
        echo "<p>" . $query . "</p>";
        echo "<p>" . mysqli_error($mysqli) . "</p>";
        exit;
    }

    if (mysqli_num_rows($result) > 0)
    {   
        
        
?>
<?php
   $dir = "../backend/afbeelding";

   $a = scandir($dir);

   unset($a[0]);
   unset($a[1]);
   
   foreach ($a as $item )
   {
    //  echo "<img class='imagesbrowse' src='../backend/afbeelding/".$item."'><br/>";
   }

?>


<div id="browse-grid">
<?php
while ($item = mysqli_fetch_assoc($result))
    {
        $userid = $item['user'];
        $queryuser = "SELECT `name` FROM `users` WHERE `ID` = $userid";
        
        $resultuser = mysqli_query($mysqli, $queryuser);
        
        $itemuser = mysqli_fetch_assoc($resultuser);
        // echo $itemuser;
        ?><div class="overzicht">
            <?php

        echo "<img class='img' src='../backend/afbeelding/".$item['src']."'><br/>";
        echo "<h2>" . $item['name'] . "</h2><br>";


        echo "<p>" . $itemuser['name'] . "</p><br>";


        // echo "<p>" . $item['group'] . "</p><br>";

        // echo "<img src='".$item['foto']."'><br>";
        
        ?>
        </div>
        <?php
    } 
?>
</div>



            <?php
                
        
        
        

        
    }
    else 
    {
        echo "<p>Geen items gevonden!</p>";
    }


 

    ?>

    </div>




    <footer>

    </footer>
</body>
</html>