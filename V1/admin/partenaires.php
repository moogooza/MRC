<?php
if($user['rang'] != 3)
{
	mysql_close();
	die('Il n\'y a rien pour toi ici..');
}
if(isset($_POST['send']))
{
	$sql = "INSERT INTO radio_partenaires (nom, ref, img) 
			VALUES('".mysql_escape_string($_POST['nom'])."', '".mysql_escape_string($_POST['ref'])."', '".mysql_escape_string($_POST['img'])."')";
	
		mysql_query($sql) or die('Erreur SQL: ' . mysql_error() );
}

if(!isset($_GET['action']))
{
?>
<center>
<div class="well2" style="max-width: 500px;">
<form method="post" action="#" >

	Nom du partenaire <input type="text" name="nom" /><br />
	Lien du site <input type="text" name="ref" required /><br />
	Image <textarea name="img" required ></textarea><br />
	<input type="hidden" name="send" />
	<input type="submit" class="btn" />
</form></div></center>
<center>
<table class="table table-bordered" style="width:800px;" >

<thead>
	<tr>
		<th>Nom</th>
		<th>Lien</th>
		<th>Image</th>
		<th width="20%" >Outils</th>
	</tr>
</thead>

<tbody>
<?
$sql = "SELECT * FROM radio_partenaires ORDER BY nom ASC";

	$req = mysql_query($sql) or die('Erreur SQL: ' . mysql_error() );

	while($data = mysql_fetch_assoc($req))
	{
		echo '<tr>';
		
		echo '<td>'.$data['nom'].'</td>';
		echo '<td><a href="'.$data['ref'].'" target="_blank">'.$data['ref'].'</a></td>';
		echo '<td><a href="'.$data['img'].'" target="_blank">'.$data['img'].'</a></td>';
		
		echo '<td><center>
			<a href="index.php?page=partenaires&action=edit&id='.$data['id'].'" class="btn" ><i class="icon-pencil"></i></a>&nbsp;
			<a href="index.php?page=partenaires&action=del&id='.$data['id'].'" class="btn" ><i class="icon-trash"></i></a>&nbsp;';
			
			
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
else if($_GET['action'] == "edit" && is_numeric($_GET['id']))
{

	if(!isset($_POST['send2']))
	{
	$sql = "SELECT * FROM radio_partenaires WHERE id = ".$_GET['id']." LIMIT 1";

	$req = mysql_query($sql) or die('Erreur SQL: ' . mysql_error() );

	while($data = mysql_fetch_assoc($req))
	{
		
		$nom = $data['nom'];
		$lien = $data['ref'];
		$image = $data['img'];
	}
	?>
	<center>
<div class="well2" style="max-width: 500px;">
	<form method="post" action="#" >

		Nom <input type="text" name="nom" value="<? echo $nom; ?>" /><br />
		Lien <input type="text" name="ref" value="<? echo $lien; ?>" required /><br />
		Image <textarea name="img" required ><? echo $image; ?></textarea><br />
		<input type="hidden" name="send2" />
		<input type="submit" class="btn" />
	</form>
	</div>
	</center>
	<?
	}
	else
	{
			$sql = "UPDATE radio_partenaires SET nom = '".mysql_escape_string($_POST['nom'])."', ref = '".mysql_escape_string($_POST['ref'])."', img = '".mysql_escape_string($_POST['img'])."' WHERE id = ".$_GET['id']." LIMIT 1";
			mysql_query($sql) or die('Erreur SQL: ' . mysql_error() );
		
			// echo $sql;
			?>
			<div class="alert alert-success" >Partenaire édité avec succès</div><br />
			<a class="btn" href="index.php?page=partenaires" >Retour</a>
			<?
	}
}
else if($_GET['action'] == "del" && is_numeric($_GET['id']))
{
		$sql = "DELETE FROM radio_partenaires WHERE id = ".$_GET['id']." LIMIT 1";
		mysql_query($sql) or die('Erreur SQL: ' . mysql_error() );
	
		// echo $sql;
		?>
		<div class="alert alert-success" >Partenaire supprimé avec succès</div><br />
		<a class="btn" href="index.php?page=partenaires" >Retour</a>
		<?
}
?>