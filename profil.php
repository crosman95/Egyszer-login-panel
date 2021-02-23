<?php

/*********************************
			Script by:
		www.crosman-web.hu
**********************************/

require_once("login_inc/config.php");
require_once("login_inc/functions.php");

sessions();

if (!empty($_GET["id"])) {

$felhasznaloLekerdez = mysqli_fetch_array(mysqli_query($mysqli_con, "SELECT * FROM `felhasznalok` WHERE id='{$_GET["id"]}'"));

if (empty($felhasznaloLekerdez["id"])) {
	echo("Nincs ilyen felhasználó!");
} else {

?>
<table>
	<tr>
		<td>Felhasználó ID:</td>
		<td><?=$felhasznaloLekerdez["id"]?></td>
	</tr>
	<tr>
		<td>Felhasználói név:</td>
		<td><?=$felhasznaloLekerdez["username"]?></td>
	</tr>
	<tr>
		<td>E-mail cím:</td>
		<td><?=$felhasznaloLekerdez["email"]?></td>
	</tr>
	<tr>
		<td>Regisztrált:</td>
		<td><?=$felhasznaloLekerdez["regisztralt"]?></td>
	</tr>
</table>
<?php
}

} else {
	echo("Nincs megadva felhasználói id!");
}

?>