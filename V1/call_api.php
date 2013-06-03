<?php
include('global.php');
// Votre RadioUID
// $radiouid = "4D6260E6-CFC2-49A0-A73E-585B0CEB2E03";
$radiouid = $config['rnuid'];
// Votre APIKey
// $apikey = "08ee6d03-154a-4c62-9d52-87b10fe210d9";
$apikey = $config['rnapikey'];
// Récupération des pochettes
$cover = "yes"; // "yes" ou "no"



/* --------------------------------- */
/*   #### ! NE PAS MODIFIER ! ####   */
/* --------------------------------- */

// Fichier de cache local
$cache = './cache_api.txt';
$cacheCall = './cache_callapi.txt';
$date = "-1";

// Test des droits d'accès
if(substr(decoct(@fileperms($cacheCall)),3, 3) != "777" && substr(decoct(@fileperms($cacheCall)),3, 3) != "644" && !@chmod($cacheCall, 0777)){
  echo 'Erreur ! Vous devez autoriser en écriture le fichier cache_callapi.txt';
  exit;
}
if(substr(decoct(@fileperms($cache)),3, 3) != "777" && substr(decoct(@fileperms($cache)),3, 3) != "644" && !@chmod($cache, 0777)){
  echo 'Erreur ! Vous devez autoriser en écriture le fichier cache_api.txt';
  exit;
}

if($lines = file($cacheCall)){$date = (isset($lines[1]) ? $lines[1] : '-1'); $time = $lines[0]; $expire = time() - $time;}
else{$expire = time() - 1;}
if(@file_exists($cache) && $date > $expire && file_get_contents($cache) != ""){	//echo file_get_contents($cache);
}
else{
	@file_put_contents($cacheCall, "200"."\n".time());
	$context = stream_context_create(array('http' => array('timeout' => 30)));
	touch($cache);
	$xml = @file_get_contents('http://api.radionomy.com/currentsong.cfm?radiouid='.$radiouid.'&callmeback=yes&type=xml'.(!empty($apikey) ? '&apikey='.$apikey : '').''.(!empty($cover) ? '&cover='.$cover : '').'',0, $context);
	if(!$xml)
		$xml = @simplexml_load_file($cache);
	else{
    @file_put_contents($cache, $xml);
    $xml = @simplexml_load_file($cache);
    $expireNext = ($xml->track->callmeback / 1000);
    if($expireNext < 10) $expireNext = 60;
    @file_put_contents($cacheCall, $expireNext."\n".time());
  }
	//echo file_get_contents($cache);
}
?>

<?php //RECUPERATION DU TITRE
 $fichier = file("cache_api.txt"); 
 // Localisation du fichier txt 
 $total = count($fichier); 
 // Compte le nombre de ligne 
 $fichier[8] = str_replace("<title>" , "", $fichier[8]); 
 // Supprime la balise title (la cause du probleme) 
 $fichier[8] = str_replace("</title>" , "", $fichier[8]); 
 // Supprime la balise title (la cause du probleme) 
 $fichier[9] = str_replace("<artists>" , "", $fichier[9]); 
 // Supprime la balise artists 
 $fichier[9] = str_replace("</artists>" , "", $fichier[9]); 
 
 if(strpos($fichier[14], '<cover></cover>') === false)
 {
 
 // Supprime la balise artists 
  $fichier[14] = str_replace("<cover>" , "", $fichier[14]); 
 // Supprime la balise artists 
 $fichier[14] = str_replace("</cover>" , "", $fichier[14]);
 }
 else
 {
	$fichier[14] = '';
 }
 
 // if($fichier[14] == '')
	// $fichier[14] = $config['www'] . 'radio.ico';
 
 // Affiche le titre : Artiste - Titre 
 ?>