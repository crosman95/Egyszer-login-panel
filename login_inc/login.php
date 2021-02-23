<?php

/*********************************
			Script by:
		www.crosman-web.hu
**********************************/

require_once("config.php");
require_once("functions.php");

sessions();

// Belépő adatok betöltése

$username = htmlspecialchars($_POST["username"]);
$password = htmlspecialchars($_POST["password"]);

// Jelszó kódolása

$sha_pass = hash('sha256', "$kulcs_sha256".$password);

// MySQLi adatbázisban ellenőrzés

$q = mysqli_fetch_array(mysqli_query($mysqli_con, "SELECT * FROM `felhasznalok` WHERE username='$username'"));

if ($q["username"] == $username) {
	if ($q["password"] == $sha_pass) {
		// SESSION felhasználó regisztrálása!
		$_SESSION["username"] = $username;
		// Vissza irányítás a kezdőlapra!
		header("Location: ../$login_atiranyit");
	} else {
		echo("Helytelen jelszó! Kérlek próbáld újra!");
	}
} else {
	echo("Ez a felhasználó nincs az adatbázisban!");
}

?>