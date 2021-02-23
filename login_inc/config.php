<?php

/*********************************
			Script by:
		www.crosman-web.hu
**********************************/

// MySQLi beállítások

$mysqli_host = "localhost";								// Pl: localhost
$mysqli_username = "";						// Pl: ferike
$mysqli_password = "";							// Pl: ezajelszavam
$mysqli_db = "";							// Pl: regisztracios_panel

// MySQLI csatlakozás

$mysqli_con = mysqli_connect($mysqli_host,$mysqli_username,$mysqli_password,$mysqli_db);

	// Csatlakozás ellenőrzése, ha hibás a kapcsolódás.
	if (mysqli_connect_errno()) {
	  echo "Sikertelen kapcsolódás az adatbázishoz: " . mysqli_connect_error();
	  exit();
	}

// Titkosítás

$kulcs_sha256 = "ezleszittajelszo";						// A jelszavak védelmére, ezt minden jelszó elé eléteszi. A felhasználónak csak a saját jelszavát kell beírni, ezt nem!

// Átirányítások

$login_atiranyit = "index.php";							// Bejelentkezés után ide irányít át
$sikeres_reg_atiranyit = "login.php?success=reg";		// Sikeres regisztráció után ide irányít át

?>