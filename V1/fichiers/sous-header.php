<?php

//user co ?
if(isset($_SESSION['username']))
{

?>
<div id="well"></div>
<div id="test">
<center>
<?php if($rewrite == 1)
{
?>
	Vous êtes connecté en tant que : <b><?php echo ucfirst($user['username']); ?></b><br>
	<?php if($user['vip'] == 1){ ?><span class="label label-success">Compte VIP</span><?php }else{ ?><span class="label label-error">Compte non VIP</span> <?php } ?> -
 	<a href="<?php echo $config['www']; ?>mon-compte">Mon compte</a> - 
 	<a href="<?php echo $config['www']; ?>profil/<?php echo $user['id']; ?>-<?php echo $user['username']; ?>.html">Mon profil</a> - 
 	<a href="<?php echo $config['www']; ?>vip">VIP</a> 
 	<?php if($user['vip'] == 1 && $config['defilante'] == 1) { ?> - <a href="<?php echo $config['www']; ?>dediweb">Poster une DediWeb</a> <? } ?> -
 	<a href="<?php echo $config['www']; ?>dedicace">Poster une dédicace</a> - 
 	<?php if($user['rang'] >= 2){ ?><span class="label label-important"><a style="color:white;" href="<?php echo $config['www']; ?>admin">ADMIN</a></span> - <?php } ?>
 	<a href="<?php echo $config['www']; ?>logout">D&eacute;connexion</a>
<?php
}
else
{ 
?> 
	Vous êtes connecté en tant que : <b><?php echo ucfirst($user['username']); ?></b><br />
	<?php if($user['vip'] == 1){ ?><span class="label label-success">Compte VIP</span><?php }else{ ?><span class="label label-error">Compte non VIP</span> <?php } ?> -
	 <a href="<?php echo $config['www']; ?>mon-compte.php">Mon compte</a> - 
 	<a href="<?php echo $config['www']; ?>profil/<?php echo $user['id']; ?>-<?php echo $user['username']; ?>.html">Mon profil</a> - 
 	<a href="<?php echo $config['www']; ?>vip.php">VIP</a> 
 	<?php if($user['vip'] == 1 && $config['defilante'] == 1) { ?> - <a href="<?php echo $config['www']; ?>defilante.php">Poster une DediWeb</a> <? } ?> -
 	<a href="<?php echo $config['www']; ?>dedicace.php">Poster une dédicace</a>
 	<?php if($user['rang'] == 3){ ?><span class="label label-important"><a style="color:white;" href="<?php echo $config['www']; ?>admin">ADMIN</a></span> - <?php } ?>
 	<a href="<?php echo $config['www']; ?>logout.php">D&eacute;connexion</a>
<?php
}
?> 	
</center></div>
 
<?php 
}
else
{
	if($rewrite == 1)
	{
	?>
 		<div id="well"><center><a href="<?php echo $config['www']; ?>connexion">Connexion</a> - <a href="<?php echo $config['www']; ?>inscription">Inscription</a></center></div>
 	<?php
 	}
 	else
 	{
 	?>
 		<div id="well"><center><a href="<?php echo $config['www']; ?>connexion.php">Connexion</a> - <a href="<?php echo $config['www']; ?>inscription.php">Inscription</a></center></div>
 	<?php
 	}
 	?>
<?php
}
?>