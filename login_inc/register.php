<?php

/*********************************
			Script by:
		www.crosman-web.hu
**********************************/

require_once("config.php");
require_once("functions.php");

sessions();

// Regisztrálandó adatok betöltése

$username = htmlspecialchars($_POST["username"]);
$password = htmlspecialchars($_POST["password"]);
$password2 = htmlspecialchars($_POST["password2"]);
$email = htmlspecialchars($_POST["email"]);

// Adatok ellenőrzése

// Felhasználói név ellenőrzése

if(preg_match('/^[a-zA-Z0-9]{10,}$/', $username)) {
	echo("Hibás felhasználói név! Maximum 10 karakternek kell lennie");
	$username_ok = "0";
} else {
	$username_ok = "1";
}

// Jelszó ellenőrzése

if (!empty($password && $password2)) {
	if ($password == $password2) {
		if (strlen($password) <= 8) {
			echo("A jelszavadnak legalább 8 karakterből kell állnia!");
			$password_ok = "0";
		} else {
			$password_ok = "1";
		}
	} else {
		echo("A megadott jelszavak nem egyeznek!");
		$password_ok = "0";
	}
} else {
	echo("A jelszó mező üresen maradt!");
	$password_ok = "0";
}

// E-mail cím ellenőrzése

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
	echo("Hibás e-mail cím!");
	$email_ok = "0";
} else {
	$email_ok = "1";
}

// Felhasználói név és e-mail cím ellenőrzése az adatbázisban

$username_q = mysqli_fetch_array(mysqli_query($mysqli_con, "SELECT * FROM `felhasznalok` WHERE username='$username'"));

// Username
if ($username_q["username"] == $username) {
	echo("Ez a felhasználó már létezik!");
	$username_check = "0";
} else {
	$username_check = "1";
}

$email_q = mysqli_fetch_array(mysqli_query($mysqli_con, "SELECT * FROM `felhasznalok` WHERE email='$email'"));

// E-mail
if ($email_q["email"] == $email) {
	echo("Ezzel az e-mail címmel már regisztráltak!");
	$email_check = "0";
} else {
	$email_check = "1";
}


// Végső ellenőrzés

if ($username_ok == "1") {
	if ($password_ok == "1") {
		if ($email_ok == "1") {
			if ($username_check == "1") {
				if ($email_check == "1") {
					$minden_ok = "1";
				}
			}
		}
	}
}

// Felhasználó felvitele

if ($minden_ok == "1") {
	
	$sha_pass = hash('sha256', "$kulcs_sha256".$password);
	
	$datum = date("Y-m-d H:i:s");
	
	mysqli_query($mysqli_con, "INSERT INTO `felhasznalok`(`id`, `username`, `email`, `password`, `regisztralt`) VALUES (NULL,'$username','$email','$sha_pass','$datum')");
	
	header("Location: ../$sikeres_reg_atiranyit");
}

?>