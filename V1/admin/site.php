<?php
if($user['rang'] != 3)
{
	mysql_close();
	die('Il n\'y a rien pour toi ici..');
}
if(isset($_POST['ok']))
{
		$sql = "UPDATE radio_site SET ";
		$num = 0;
		foreach($_POST as $name => $value)
		{
			if($name != 'ok')
			{
				if($num != 0)	$sql .= ",";
				$_POST[$name] = mysql_escape_string($_POST[$name]);
				$sql .= "$name = '$value'";
				$num++;
			}
		}

		$sql .= "LIMIT 1";
		// echo $sql;
		mysql_query($sql) or die( mysql_error() );
	
		echo '<div class="alert alert-success" >Configuration du site mise à jour !<br /><br /><a class="btn" href="index.php?page=site" >retour</a></div>';
}
else if(!isset($_GET['action']))
{
?>
	
	<h2>Gestion des images/page d'accueil</h2>
	<br />
	<form method="post" action="#" >
		
		<?php
			$sql = "SELECT * FROM radio_site";
			
			$req = mysql_query($sql) or die(mysql_error());
			
			while($data = mysql_fetch_assoc($req))
			{
				echo 'Bannière principale <br /><input type="text" style="width:500px;" name="logo_general" value="'.$data['logo_general'].'" required /><br /><br />';
				echo 'Bannière de la page d\'accueil <br /><input type="text" style="width:500px;" name="logo_index" value="'.$data['logo_index'].'" required /><br /><br />';
				echo 'Favicon du site <br /><input type="text" style="width:500px;" name="favicon" value="'.$data['favicon'].'" required /><br /><br />';
				echo 'Clip du Moment <br /><input type="text" style="width:500px;" name="top_video" value="'.$data['top_video'].'" required /><br /><br />';
				echo 'Description Clip du Moment <br /><input type="text" style="width:500px;" name="vid_desc" value="'.$data['vid_desc'].'" required /><br /><br />';
				echo 'Lien Facebook <br /><input type="text" style="width:500px;" name="fb" value="'.$data['fb'].'" required /><br /><br />';
				echo 'Lien Twitter <br /><input type="text" style="width:500px;" name="twitter" value="'.$data['twitter'].'" required /><br /><br />';
			}
		?>
		
		<input type="hidden" name="ok" />
		<input type="submit" class="btn" />
	</form>
	<br />
	<br />
	<br />
	<br />
	<h2>Gestion des liens de bas de page</h2>
	
	<center>
	<div class="well2" style="max-width: 500px;">
	<form method="post" action="#" >

		Titre <input type="text" name="titre" required /><br />
		Lien <textarea name="lien" required ></textarea><br />
		<input type="hidden" name="send" />
		<input type="submit" class="btn" />
	</form>
	</div>
	</center>
	<center>
	<table class="table table-bordered" style="width:800px;" >

	<thead>
		<tr>
			<th>#</th>
			<th>Titre</th>
			<th>Lien</th>
			<th width="30%" >Outils</th>
		</tr>
	</thead>

	<tbody>
	<?
	
	if(isset($_POST['send']))
	{
			$last = mysql_fetch_assoc(mysql_query('SELECT MAX(ordre) as tata FROM radio_footer'));
			$last['tata']++;
	
			$sql = "INSERT INTO radio_footer (label, ref, ordre) VALUES('".mysql_escape_string($_POST['titre'])."', '".mysql_escape_string($_POST['lien'])."', ".$last['tata'].")";
			mysql_query($sql) or die('Erreur SQL: ' . mysql_error() );
	}
	
	$sql = "SELECT * FROM radio_footer ORDER BY ordre ASC";

	$req = mysql_query($sql) or die('Erreur SQL: ' . mysql_error() );

	while($data = mysql_fetch_assoc($req))
	{
		echo '<tr>';
		
		echo '<td>'.$data['ordre'].'</td>';
		echo '<td>'.$data['label'].'</td>';
		echo '<td><a href="'.$data['ref'].'" target="_blank">'.$data['ref'].'</a></td>';
		echo '<td><center>
			<a href="index.php?page=site&action=edit_link&id='.$data['id'].'" class="btn" ><i class="icon-pencil"></i></a>&nbsp;
			<a href="index.php?page=site&action=del_link&id='.$data['id'].'" class="btn" ><i class="icon-trash"></i></a>&nbsp;';
			
		if(strpos($_SERVER['HTTP_USER_AGENT'], 'Firefox') === false)
		{
			echo '<a href="index.php?page=site&action=up_link&id='.$data['id'].'" class="btn" ><i class="icon-arrow-up"></i></a>&nbsp;
			<a href="index.php?page=site&action=down_link&id='.$data['id'].'" class="btn" ><i class="icon-arrow-down"></i></a>';
		}
			
		echo '</center></td>';
		
		// if($navigateur == "Chrome")	echo '<br /><br />';
		
		// echo '<td><b>'.$data['titre'].'</b><br />'.$data['message'].'<br /><br /></td>';
		
		echo '</tr>';
	}
	?>
	</tbody>
	</table>
	</center>

<?
}
else if($_GET['action'] == 'edit_link' && is_numeric($_GET['id']))
{
	if(!isset($_POST['send2']))
	{
	$sql = "SELECT * FROM radio_footer WHERE id = ".$_GET['id']." LIMIT 1";

	$req = mysql_query($sql) or die('Erreur SQL: ' . mysql_error() );

	while($data = mysql_fetch_assoc($req))
	{
		$titre = $data['label'];
		$txt = $data['ref'];
	}
	?>
	<center>
<div class="well2" style="max-width: 500px;">
	<form method="post" action="#" >
		Titre <input type="text" name="titre" value="<? echo $titre; ?>" required /><br />
		Lien <textarea name="commentaire" required ><? echo $txt; ?></textarea><br />
		<input type="hidden" name="send2" />
		<input type="submit" class="btn" />
	</form>
	</div>
	</center>
	<?
	}
	else
	{
		$sql = "UPDATE radio_footer SET label = '".mysql_escape_string($_POST['titre'])."', ref = '".mysql_escape_string($_POST['commentaire'])."' WHERE id = ".$_GET['id']." LIMIT 1";
			mysql_query($sql) or die('Erreur SQL: ' . mysql_error() );
		
			// echo $sql;
			?>
			<div class="alert alert-success" >Lien édité avec succès</div><br />
			<a class="btn" href="index.php?page=site" >retour</a>
			<?
	}
}
else if($_GET['action'] == 'del_link' && is_numeric($_GET['id']))
{
		$sql = "DELETE FROM radio_footer WHERE id = ".$_GET['id']." LIMIT 1";
		mysql_query($sql) or die('Erreur SQL: ' . mysql_error() );
	
		// echo $sql;
		?>
		<div class="alert alert-success" >Lien supprimé avec succès</div><br />
		<a class="btn" href="index.php?page=site" >retour</a>
		<?
}
else if($_GET['action'] == 'up_link' && is_numeric($_GET['id']))
{
		$sql = "SELECT * FROM radio_footer WHERE id = " . $_GET['id'];
	
		$req = mysql_query($sql) or die('Erreur SQL: '.$sql.' - ' . mysql_error() );
	
		while($data = mysql_fetch_assoc($req))
		{
			$ordre = $data['ordre'];
		}
	
		$sql10 = "SELECT * FROM radio_footer WHERE ordre = " . ($ordre-1);
	
		$req10 = mysql_query($sql10) or die('Erreur SQL: '.$sql10.' - ' . mysql_error() );
	
		$id2 = -1;
		while($data10 = mysql_fetch_assoc($req10))
		{
			$id2 = $data10['id'];
		}
	
		$sql2 = "UPDATE radio_footer SET ordre = " . $ordre . " WHERE id = " . ($id2);
		mysql_query($sql2) or die('Erreur SQL2: '.$sql2.' - ' . mysql_error() );
		// echo $sql2 . '<br />';
	
	
	
		$sql1 = "UPDATE radio_footer SET ordre = " . ($ordre-1) . " WHERE id = " . $_GET['id'];
		mysql_query($sql1) or die('Erreur SQL1: '.$sql1.' - ' . mysql_error() );
		// echo $sql1 . '<br />';
	
		echo '<a class="btn" href="index.php?page=site" >retour</a>';
}
else if($_GET['action'] == 'down_link' && is_numeric($_GET['id']))
{
		$sql = "SELECT * FROM radio_footer WHERE id = " . $_GET['id'];
	
		$req = mysql_query($sql) or die('Erreur SQL: '.$sql.' - ' . mysql_error() );
	
		while($data = mysql_fetch_assoc($req))
		{
			$ordre = $data['ordre'];
		}
	
		$sql10 = "SELECT * FROM radio_footer WHERE ordre = " . ($ordre+1);
	
		$req10 = mysql_query($sql10) or die('Erreur SQL: '.$sql10.' - ' . mysql_error() );
	
		$id2 = -1;
		while($data10 = mysql_fetch_assoc($req10))
		{
			$id2 = $data10['id'];
		}
	
		$sql2 = "UPDATE radio_footer SET ordre = " . $ordre . " WHERE id = " . ($id2);
		mysql_query($sql2) or die('Erreur SQL2: '.$sql2.' - ' . mysql_error() );
		// echo $sql2 . '<br />';
	
	
	
		$sql1 = "UPDATE radio_footer SET ordre = " . ($ordre+1) . " WHERE id = " . $_GET['id'];
		mysql_query($sql1) or die('Erreur SQL1: '.$sql1.' - ' . mysql_error() );
		// echo $sql1 . '<br />';
	
		echo '<a class="btn" href="index.php?page=site" >retour</a>';
}
?>