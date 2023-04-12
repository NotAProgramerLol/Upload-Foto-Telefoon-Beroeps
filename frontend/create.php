<?php

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require_once '../backend/login_check.php';
require_once '../backend/config.php';

// Query to select all available groups from the database
$query = "SELECT * FROM groups where user = " . $_SESSION['id'] . "";
$result = mysqli_query($mysqli, $query);

// Array to store the groups
$groups = [];

// Fetch the results and store them in the $groups array
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $groups[] = $row;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>create</title>
</head>
<body>
    <img id="logo" src="images/logo.png" alt="">
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
    <form action="../backend/createverwerk.php" method="post" enctype="multipart/form-data">
            <label for="title">Title: </label></br>
            <input type="text" name="title" id="title"></br>

            <label for="image">Image: </label></br>
            <input type="file" name="image" id="image"></br>

            <input type="hidden" name="user" id="user" value="<?php $_SESSION['id'] ?>" ></br>

            <label for="group">Group: </label></br>
            <select name="group" id="group">
                <?php foreach ($groups as $group) { ?>
                    <option value="<?php echo $group['ID']; ?>"><?php echo $group['name']; ?></option>
                <?php } ?>
            </select></br>

            <input type="submit">
        </form>
    </div>
    <footer>
    </footer>
</body>
</html>
