<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" href="{$www}styles.css" />
<link rel="stylesheet" href="{$www}css/bootstrap.css" />
<link rel="shortcut icon" href='{$www}images/favicon.ico' />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
{if $defilante == '1'}
<style type="text/css">
body, html	{
	margin:0;
	padding:0;
	font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
  	font-size: 14px;
	background-attachment: scroll;
	background-color: #7d7e7d;
	background-position: top 50px;
	background-image: url({$www}images/bg.png);
	margin-top: 10px;
	background-repeat: no-repeat;
	background-position: center top;
}
</style>
{/if}

<title>{$nompage} - {$nomsite}</title>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script> 
<script type="text/javascript" src="{$www}js/titre.js"></script>
{if $nompage == 'Communauté'}<script type="text/javascript" src="{$www}js/musique.js"></script>{/if}
<script type="text/javascript" src="{$www}js/pochette.js"></script> 
</head>

<body onload='refresh_div(); refresh_div2();{if $nompage == 'Communauté'} refresh_div3();{/if}'>

{if $defilante == '1'}
<div id="dedi" style="width:100%; z-index:999; height:27px; background:url({$www}images/bg_pub.png); top:0; position:fixed;">
<div style="margin-left: 10px;margin-top: 2px;"><font color="#FFD700"><b>Messages des VIP ::</b></font></div>

 <marquee style="margin-left: 160px;margin-top: -17px;"><font color="white"><center>
 {foreach from=$list item=row}
 <b>{$row.pseudo} : </b> {$row.message|parseSmiley|nl2br|stripslashes} &nbsp;&nbsp;-&nbsp;&nbsp;{/foreach}</center></font></marquee>
</div>
{/if}

<div id="conteneur">
  <div id="header">
        <div id="fantop">
              <a href="https://www.facebook.com/" target="_blank"><img src="{$www}images/devenez fan.png" onmouseout="javascript:this.src='{$www}images/devenez fan.png';" onmouseover="javascript:this.src='{$www}images/devenez fan1.png';" /></a><a href="https://twitter.com/" target="_blank"><img src="{$www}images/suiveznous.png" onmouseout="javascript:this.src='{$www}images/suiveznous.png';" onmouseover="javascript:this.src='{$www}images/suiveznous1.png';" /> </a>
              
        </div>
    	<a onclick="javascript:window.open('{$www}player/','webcam','width=815,height=390,left=50,top=50,scrollbars=0');"><div id="encours"> 
<div id="pochette"></div>
<div id="titre"></div>
<div id="emissionencours"><b>{include_php file='emission.php'}</b></div>
    	</div></a>
        <div id="logo">
        	{if $rewrite == '1'}<a href="{$www}accueil">{else}<a href="{$www}index.php">{/if}<img src="{$www}images/logo.png" height="100"/></a>
        </div>
  	</div>
  <div id="menu">
        {include file='templates/defaut/fichiers/menu.tpl'}
    </div>
