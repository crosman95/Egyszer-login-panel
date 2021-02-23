<?php

/*********************************
			Script by:
		www.crosman-web.hu
**********************************/

require_once("login_inc/config.php");
require_once("login_inc/functions.php");

sessions();

vedett_oldal();

profilPanel($mysqli_con);

?>

Kedves <?=$_SESSION["username"]?>!<br />Ezt az oldalt csak akkor láthatod, ha be vagy jelentkezve!