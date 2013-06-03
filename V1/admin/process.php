<?
@session_start();

$page = "";

if(isset($_GET['data']))
	$page = $_GET['data'];
	
// echo 'blabla';	

// echo $_GET['data'];
	
if($page == "dedicace")
{
?>

<script>
/*  $(document).ready(function() {
 	 $("#responsecontainer").load("process.php?data=dedibar");
   var refreshId = setInterval(function() {
      $("#responsecontainer").load('process.php?data=dedibar');
   }, 1000);
   $.ajaxSetup({ cache: false });
}); */


setTimeout(function(){

    $('.progress .bar').each(function() {
        var me = $(this);
        var perc = me.attr("data-percentage");

        var current_perc = 0;

        var progress = setInterval(function() {
            if (current_perc>=perc) {
                clearInterval(progress);
            } else {
                current_perc +=1;
                me.css('width', (current_perc)+'%');
            }

            // me.text((current_perc)+'%');

        }, 50);

    });

},200);




</script>

<?

if(!isset($_GET['x']))
	$_GET['x'] = 0;

$ar = array(
	
		'info',
		'success',
		'warning',
		'danger'
	);
	
	if($_GET['x'] < (10*15))
	{
		$time = floor(15-($_GET['x']/10));
		
		if($time > 0)
			echo '<div class="alert alert-info" >Ce page ne se rafraichira plus dans '.$time.' minute(s)</div>';
		else
			echo '<div class="alert alert-info" >Ce page ne se rafraichira plus dans moins d\'une minute</div>';
		$_SESSION['played'] = false;
	}
	else
	{
		if(!isset($_SESSION['played']) || $_SESSION['played'] == false)
		{
			echo '<audio autoplay="autoplay" hidden >  
				<source src="rafraichir.ogg" />  
					</audio>';
			$_SESSION['played'] = true;
		}

echo '<div class="alert alert-info" >Ce page ne se rafraichira plus !<br /><a href="index.php?page=dedicaces" class="btn" >RAFRAICHIR</a></div>';
	}
	
	echo '
	<div class="progress progress-striped progress-'.$ar[array_rand($ar)].'">
<div class="bar" style="float: left;" data-percentage="100"></div>
</div>';

?>



<table class="table table-bordered table-striped" style="width:800px;" >

<thead>
	<tr>
		<th>Pseudo</th>
		<th>Message</th>
		<th>Date / Heure</th>
		<th width="23%" >Outils</th>
	</tr>
</thead>

<tbody>

<?php
include('global.php');

$sql = "SELECT * FROM radio_dedicaces ORDER BY id DESC LIMIT 100";

$req = mysql_query($sql) or die('Erreur SQL: ' . mysql_error() );

$count = 0;

while($data = mysql_fetch_assoc($req))
{
	$count++;
	$data['message'] = str_replace("\'", "'", $data['message']);
	echo '<tr id="td_'.$count.'" >';
	echo '<td>'.$data['pseudo'].'</td>';
	echo '<td>'.$data['message'].'</td>';
	echo '<td>'.date('H:i', $data['temps']).'</td>';
	echo '<td><center>
		<!-- <a href="index.php?page=dedicaces&action=valider&id='.$data['id'].'" class="btn btn-success" ><i class="icon-ok"></i> Lue</a>&nbsp;
		<a href="index.php?page=dedicaces&action=ban&pseudo='.$data['pseudo'].'" class="btn btn-danger" ><i class="icon-off"></i> Bannir</a> -->
		
		<a id="lu_'.$count.'" onclick="DoAction(\'valider\', '.$data['id'].', \'lu_'.$count.'\', \'td_'.$count.'\')" class="btn btn-success" ><i class="icon-ok"></i> Lue</a>&nbsp;
		<!-- <a id="ban_'.$count.'" onclick="DoAction(\'ban\', '.$data['pseudo'].', \'ban_'.$count.'\', \'td_'.$count.'\')" class="btn btn-danger" ><i class="icon-off"></i> Bannir</a> -->
		<a href="index.php?page=dedicaces&action=ban&pseudo='.$data['pseudo'].'" class="btn btn-danger" ><i class="icon-off"></i> Bannir</a>
		</center></td>';	
	echo '</tr>';
}

mysql_close();
// echo 'hey';
?>


</tbody>
</table>

<?
}
else if($page = "dedicace_process")
{
	echo '<div style="position:absolute; top:390px; width:100%;" >
	<center>';
	include('../includes/config.php');
	if(isset($_GET['action']))
	{
		if($_GET['action'] == "valider" && is_numeric($_GET['id']))
		{
			$sql = "DELETE FROM radio_dedicaces WHERE id = ".$_GET['id']." LIMIT 1";
			mysql_query($sql) or die('Erreur SQL: ' . mysql_error() );
			
			// echo $sql;
			?>
				<div style="width:500px;" class="alert alert-success" >Dédicace validée avec succès</div>
			<?
		}
		else if($_GET['action'] == "ban")
		{
			$sql = "UPDATE radio_users SET ban = 1 WHERE username = '".$_GET['pseudo']."'";
			mysql_query($sql) or die('Erreur SQL: ' . mysql_error() );	
		}
	}
	mysql_close();
	
	echo '</center></div>';
}
?>