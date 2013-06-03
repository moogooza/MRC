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
		<th width="20%" >Outils</th>
	</tr>
</thead>

<tbody>
<?php
$sql = "SELECT * FROM radio_defilante ORDER BY id DESC LIMIT 20";

$req = mysql_query($sql) or die('Erreur SQL: ' . mysql_error() );

while($data = mysql_fetch_assoc($req))
{
	echo '<tr>';
	echo '<td>'.$data['pseudo'].'</td>';
	echo '<td>'.$data['message'].'</td>';
	echo '<td><center>
		<a href="index.php?page=defilante&action=del&id='.$data['id'].'" class="btn" ><i class="icon-trash"></i>
	</a></center></td>';	
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
		$sql = "DELETE FROM radio_defilante WHERE id = ".$_GET['id']." LIMIT 1";
		mysql_query($sql) or die('Erreur SQL: ' . mysql_error() );
	
		// echo $sql;
		?>
		<div class="alert alert-success" >Défilante supprimée avec succès</div><br />
		<a class="btn" href="index.php?page=defilante" >Retour</a>
		<?
	
}
?>