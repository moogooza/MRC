<?php
@session_start();
include('global.php');
if(!isset($_SESSION['username']))
{
header('Location: ../connexion.php');
}
if(isset($_SESSION['username']) && $user['rang'] < 2)
{
header('Location: ../connexion.php');
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" href="<?php echo $config['www']; ?>styles.css" />
<link rel="stylesheet" href="<?php echo $config['www']; ?>css/bootstrap.css" />
<link rel="shortcut icon" href='<?php echo $config['www']; ?>images/favicon.ico' />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
if($config['defilante'] == 1)
{
?>
<style type="text/css">
body, html	{
	margin:0;
	padding:0;
	font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
  	font-size: 14px;
	background-attachment: scroll;
	background-color: #7d7e7d;
	background-position: top 50px;
	background-image: url(<?php echo $config['www']; ?>images/bg.png);
	margin-top: 10px;
	background-repeat: no-repeat;
	background-position: center top;
}
</style>
<?php
}
?>

<title>Admin panel - <?php echo $config['nom']; ?></title>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script> 
<!-- <script type="text/javascript" src="http://soundzone.moul.eu/barre.js"></script> -->
<script type="text/javascript" src="<?php echo $config['www']; ?>js/titre.js"></script>
<script type="text/javascript" src="<?php echo $config['www']; ?>js/musique.js"></script>
<script type="text/javascript" src="<?php echo $config['www']; ?>js/pochette.js"></script> 
</head>

<body onload='refresh_div(); refresh_div2(); refresh_div3();'>
<?php
if($config['defilante'] == 1)
{
?>
<div id="dedi" style="width:100%; z-index:999; height:27px; background:url(../images/bg_pub.png); top:0; position:fixed;">
<div style="margin-left: 10px;margin-top: 2px;"><font color="#FFD700"><b>Messages des VIP ::</b></font></div>

 <marquee style="margin-left: 160px;margin-top: -17px;"><font color="white"><center><?php
$affdedi = mysql_query('SELECT * FROM radio_defilante ORDER BY id DESC LIMIT 0, 15');
while ($aff = mysql_fetch_assoc($affdedi))
{
?><b><?php echo $aff['pseudo']; ?> : </b> <?php $affmessage = parseSmiley(nl2br(stripslashes($aff['message']))); echo $affmessage; ?> &nbsp;&nbsp;-&nbsp;&nbsp;<?php } ?> </center></font></marquee>
</div>
<?php
}
else
{
}
?>

<div id="conteneur">
  <div id="header">
        <div id="fantop">
              <a href="https://www.facebook.com/" target="_blank"><img src="<?php echo $config['www']; ?>images/devenez fan.png" onmouseout="javascript:this.src='<?php echo $config['www']; ?>images/devenez fan.png';" onmouseover="javascript:this.src='<?php echo $config['www']; ?>images/devenez fan1.png';" /></a><a href="https://twitter.com/" target="_blank"><img src="<?php echo $config['www']; ?>images/suiveznous.png" onmouseout="javascript:this.src='<?php echo $config['www']; ?>images/suiveznous.png';" onmouseover="javascript:this.src='<?php echo $config['www']; ?>images/suiveznous1.png';" /> </a>
              
        </div>
    	<a href="javascript:window.open('<?php echo $config['www']; ?>player/','webcam','width=815,height=390,left=50,top=50,scrollbars=0');"><div id="encours"> 
<div id="pochette"></div>
<div id="titre"></div>
<div id="emissionencours"><b>ADMIN PANEL</b></div>
    	</div></a>
        <div id="logo">
        	<a href="<?php echo $config['www']; ?>index.php"><img src="<?php echo $config['www']; ?>images/logo.png" height="100"/></a>
        </div>
  	</div>
  <div id="menu">
       <?php include('fichiers/menu.php'); ?>
    </div>