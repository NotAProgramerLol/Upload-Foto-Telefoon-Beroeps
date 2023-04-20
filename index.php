<?php

require_once 'backend/login_check.php';
require 'backend/config.php';
// require '../backend/createverwerk.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$query = "SELECT * FROM items";

$result = mysqli_query($mysqli, $query);

if (!$result) {
	echo "<p>FOUT!</p>";
	echo "<p>" . $query . "</p>";
	echo "<p>" . mysqli_error($mysqli) . "</p>";
	exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Landing</title>
	<link rel="stylesheet" href="./style/index.css" />
</head>

<body>
	<!-- + navbar -->
	<nav class="navbar is-dark" role="navigation" aria-label="main navigation">
		<div class="navbar-brand">
			<a class="navbar-item" href="index.php">
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
				<a class="navbar-item" href="index.php">Browse blogs</a>
				<a class="navbar-item" href="frontend/create.php">Create blog</a>
				<a class="navbar-item" href="backend/login.php">Login</a>
				<a class="navbar-item" href="backend/uitlog.php">Uitlog</a>
				<a class="navbar-item" href="backend/registreren.php">Register</a>
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
	<!-- + titel ?? -->
	<div class="field is-grouped is-grouped-centered">
		<div class="control">
			<div>
				<div class="select is-large">
					<select>
						<option>Select group</option>
						<option>group 1</option>
						<option>group 2</option>
						<option>group 3</option>
						<option>group 4</option>
						<option>group 5</option>
					</select>
				</div>
			</div>
		</div>
	</div>

	<!-- ^ titel ?? -->
	<div id="body-container">

		<?php
		if (mysqli_num_rows($result) > 0) {
			$dir = "backend/afbeelding";

			$a = scandir($dir);

			unset($a[0]);
			unset($a[1]);

			foreach ($a as $item) {
				//  echo "<img class='imagesbrowse' src='backend/afbeelding/".$item."'><br/>";
			}

			while ($item = mysqli_fetch_assoc($result)) {
				$userid = $item['user'];
				$queryuser = "SELECT `name` FROM `users` WHERE `ID` = $userid";

				$resultuser = mysqli_query($mysqli, $queryuser);

				$itemuser = mysqli_fetch_assoc($resultuser);
				// echo $itemuser;

				// + cards
		?>

				<div class="card m-5">
					<header class="card-header">
					<a href='backend/delete.php?id=<?php echo $item['ID']?>'><button class="delete is-large m-3"></button></a>
						<p class="card-header-title"><?php echo $item['name']; ?></p>
					</header>

					<div class="card-image">
						<figure class="image is-4by3">
							<img src='backend/afbeelding/<?php echo $item['src'] ?>' alt="Placeholder image" />
						</figure>
					</div>

					<div class="card-content">
						<div class="content">
							<?php echo $itemuser['name']; ?>
						</div>
					</div>
				</div>

		<?php

				// echo "<a href='backend/delete.php?id={$item['ID']}'>X</a>";
				// echo "<img class='img' src='../backend/afbeelding/{$item['src']}'><br/>";
				// echo "<h2>{$item['name']}</h2><br>";

				// echo "<p>{$itemuser['name']}</p><br>";

				// ^ cards

				// echo "<p>" . $item['group'] . "</p><br>";

				// echo "<img src='".$item['foto']."'><br>";


			}
		} else {
			echo "<p>Geen items gevonden!</p>";
		}
		?>
	</div>
	<!-- + scripts -->
	<script src="./scripts/bulma-dropdown.js" defer></script>
	<!-- ^scripts -->
</body>

</html>