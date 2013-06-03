<?php
include('call_api.php');

if($fichier[14] == "" || strpos($fichier[14], '______________') !== false)
{
	echo '<img src="http://image.noelshack.com/fichiers/2011/32/1312919725-nojaquette.png" height="116" width="116"/>';
}
else
{
	echo '<img src="'.$fichier[14].'" height="116" width="116"/>';
}
?>