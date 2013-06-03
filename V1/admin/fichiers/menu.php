<?php
include('fonctions.php');
if(GetPageName() == "menu.php")
{
	die('trojan.exe en cours de Telechargement.. 73%');
}
?>
 <ul id="navigation">
            <li><a href="<?php echo $config['www']; ?>">RETOUR SITE</a></li>
            <li><a href="javascript:window.open('<?php echo $config['www']; ?>player/','webcam','width=815,height=390,left=50,top=50,scrollbars=0');">ECOUTER</a></li>
            
           
       	</ul>