<?php
if(file_exists('.lockinstall')){
die('Vous devez supprimer le fichier .lockinstall pour reinstaller MyRadioCMS.');
}

if ($_GET['id'] && $_GET['id'] == 'step1')
{

$filename = '../cache_api.txt'; 
$filename2 = '../cache_callapi.txt';
chmod($filename, 0777);
chmod($filename2, 0777);

echo 'CHMOD des fichiers Radionomy.<br /><br /><a href="index.php?id=step2">Continuer</>';

}

elseif ($_GET['id'] && $_GET['id'] == 'step2')
{

if (isset($_POST["Submit"])) {

	if($_POST["dbhost"] != '' && $_POST["dbuname"] != '' && $_POST["dbpass"] != '' && $_POST["dbname"] != '')
	{

$string = '<?php

$mysql_h = "'. $_POST["dbhost"]. '"; // hote mysql
$mysql_pt = "3306"; // port serv sql
$mysql_u = "'. $_POST["dbuname"]. '"; // user bdd
$mysql_p = "'. $_POST["dbpass"]. '"; // mdp bdd
$mysql_d = "'. $_POST["dbname"]. '"; // nom bdd


// NE PLUS TOUCHER AU CODE A PARTIR DE CETTE LIGNE !! 

mysql_connect("".$mysql_h.":".$mysql_p."","".$mysql_u."","".$mysql_p."") or die("Problème de connexion");
mysql_select_db("".$mysql_d."") or die("Base de données inéxistante");
mysql_set_charset(\'utf8\');


?>';

header('Location: index.php?id=step3');
	
	}
	else
	{
		echo 'un des champs est manquant';
	}



$fp = fopen("../includes/config.php", "w");

fwrite($fp, $string);

fclose($fp);



}



?>

<form action="" method="post" name="install" id="install">

  <p>

    <input name="dbhost" type="text" id="dbhost" value=""> 

    Host MySQL

</p>

  <p>

    <input name="dbuname" type="text" id="dbuname"> 

    BDD utilisateur

</p>

  <p>

    <input name="dbpass" type="password" id="dbpass">

  Mot de passe BDD </p>

  <p>

    <input name="dbname" type="text" id="dbname">

  Nom de la base de données </p>



  <p>

    <input type="submit" name="Submit" value="Install">

  </p>

</form>
<?php
}
elseif ($_GET['id'] && $_GET['id'] == 'step3')
{
include('../includes/config.php');
$file_content = file('MyRadioCMS.sql');
    $query = "";
    foreach($file_content as $sql_line){
      if(trim($sql_line) != "" && strpos($sql_line, "--") === false){
        $query .= $sql_line;
        if(preg_match("/;[\040]*\$/", $sql_line)){
          $result = mysql_query($query) or die('<h3>Erreur!</h3><p>'.mysql_error().'. Les tables sont d&eacute;j&agrave; existantes ! Supprimez le contenu de la db.</p><a href="?id=step2" class="button fail" style="float:left"> <span>&lsaquo; Reg&eacute;n&eacute;rer le fichier de configuration</span> </a>');
          $query = "";
        }
      }
    }
mysql_close();
echo '<a href="index.php?id=step4">Configuration !</a>';

}
elseif ($_GET['id'] && $_GET['id'] == 'step4')
{

if(isset($_POST['sconf']))
	{
			include('../includes/config.php');
			$sql = "UPDATE radio_config SET nom='".$_POST['nom']."', www='".$_POST['www']."', path='".$_POST['path']."', defilante='".$_POST['defilante']."', rewrite='".$_POST['rewrite']."', licence='".$_POST['licence']."' WHERE id = 1";
			// echo $sql;
			mysql_query($sql) or die( mysql_error() );
			mysql_close();
			header('Location: index.php?id=step5');
	}
?>
<form action="#" method="post">
<p>Nom de la Radio <input name="nom" type="text" id="nom" required></p>
<p>Adresse (avec un / &agrave; la fin) <input name="www" type="text" id="www" required></p>
<p>Chemin relatif (ex: /home/vous/public_html/) <input name="path" type="text" id="path" required></p>
<p>Activer defilantes ? (1 = oui; 0 = non) <input name="defilante" type="text" id="defilante" required></p>
<p>Activer Rewrite (vip.php > vip) (1 = oui; 0 = non) <input name="rewrite" type="text" id="rewrite" required></p>
<p>Licence MyRadioCMS <input name="licence" type="text" id="licence" required></p>
<input type="hidden" name="sconf">
<input type="submit" value="Suivant">

</form>




<?php
}
elseif ($_GET['id'] && $_GET['id'] == 'step5')
{
	if(isset($_POST['aadmin']))
	{
			include('../includes/config.php');
			$sql = "INSERT INTO radio_users (username, password, email, rang) VALUES('".mysql_escape_string(htmlspecialchars(ucfirst($_POST['username'])))."', '".md5($_POST['mdp'])."', '".mysql_escape_string(($_POST['email']))."', '3')";
			// echo $sql;
			mysql_query($sql) or die( mysql_error() );
			mysql_close();
			header('Location: index.php?id=fin');
	}
?>
<form action="#" method="post">
<p>Nom d'utilisateur <input name="username" type="text" id="username" required></p>
<p>Adresse mail <input name="mail" type="text" id="mail" required></p>
<p>Mot de passe <input name="mdp" type="text" id="mdp" required></p>
<br/><br/>
Vous pourrez compl&eacute;ter le reste de vos informations dans votre profil !
<input type="hidden" name="aadmin">
<input type="submit" value="Finir">

</form>
<?php
}
elseif ($_GET['id'] && $_GET['id'] == 'fin')
{
?>
<font size="6"><b>Installation termin&eacute;e avec succ&egrave;s !</b></font>
<br />
<br />
Nous vous remercions d'avoir choisi MyRadioCMS pour votre Radio !<br />
Vous pouvez prendre contact pour nimporte quel soucis.<br />
Notre Forum : <a href="http://forum.myradiocms.com">ici</a><br />
Votre espace client (Support ticket) : <a href="http://panel.myradiocms.com">ici</a><br />
<br /><br />
<font color="red" size="5"><b>Veuillez supprimer le dossier /installation/ !</b></font>
<?php
}
else
{
?>
<a href="index.php?id=step1">Commencer !</a>
<?php
}
?>

