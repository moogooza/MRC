<?PHP
#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|
#|                                                                        #|
#|       				 SoundZone Radio CMS V1                           #|
#|        		  Copyright 2013 MoOgOoZA PRODUCTION                      #|
#|																		  #|
#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|

//include('../bdd.php');

$MySQL_HOST = "localhost"; // hote mysql
$MySQL_PORT = "3306"; // port serv sql
$MySQL_USER = "firstheu_moul"; // user bdd
$MySQL_PASSWORD = "thomas123@"; // mdp bdd
$MySQL_DATABASE = "firstheu_szr"; // nom bdd


// NE PLUS TOUCHER AU CODE A PARTIR DE CETTE LIGNE !! 


$MySQL_ERROR_CONNECT = "Impossible de se connecter au serveur <b>".$MySQL_HOST."</b>.<br>SoundZone revient vite !! Excusez nous :)";
$MySQL_ERROR_DATABASE = "Votre databse <b>".$MySQL_DATABASE."</b> n'est pas cr&eacute;ee.";
$MySQL_AUTORIZE = 1;
if($MySQL_AUTORIZE == 1)
{
mysql_connect("".$MySQL_HOST.":".$MySQL_PORT."","".$MySQL_USER."","".$MySQL_PASSWORD."") or die("".$MySQL_ERROR_CONNECT."");
mysql_select_db("".$MySQL_DATABASE."") or die("".$MySQL_ERROR_DATABASE."");
}
?>