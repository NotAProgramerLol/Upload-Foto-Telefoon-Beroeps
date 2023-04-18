<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

require 'config.php';

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Log-in</title>
		<link rel="stylesheet" href="style/index.css" />
	</head>
	<body>
		<!-- + navbar -->
		<nav class="navbar is-dark" role="navigation" aria-label="main navigation">
			<div class="navbar-brand">
				<a class="navbar-item" href="index.html">
					<img src="logo.svg" alt="logo" width="28" />
				</a>
		</nav>
		<!-- ^ navbar -->
		<div class="p-3">
			<div class="container title has-text-centered">
				Login <br />
				Menu
			</div>
			<form method="post" action="inlogverwerk.php">
				<label class="label">Gebruikersnaam:</label>
				<div class="field is-expanded">
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

				<div class="field is-grouped is-grouped-centered">
					<p class="control">
						<input type="submit" class="button is-success" />
					</p>
				</div>
			</form>
		</div>

		<p>Geen Account log dan nu in! <a href="registreren.php">Klik Hier!</a></p>
	</body>
</html>











<!-- <h2>Log nu in</h2>
<form method="post" action="inlogverwerk.php">
            <div>
                <label for="inputusername">username</label>
                <input type="text" name="inputusername">
               
            </div>
            <div>
                <label for="inputpassword">password</label>
                <input type="password" name="inputpassword">
                
            </div>
            <div>
                <input type="submit">
            </div>
        </form>
        <p>
            Geen Account log dan nu in! <a href="registreren.php">Klik Hier!</a>
        </p> -->