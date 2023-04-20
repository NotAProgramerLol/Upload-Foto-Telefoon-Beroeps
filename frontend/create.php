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
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Landing</title>

    <link rel="stylesheet" href="index.css" />
</head>

<body>
    <!-- + navbar -->
    <nav class="navbar is-dark" role="navigation" aria-label="main navigation">
        <div class="navbar-brand">
            <a class="navbar-item" href="index.html">
                <img src="logo.svg" alt="logo" width="28" />
            </a>
            <a role="button" class="navbar-burger" id="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbar">
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
            </a>
        </div>
        <!-- TODO: hamburg links goed zetten -->
        <!-- ?: wtf moet eig in de hamburg komen? -->
        <div id="navbar" class="navbar-menu">
            <div class="navbar-start">
                <a href="projects.html" class="navbar-item"> Projects </a>
            </div>
        </div>
    </nav>
    <!-- ^ navbar -->

    <!-- + links -->
    <div class="tabs is-right">
        <ul>
            <li><a>Toevoeg</a></li>
            <li><a>Uitlog</a></li>
            <li><a>Overzicht</a></li>
        </ul>
    </div>
    <!-- ^ links -->

    <!-- + input -->
    <div class="columns box m-3 p-1">
        <div id="file-input" class="column file has-name is-fullwidth">
            <label class="file-label">
                <input id="fileInput" class="file-input" type="file" name="resume" />
                <span class="file-cta">
                    <span class="file-icon">
                        <i class="fas fa-upload"></i>
                    </span>
                    <span class="file-label"> Choose a file… </span>
                </span>
                <span class="file-name"> No file selected. </span>
            </label>
        </div>
        <div class="column field is-grouped is-grouped-centered">
            <p class="control">
                <a class="button is-primary"> <input type="submit" /> </a>
            </p>
            <p id="clear" class="control">
                <a class="button is-danger"> Clear </a>
            </p>
        </div>
    </div>

    <!-- ^ input -->



    <form action="../backend/createverwerk.php" method="post" enctype="multipart/form-data">
        <label for="title">Title: </label></br>
        <input type="text" name="title" id="title" maxlength="15"></br>

        <label for="image">Image: </label></br>
        <input type="file" name="image" id="image" required></br>

        <input type="hidden" name="user" id="user" value="<?php $_SESSION['id'] ?>"></br>

        <label for="group">Group: </label></br>
        <select name="group" id="group">
            <?php foreach ($groups as $group) { ?>
                <option value="<?php echo $group['ID']; ?>"><?php echo $group['name']; ?></option>
            <?php } ?>
        </select></br>

        <input type="submit" />
    </form>

    
    <!-- + scripts -->
    <script src="./bulma-dropdown.js" defer></script>
    <script src="./bulma-fileInput.js"></script>
    <!-- ^scripts -->
</body>

</html>