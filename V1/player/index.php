<?php
include('../includes/config.php');
$sql = mysql_query("SELECT * FROM radio_config") or die(mysql_error());
$config = mysql_fetch_array($sql);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="styles.css" />
<!-- POUR MODIFIER LE LIEN DU STREAM DE LA WEBRADIO ALLEZ A LA LIGNE 37 -->
<title>Player - <?php echo $config['nom']; ?></title>

<script type="text/javascript" src="<?php echo $config['www']; ?>js/titre.js"></script>
<script type="text/javascript" src="<?php echo $config['www']; ?>js/pochette.js"></script> 

<script type="text/javascript" src="swfobject.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script> 


</head>

<body onload='refresh_div(); refresh_div2();'>
	<img src="images/logo.png" />
     <div id="contenu">
    	<div id="titreencours">        
   			<div class="pochette">
            	<div id="pochette"></div>
            </div>
            <div id="titre">
            	
            </div>
			<div id="lecteur">
				
    			<!-- BEGINS: AUTO-GENERATED MUSES RADIO PLAYER CODE -->
<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="269" height="52" bgcolor="#FFFFFF">
<param name="movie" value="muses-config.swf" />
<param name="flashvars" value="url=<?php echo $config['rnplay']; ?>&lang=fr&codec=mp3&volume=65&introurl=&autoplay=true&tracking=true&jsevents=false&buffering=5&skin=faredirfare.xml&title=<?php echo $config['nom']; ?>&welcome=Bienvenue%20sur.." />
<param name="wmode" value="transparent" />
<param name="allowscriptaccess" value="always" />
<param name="bgcolor" value="#FFFFFF" />
<param name="scale" value="noscale" />
<embed src="muses-config.swf" flashvars="url=<?php echo $config['rnplay']; ?>&lang=fr&codec=mp3&volume=65&introurl=&autoplay=true&tracking=true&jsevents=false&buffering=5&skin=faredirfare.xml&title=<?php echo $config['nom']; ?>&welcome=Bienvenue%20sur.." width="269" scale="noscale" height="52" wmode="transparent" bgcolor="#FFFFFF" allowscriptaccess="always" type="application/x-shockwave-flash" />
</object>
<!-- ENDS: AUTO-GENERATED MUSES RADIO PLAYER CODE -->
			</div>
    	</div>
        <div id="emissionencours">
       		<div id="emiencours">
            	<div id="image">
                	<img height="90" width="90" src="images/leshitsenpuissance.png"/>
                </div>
            	<div id="emission">
                	<b><?php include('../emission.php'); ?></b><br />sur <?php echo $config['nom']; ?>
                </div>
         	</div>
       		<div id="asuivre">
            	<center></center>
            </div>
      	</div>
       	<div id="autre" align="center">
        	<table height="100%">
            	<tr>
                	<td align="center">
                    	<a href="javascript:window.open('../dediweb','dedi','width=903,height=623,left=50,top=50,scrollbars=0');"><img src="images/dedi.png" height="55" width="70"/><br /></a>
                   	</td>
              	</tr>
                <tr>
                	
             	</tr>
                <tr>
  					<td align="center">
						<img src="images/standard.png" height="50" width="24"/><br />
						02 22 06 05 77
                  	</td>
               	</tr>
        	</table>
        </div>
        <div id="dedicaces">
        	<marquee width=650 height=15 direction=left><?php
$affdedi = mysql_query('SELECT * FROM radio_defilante ORDER BY id DESC LIMIT 0, 15');
while ($aff = mysql_fetch_assoc($affdedi))
{
?><b><?php echo $aff['pseudo']; ?> : </b> <?php $affmessage = nl2br(stripslashes($aff['message'])); echo $affmessage; ?> &nbsp;&nbsp;-&nbsp;&nbsp;<?php } ?></marquee>
        </div>
    </div>
</body>
</html>
