<?PHP
#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|
#|                                                                        #|
#|       				 SoundZone Radio CMS V1                           #|
#|        		  Copyright 2013 MoOgOoZA PRODUCTION                      #|
#|																		  #|
#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|
@session_start();

	@include("../includes/config.php");
	@include("../includes/fonctions.php");

	if (isset($_SESSION['username']))
		{
			$username = Securise($_SESSION['username']);
			$sql = mysql_query("SELECT * FROM radio_users WHERE username = '".$username."' LIMIT 1") or die(mysql_error());
			$row = mysql_num_rows($sql);
			
			
			if($row > 0)
				{
					$user = mysql_fetch_assoc($sql);
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

	$date = date("Y-m-d H:i:s");
	

?>