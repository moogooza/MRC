<?php
@session_start();

	@include("./includes/config.php");
	@include("./includes/fonctions.php");

	if (isset($_SESSION['username']))
		{
			$username = Securise($_SESSION['username']);
			$sql = mysql_query("SELECT * FROM radio_users WHERE username = '".$username."' LIMIT 1") or die(mysql_error());
			$row = mysql_num_rows($sql);
			
			
			if($row > 0)
				{
					$user = mysql_fetch_assoc($sql);
					// $user['vip'] = IsVip();
					mysql_query("UPDATE radio_users SET ip_last = '".$_SERVER["REMOTE_ADDR"]."' WHERE id = '".$user['id']."'");
				}
				else {
				session_destroy();
				Redirect("".$url."");
				exit();
				}
		}
	
	$sql =mysql_query("SELECT * FROM radio_config") or die(mysql_error());
	$config = mysql_fetch_array($sql);
	
	$sql1 =mysql_query("SELECT * FROM radio_site") or die(mysql_error());
	$site = mysql_fetch_array($sql1);

	$date = date("Y-m-d H:i:s");

	error_reporting(NULL);
	ini_set( 'display_errors', 0 );	

?>