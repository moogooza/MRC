<?php
if(GetPageName() == "sous-header.php")
{
	die('trojan.exe en cours de Telechargement.. 73%');
}
//user co ?
if(isset($_SESSION['username']))
{

?>
<div id="well" style="background: rgba(255,255,255,0.5)" >
<div id="transbox" style="opacity:1.2; color:#000000;" >
<center><p>Vous êtes connecté en tant que : <b><?php echo ucfirst($user['username']); ?></b><br>
<a href="index.php">Accueil ACP</a> -  
<a href="<?php echo $config['www']; ?>connexion.php">D&eacute;connexion</a> </p></center></div></div>
<?php 
}
else
{
?>
 <div id="well"><center><a href="<?php echo $config['www']; ?>connexion.php">Connexion</a> - <a href="<?php echo $config['www']; ?>inscription.php">Inscription</a></center></div>
<?php
}
?>