<?php

/*********************************
			Script by:
		www.crosman-web.hu
**********************************/

function sessions() {
	session_start();
}

function loginPanel() {
	echo('<form method="POST" action="login_inc/login.php">');
		echo('<input type="text" name="username" placeholder="Felhasználói név" /><br /><br />');
		echo('<input type="password" name="password" placeholder="Jelszó" /><br /><br />');
		echo('<input type="submit" value="Bejelentkezés" />');
	echo('</form>');
	echo('<a href="register.php">Regisztráció</a>');
}

function regPanel() {
	echo('<form method="POST" action="login_inc/register.php">');
		echo('<input type="text" name="username" placeholder="Felhasználói név" /><br /><br />');
		echo('<input type="password" name="password" placeholder="Jelszó" /><br /><br />');
		echo('<input type="password" name="password2" placeholder="Jelszó" /><br /><br />');
		echo('<input type="text" name="email" placeholder="E-mail cím" /><br /><br />');
		echo('<input type="submit" value="Regisztráció" />');
	echo('</form>');
	echo('<a href="index.php">Bejelentkezés</a>');
}

function profilPanel($mysqli_con) {
	
	$profilPanel = mysqli_fetch_array(mysqli_query($mysqli_con, "SELECT * FROM `felhasznalok` WHERE username='{$_SESSION["username"]}'"));
	
	echo('<table width="400px" style="text-align: center;">');
		echo('<tr>');
			echo('<td><b>Profilom</b></td>');
		echo('</tr>');
		echo('<tr>');
			echo('<td>[ <a href="profil.php?id='.$profilPanel["id"].'">'.$profilPanel["username"].'</a> ]</a></td>');
		echo('</tr>');
		echo('<tr>');
			echo('<td>[ '.$profilPanel["email"].' ]</td>');
		echo('</tr>');
		echo('<tr>');
			echo('<td>[ '.$profilPanel["regisztralt"].' ]</td>');
		echo('</tr>');
		echo('<tr>');
			echo('<td>[ <a href="kijelentkezes.php">Kijelentkezés</a> ]</td>');
		echo('</tr>');
	echo('</table>');
}

function felhasznaloLekerdez($mysqli_con, $id) {
	$felhasznaloLekerdez = mysqli_fetch_array(mysqli_query($mysqli_con, "SELECT * FROM `felhasznalok` WHERE id='{$id}'"));
}

function vedett_oldal() {
	if (empty($_SESSION["username"])) {
		header("Location: index.php");
	}
}

function kijelentkezes() {
	unset($_SESSION["username"]);
	header("Location: index.php");
}

?>