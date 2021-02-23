<?php

/*********************************
			Script by:
		www.crosman-web.hu
**********************************/

require_once("login_inc/config.php");
require_once("login_inc/functions.php");

sessions();

if ($_GET["success"] == "reg") {
	echo "Sikeres regisztráció!<br /> <br />";
}

loginPanel();

?>