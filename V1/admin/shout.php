<?php
if(!isset($_GET['action']))
{
?>
<center>
<table class="table table-bordered" style="width:800px;" >

<thead>
	<tr>
		<th>Pseudo</th>
		<th>Message</th>
		<th>Date/Heure</th>
		<th width="20%" >Outils</th>
	</tr>
</thead>

<tbody>
<?php
$sql = "SELECT * FROM radio_shout ORDER BY id DESC LIMIT 20";

$req = mysql_query($sql) or die('Erreur SQL: ' . mysql_error() );

while($data = mysql_fetch_assoc($req))
{
$message = $data['message'];
$message = str_replace("\'", "'", $message);
	echo '<tr>';
	echo '<td>'.$data['pseudo'].'</td>';
	echo '<td>'.$message.'</td>';
	echo '<td>'.date('H:i d/m/y', $data['temps']).'</td>';
	echo '<td><center>
		<a href="index.php?page=shout&action=del&id='.$data['id'].'" class="btn" ><i class="icon-trash"></i></a>&nbsp;&nbsp;&nbsp;
		<a href="index.php?page=shout&action=ban&pseudo='.$data['pseudo'].'" class="btn btn-danger" ><i class="icon-off"></i> Bannir</a>
		</center></td>';	
	echo '</tr>';
}
?>
</tbody>
</table>
</center>
<?php
}
else if($_GET['action'] == "del" && is_numeric($_GET['id']))
{
	$sql = "DELETE FROM radio_shout WHERE id = ".$_GET['id']." LIMIT 1";
		mysql_query($sql) or die('Erreur SQL: ' . mysql_error() );
	
		// echo $sql;
		?>
		<div class="alert alert-success" >Message supprimé avec succès</div><br />
		<a class="btn" href="index.php?page=shout" >Retour</a>
		<?
}
else if($_GET['action'] == "ban")
{
		$sql = "UPDATE radio_users SET ban = 1 WHERE username = '".$_GET['pseudo']."'";
		mysql_query($sql) or die('Erreur SQL: ' . mysql_error() );
	
		// echo $sql;
		?>
		<div class="alert alert-success" >Utilisateur banni avec succès !</div><br />
		<a class="btn" href="index.php?page=shout" >Retour</a>
		<?
}
?>