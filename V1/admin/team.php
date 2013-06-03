<?php
if($user['rang'] != 3)
{
	mysql_close();
	die('Il n\'y a rien pour toi ici..');
}
if(isset($_POST['send']))
{
		$sql = "INSERT INTO radio_equipe (id, pseudo, avatar, rrang, description) 
			VALUES('', '".mysql_escape_string($_POST['pseudo'])."', '".mysql_escape_string($_POST['avatar'])."', '".mysql_escape_string($_POST['rrang'])."', '".mysql_escape_string($_POST['description'])."' )";
	
		mysql_query($sql) or die('Erreur SQL: ' . mysql_error() );
}

if(!isset($_GET['action']))
{
?>
<center>
<div class="well2" style="max-width: 500px;">
<form method="post" action="#" >

	Pseudo <input type="text" name="pseudo" required /><br />
	Avatar <input type="text" name="avatar" required /><br />

		<b>Rang Radio</b><br><br> <label class="radio">
		<input type="radio" name="rrang" id="optionsRadios1" value="Admin" checked="checked">
		Administrateur
		</label>
		<label class="radio">
		<input type="radio" name="rrang" id="optionsRadios2" value="Anim">
		Animateur
		</label>
		<br>
	Description <textarea name="description" required ></textarea><br>
		
	<input type="hidden" name="send" />
	<input type="submit" class="btn" />
</form></div></center>
<center>
<table class="table table-bordered" style="width:800px;" >

<thead>
	<tr>
		<th>Pseudo</th>
		<th>Rang Radio</th>
		<th>Description</th>
		<th width="20%" >Outils</th>
	</tr>
</thead>

<tbody>
<?php
$sql = "SELECT * FROM radio_equipe ORDER BY id ASC LIMIT 10";

$req = mysql_query($sql) or die('Erreur SQL: ' . mysql_error() );

while($data = mysql_fetch_assoc($req))
{
	echo '<tr>';
	echo '<td>'.$data['pseudo'].'</td>';
	echo '<td>'.$data['rrang'].'</td>';
	echo '<td>'.stripslashes($data['description']).'</td>';
	echo '<td><center>
		<a href="index.php?page=team&action=edit&id='.$data['id'].'" class="btn" ><i class="icon-pencil"></i></a>&nbsp;&nbsp;&nbsp; 
		<a href="index.php?page=team&action=del&id='.$data['id'].'" class="btn" ><i class="icon-trash"></i>
	</a></center></td>';
	
	// if($navigateur == "Chrome")	echo '<br /><br />';
	
	// echo '<td><b>'.$data['titre'].'</b><br />'.$data['message'].'<br /><br /></td>';
	
	echo '</tr>';
}
?>
</tbody>
</table>
</center>
<?php
}
else if($_GET['action'] == "edit" && is_numeric($_GET['id']))
{

	if(!isset($_POST['send2']))
	{
	$sql = "SELECT * FROM radio_equipe WHERE id = ".$_GET['id']." LIMIT 1";

	$req = mysql_query($sql) or die('Erreur SQL: ' . mysql_error() );

	while($data = mysql_fetch_assoc($req))
	{
		
		$pseudo = $data['pseudo'];
		$avatar = $data['avatar'];
		$rrang = $data['rrang'];
		$description = stripslashes($data['description']);
	}
	?>
	<form method="post" action="#" >

		Pseudo <input type="text" name="pseudo" value="<? echo $pseudo; ?>" required /><br />
		Avatar <input type="text" name="avatar" value="<? echo $avatar; ?>" required /><br />
		
		Rang Radio<br><br> <label class="radio">
		<input type="radio" name="rrang" id="optionsRadios1" value="Admin" <?php if($rrang == 'Admin'){ echo 'checked '; } ?>>
		Administrateur
		</label>
		<label class="radio">
		<input type="radio" name="rrang" id="optionsRadios2" value="Anim" <?php if($rang == 'Anim'){ echo 'checked '; } ?>>
		Animateur
		</label>
		<br>
		Description <textarea name="description" required ><? echo $description; ?></textarea><br />
		<input type="hidden" name="send2" />
		<input type="submit" class="btn" />
	</form>
	<?php
	}
	else
	{
		$sql = "UPDATE radio_equipe SET pseudo = '".mysql_escape_string($_POST['pseudo'])."', avatar = '".mysql_escape_string($_POST['avatar'])."', rrang = '".mysql_escape_string($_POST['rrang'])."', description = '".mysql_escape_string($_POST['description'])."' WHERE id = ".$_GET['id']." LIMIT 1";
			mysql_query($sql) or die('Erreur SQL: ' . mysql_error() );
		
			// echo $sql;
			?>
			<div class="alert alert-success" >Staff édité avec succès</div><br />
			<a class="btn" href="index.php?page=team" >Retour</a>
			<?php
	}
}
else if($_GET['action'] == "del" && is_numeric($_GET['id']))
{
		$sql = "DELETE FROM radio_equipe WHERE id = ".$_GET['id']." LIMIT 1";
		mysql_query($sql) or die('Erreur SQL: ' . mysql_error() );
	
		// echo $sql;
		?>
		<div class="alert alert-success" >Membre staff supprimé avec succès</div><br />
		<a class="btn" href="index.php?page=team" >Retour</a>
		<?php
}
?>