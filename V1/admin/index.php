<?
@session_start();

include('header.php');
include('fichiers/sous-header.php');

$pages = array
(
	'news',
	'team',
	'defilante',
	'shout',
	'ban',
	'config',
	'site',
	'partenaires',
	'users',
	'dedicaces'
);

?>

<?
	if(isset($_SESSION['username']) && $user['rang'] >= 2)
	{
		$page = "";
		if(isset($_GET['page']) && in_array($_GET['page'], $pages))
		{
			$page = $_GET['page'];
		}
?>
<br><br>
	<div class="well" >
		<?
		if($page == "")
		{
			$taille = 20;
			$right = 20;
		
			$style = 'margin-bottom:'.$taille.'px; margin-right:'.$right.'px;';
		
			?>
			Salut <?php echo ucfirst($user['username']); ?>,<br>
			Tu peux grâce à tes droits d'administrateur gérer la radio !
			<br><br><br>
			<div class="well2">

			<center>
			
			
			<h1 style="color: red; text-shadow: 5px 5px 15px red;background: url(http://forum.ragezone.com/images/backround18.gif);max-width: 310px">Admin Gestion</h1>
			<br />
			<a style="<? echo $style; ?>" href="index.php?page=news" class="btn btn-danger btn-large" ><i class="icon-calendar" ></i> Gestion News</a>  
			<?php if($user['rang'] == 3) { echo '<a style="'.$style.'" href="index.php?page=team" class="btn btn-success btn-large" ><i class="icon-bookmark" ></i> Gestion Staff</a>'; } ?> 
			<a style="<?php echo $style; ?>" href="index.php?page=shout" class="btn btn-primary btn-large" ><i class="icon-leaf" ></i> Gestion Shoutbox</a> 
			<?php if($user['rang'] == 3) { echo '<a style="'.$style.'" href="index.php?page=partenaires" class="btn btn-vert btn-large" ><i class="icon-globe" ></i> Gestion des Partenaires</a>'; } ?>  
			<a style="<? echo $style; ?>" href="index.php?page=defilante" class="btn btn-warning btn-large" ><i class="icon-align-center" ></i> Gestion Défilantes</a> 
			<a style="<? echo $style; ?>" href="index.php?page=dedicaces" class="btn btn-large btn-rose" ><i class="icon-th-list" ></i> Gestion Dédicaces</a>
			<?php if($user['rang'] == 3) { echo '<a style="'.$style.'" href="index.php?page=site" class="btn btn-large btn-mauve" ><i class="icon-edit" ></i> Gestion du Site</a>'; } ?>   
			<?php if($user['rang'] == 3) { echo '<a style="'.$style.'" href="index.php?page=users" class="btn btn-large" ><i class="icon-user" ></i> Gestion Utilisateurs</a>'; } ?>   
			<?php if($user['rang'] == 3) { echo '<a style="'.$style.'" href="index.php?page=config" class="btn btn btn-info btn-large" ><i class="icon-wrench" ></i> Configuration</a>'; } ?>  
			<?php if($user['rang'] == 3) { echo '<a style="'.$style.'" href="index.php?page=ban" class="btn btn-inverse btn-large" ><i class="icon-remove-sign icon-white" ></i> Utilisateurs bannis</a>'; } ?> 
			
			<br><br>
			</center></div>
			<br><br><br><br><br>
			<?
		}
		else
		{
			include $page . '.php';
		}
		?>

	</div>
<?	
	}
?>

<div id="footer">
   		<?php include('footer.php'); ?>
   </div>
   
   </div>



</body>
</html>