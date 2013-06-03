<?
if(isset($_POST['send']))
{
		$sql = "INSERT INTO radio_news (image, titre, message, stamp) 
		VALUES('".mysql_escape_string($_POST['image'])."', '".mysql_escape_string($_POST['titre'])."', '".mysql_escape_string($_POST['commentaire'])."', UNIX_TIMESTAMP() )";
	
		mysql_query($sql) or die('Erreur SQL: ' . mysql_error() );
}

if(!isset($_GET['action']))
{
?>
<center>
<div class="well2" style="max-width: 500px;">
<form method="post" action="#" >

	Image <input type="text" name="image" /><br />
	Titre <input type="text" name="titre" required /><br />
	Commentaire <textarea name="commentaire" required ></textarea><br />
	<input type="hidden" name="send" />
	<input type="submit" class="btn" />
</form></div></center>
<center>
<table class="table table-bordered" style="width:800px;" >

<thead>
	<tr>
		<th>Image</th>
		<th>Titre</th>
		<th>Texte</th>
		<th width="20%" >Outils</th>
	</tr>
</thead>

<tbody>
<?
$sql = "SELECT * FROM radio_news ORDER BY stamp DESC LIMIT 3";

$req = mysql_query($sql) or die('Erreur SQL: ' . mysql_error() );

while($data = mysql_fetch_assoc($req))
{
	echo '<tr>';
	
	echo '<td>'.($data['image'] != '' ? $data['image'] : '<i class="icon-remove" ></i>').'</td>';
	echo '<td>'.$data['titre'].'</td>';
	echo '<td>'.$data['message'].'</td>';
	echo '<td><center>
		<a href="index.php?page=news&action=edit&id='.$data['id'].'" class="btn" ><i class="icon-pencil"></i></a>&nbsp;&nbsp;&nbsp; 
		<a href="index.php?page=news&action=del&id='.$data['id'].'" class="btn" ><i class="icon-trash"></i>
	</a></center></td>';
	
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
	$sql = "SELECT * FROM radio_news WHERE id = ".$_GET['id']." LIMIT 1";

	$req = mysql_query($sql) or die('Erreur SQL: ' . mysql_error() );

	while($data = mysql_fetch_assoc($req))
	{
		
		$img = $data['image'];
		$titre = $data['titre'];
		$txt = $data['message'];
	}
	?>
	<center>
<div class="well2" style="max-width: 500px;">
	<form method="post" action="#" >

		Image <input type="text" name="image" value="<? echo $img; ?>" /><br />
		Titre <input type="text" name="titre" value="<? echo $titre; ?>" required /><br />
		Commentaire <textarea name="commentaire" required ><? echo $txt; ?></textarea><br />
		<input type="hidden" name="send2" />
		<input type="submit" class="btn" />
	</form>
	</div>
	</center>
	<?
	}
	else
	{
	
			$sql = "UPDATE radio_news SET image = '".mysql_escape_string($_POST['image'])."', titre = '".mysql_escape_string($_POST['titre'])."', message = '".mysql_escape_string($_POST['commentaire'])."' WHERE id = ".$_GET['id']." LIMIT 1";
			mysql_query($sql) or die('Erreur SQL: ' . mysql_error() );
		
			// echo $sql;
			?>
			<div class="alert alert-success" >News éditée avec succès</div><br />
			<a class="btn" href="index.php?page=news" >retour</a>
			<?
		
	}
}
else if($_GET['action'] == "del" && is_numeric($_GET['id']))
{
		$sql = "DELETE FROM radio_news WHERE id = ".$_GET['id']." LIMIT 1";
		mysql_query($sql) or die('Erreur SQL: ' . mysql_error() );
	
		// echo $sql;
		?>
		<div class="alert alert-success" >News supprimée avec succès</div><br />
		<a class="btn" href="index.php?page=news" >retour</a>
		<?
}
?>