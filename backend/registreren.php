<?php

require 'config.php';

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Landing</title>
		<link rel="stylesheet" href="style/index.css" />
	</head>
	<body>
		<!-- + navbar -->
		<nav class="navbar is-dark" role="navigation" aria-label="main navigation">
			<div class="navbar-brand">
				<a class="navbar-item" href="index.html">
					<img src="logo.svg" alt="logo" width="28" />
				</a>
			</div>
		</nav>
		<!-- ^ navbar -->
		<div class="p-3">
			<div class="container title has-text-centered">
				Registeer <br />
				Menu
			</div>
			<form method="post" action="registrerenverwerk.php">
				<label class="label">Gebruikersnaam:</label>
				<div class="field">
					<p class="control has-icons-left has-icons-right">
						<input type="text" name="inputusername" class="input" placeholder="Gebruikersnaam" />
						<span class="icon is-small is-left">
							<i class="fas fa-user"></i>
						</span>
					</p>
				</div>

				<label class="label">Password:</label>
				<div class="field">
					<p class="control has-icons-left">
						<input type="password" name="inputpassword" class="input" placeholder="Password" />
						<span class="icon is-small is-left">
							<i class="fas fa-lock"></i>
						</span>
					</p>
				</div>

				<label class="label">Password 2e keer:</label>
				<div class="field">
					<p class="control has-icons-left">
						<input type="password" name="inputpassword2" class="input" placeholder="Password" />
						<span class="icon is-small is-left">
							<i class="fas fa-lock"></i>
						</span>
					</p>
				</div>

				<div class="field is-grouped is-grouped-centered">
					<p class="control">
						<input name="submit" type="submit" class="button is-success" />
					</p>
				</div>
			</form>
		</div>
	</body>
</html>
