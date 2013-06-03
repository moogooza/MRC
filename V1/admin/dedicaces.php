<?php

if(isset($_GET['action']))
{
	if($_GET['action'] == "valider" && is_numeric($_GET['id']))
	{
		$sql = "DELETE FROM radio_dedicaces WHERE id = ".$_GET['id']." LIMIT 1";
		mysql_query($sql) or die('Erreur SQL: ' . mysql_error() );
		
		// echo $sql;
		?>
			<div class="alert alert-success" >Dédicace validée avec succès</div><br />
		<?
	}
	else if($_GET['action'] == "ban")
	{
		$sql = "UPDATE radio_users SET ban = 1 WHERE username = '".$_GET['pseudo']."'";
		mysql_query($sql) or die('Erreur SQL: ' . mysql_error() );	
	}
}

?>

<script>
function DoAction(action, id, divid, tdid)
{
	// console.log('Action = ' + action + ' & id = ' + id);
	document.getElementById(divid).innerHTML= "<img alt='loading' src='loading.gif' style='width:16px;' />";
	
	
	if(action == 'valider')
		$("#responsecontainer").load("process.php?page=dedicace_process&action=" + action + "&id=" + id);
		
	else
		$("#responsecontainer").load("process.php?page=dedicace_process&action=" + action + "&pseudo=" + id);
	
	setTimeout(function() 
	{
		if(action == 'valider')
			document.getElementById(tdid).innerHTML= "";
		
		$("#responsecontainer").show().delay(3000).fadeOut();
	}, 1 );
	
	// $("#responsecontainer").load("move.php");
   // $.ajaxSetup({ cache: false });
}
</script>


<div id="responsecontainer">
</div>

<center>


<br />
<br />




<script>
$(document).ready(function() 
{
	$("#responsecontainer2").load("process.php?data=dedicace");
	
	var x = 0;
	
	var refreshId = setInterval(function()
	{
		$("#responsecontainer2").load('process.php?data=dedicace&x=' + (x) );
		if(x == 10*15)
		{
			clearInterval(refreshId);
		}
		x++;
	}, 6000);
	$.ajaxSetup({ cache: false });
});
</script>

<div id="responsecontainer2">
</div>

</center>