<?php
$pb = "pb";

include('includes/config.php');

	$result = mysql_query("select * from radio_shout order by id desc limit 5");
	while($r=mysql_fetch_array($result))
	{
		$message=$r["message"];
		$pseudo=$r["pseudo"];
		
		$message = str_replace("\'", "'", $message);
		
		if(strlen($message) > 67)
			$message = '<acronym style="text-decoration:none;" title="'.$message.'" >' . substr($message, 0, 61) . ' ...</acronym>';
		
		
		
		?>
		
		<div id="agauche"><b><?php echo $pseudo ?></b> : <?php echo $message; ?> <div class="pull-right" ><? echo date('H:i d/m', $r['temps']); ?></div></div> <br>
		<?php
	}
mysql_close();
?>