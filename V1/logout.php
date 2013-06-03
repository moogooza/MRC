<?php
@session_start();
include('global.php');
if($user['ban'] == 1)
	{
		mysql_close();
		die('Vous avez &eacute;t&eacute; banni');
	}
session_destroy();
header('Location: /');
?>