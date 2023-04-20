<?php

require_once 'backend/login_check.php';
require 'backend/config.php';
// require '../backend/createverwerk.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);



$groupQuery = "SELECT * FROM groups where user = " . $_SESSION['id'] . "";

$groups = mysqli_query($mysqli, $groupQuery);

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
			<a role="button" class="navbar-burger" id="navbar-burger" aria-label="menu" aria-expanded="false"
				data-target="navbar">
				<span aria-hidden="true"></span>
				<span aria-hidden="true"></span>
				<span aria-hidden="true"></span>
			</a>
		</div>

	</nav>
	<!-- ^ navbar -->

	<!-- + links -->
	<div class="tabs is-right">
		<ul>
			<li><a href="frontend/create.php">Toevoeg</a></li>
			<li><a href="frontend/group.php">Groep</a></li>
			<li><a href="backend/uitlog.php">Uitlog</a></li>
		</ul>
	</div>

	<!-- ^ titel -->
	<div id="body-container">

		<?php
		$dir = "afbeelding";

		$a = scandir($dir);

		unset($a[0]);
		unset($a[1]);

		foreach ($groups as $group) {

			?>
			
			<p class="is-size-2">
				<?php echo $group['name']; ?>
				<a href='backend/deleteGroup.php?id=<?php echo $group['ID'] ?>'>
				<button class="delete is-large m-3"></button>
			</a>
			</p>

			<?php
			$itemQuery = "SELECT * FROM items WHERE `user` = " . $_SESSION['id'] . " AND `group` = " . $group['ID'] . "";


			$items = mysqli_query($mysqli, $itemQuery);

			foreach ($items as $item) {
				// + cards
				?>

				<div class="card m-5">
					<header class="card-header">
						<a href='backend/delete.php?id=<?php echo $item['ID'] ?>'><button
								class="delete is-large m-3"></button></a>
						<p class="card-header-title">
							<?php echo $item['name']; ?>
						</p>
					</header>

					<div class="card-image">
						<figure class="image is-4by3">
							<img src='backend/afbeelding/<?php echo $item['src'] ?>' alt="Placeholder image" />
						</figure>
					</div>

					<?php
			}
			// echo "<a href='backend/delete.php?id={$item['ID']}'>X</a>";
			// echo "<img class='img' src='../backend/afbeelding/{$item['src']}'><br/>";
			// echo "<h2>{$item['name']}</h2><br>";
		
			// echo "<p>{$itemuser['name']}</p><br>";
		
			// ^ cards
		
			// echo "<p>" . $item['group'] . "</p><br>";
		
			// echo "<img src='".$item['foto']."'><br>";
		

		}
		?>
		</div>
		<!-- + scripts -->
		<script src="./scripts/bulma-dropdown.js" defer></script>

		<!-- ^scripts -->
</body>

</html>