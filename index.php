<?php

/*********************************
			Script by:
		www.crosman-web.hu
**********************************/

require_once("login_inc/config.php");
require_once("login_inc/functions.php");

sessions();

echo('<a href="vedett_oldal.php">Védett oldal</a>');

loginPanel();

?>