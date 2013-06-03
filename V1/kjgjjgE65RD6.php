<?php
session_start();
include('global.php');

// Déclaration des variables
$ident=$idp=$ids=$idd=$codes=$code1=$code2=$code3=$code4=$code5=$datas='';
$idp = $config['idp'];
// $ids n'est plus utilisé, mais il faut conserver la variable pour une question de compatibilité
$idd = $config['idd'];
$ident=$idp.";".$ids.";".$idd;
// On récupère le(s) code(s) sous la forme 'xxxxxxxx;xxxxxxxx'
if(isset($_POST['code1'])) $code1 = $_POST['code1'];
if(isset($_POST['code2'])) $code2 = ";".$_POST['code2'];
if(isset($_POST['code3'])) $code3 = ";".$_POST['code3'];
if(isset($_POST['code4'])) $code4 = ";".$_POST['code4'];
if(isset($_POST['code5'])) $code5 = ";".$_POST['code5'];
$codes=$code1.$code2.$code3.$code4.$code5;
// On récupère le champ DATAS
if(isset($_POST['DATAS'])) $datas = $_POST['DATAS'];
// On encode les trois chaines en URL
$ident=urlencode($ident);
$codes=urlencode($codes);
$datas=urlencode($datas);

/* Envoi de la requête vers le serveur StarPass
Dans la variable tab[0] on récupère la réponse du serveur
Dans la variable tab[1] on récupère l'URL d'accès ou d'erreur suivant la réponse du serveur */
$get_f=@file("http://script.starpass.fr/check_php.php?ident=$ident&codes=$codes&DATAS=$datas");
if(!$get_f)
{
exit("Votre serveur n'a pas accès au serveur de StarPass, merci de contacter votre hébergeur.");
}
$tab = explode("|",$get_f[0]);

if(!$tab[1]) $url = "vip.php?p=erreur";
else $url = $tab[1];

// dans $pays on a le pays de l'offre. exemple "fr"
$pays = $tab[2];
// dans $palier on a le palier de l'offre. exemple "Plus A"
$palier = urldecode($tab[3]);
// dans $id_palier on a l'identifiant de l'offre
$id_palier = urldecode($tab[4]);
// dans $type on a le type de l'offre. exemple "sms", "audiotel, "cb", etc.
$type = urldecode($tab[5]);
// vous pouvez à tout moment consulter la liste des paliers à l'adresse : http://script.starpass.fr/palier.php

// Si $tab[0] ne répond pas "OUI" l'accès est refusé
// On redirige sur l'URL d'erreur
if(substr($tab[0],0,3) != "OUI")
{
header('Location: '.$url.'');
      exit;
}
else
{
      /* Le serveur a répondu "OUI"

      On place un cookie appelé CODE_BON et qui vaut la valeur 1
      Ce cookie est valide jusqu'à ce que l'internaute ferme son navigateur
      Dans les pages suivantes, nous testerons l'existence du cookie
      S'il existe, c'est que l'internaute est autorisé,
      sinon on le renverra sur une page d'erreur */
      setCookie("CODE_BON", "1", 0);
      // Si vous avez plusieurs documents, nommer le cookie plutôt 'code'+iDocumentId 

      // vous pouvez afficher les variables de cette façon :
      // echo "idd : $idd / codes : $codes / datas : $datas / pays : $pays / palier : $palier / id_palier : $id_palier / type : $type";
}

//On verifie si lutilisateur est connecte
if(isset($_SESSION['username']))
{


$pts = "UPDATE radio_users SET vip = 1 WHERE id = '".$user['id']."'";
$pts0 = "UPDATE radio_users SET debut_vip = NOW() WHERE id = '".$user['id']."'";
$pts1 = "UPDATE radio_users SET fin_vip = NOW() WHERE id = '".$user['id']."'";
$pts2 = "UPDATE radio_users SET fin_vip = DATE_ADD(fin_vip, INTERVAL 1 MONTH) WHERE id = '".$user['id']."'";
$action = mysql_query($pts);
$action0 = mysql_query($pts0);
if($user['fin_vip'] == '0000-00-00 00:00:00')
{
	$action1 = mysql_query($pts1);
}
$action2 = mysql_query($pts2);

header('Location: vip.php?p=ok');
}
else
{
?>
pas co
<?
}
?>