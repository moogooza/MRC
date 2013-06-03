<?php
if($user['rang'] != 3)
{
	mysql_close();
	die('Il n\'y a rien pour toi ici..');
}
if(!isset($_GET['action']))
{
?>
<center>
<table class="table table-bordered" style="width:800px;" >

<thead>
	<tr>
		<th>Pseudo</th>
		<th width="20%" >Outils</th>
	</tr>
</thead>

<tbody>
<?php
$sql = "SELECT * FROM radio_users WHERE ban = 1 ORDER BY id ASC LIMIT 20";

$req = mysql_query($sql) or die('Erreur SQL: ' . mysql_error() );

while($data = mysql_fetch_assoc($req))
{
	echo '<tr>';
	echo '<td>'.$data['username'].'</td>';
	echo '<td><center>
		<a href="index.php?page=ban&action=unban&id='.$data['id'].'" class="btn btn-danger" ><i class="icon-off"></i> De-Bannir</a>
		</center></td>';	
	echo '</tr>';
}
?>
</tbody>
</table>
</center>
<?php
}
else if($_GET['action'] == "unban")
{

	$sql = "UPDATE radio_users SET ban = 0 WHERE id = '".$_GET['id']."'";
	mysql_query($sql) or die('Erreur SQL: ' . mysql_error() );
	
	// echo $sql;
	?>
		<div class="alert alert-success" >Utilisateur debanni avec succès !</div><br />
		<a class="btn" href="index.php?page=ban" >Retour</a>
	<?
	
}
?>