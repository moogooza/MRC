<?php
//On initialise le fuseau horaire
$city["GMT"] = 1.0;//GMT +1
$city["actualDST"] = 0.0; //Heure d'été ou d'hiver (1/0)
$gmt_diff = $city["GMT"]+$city["actualDST"]; //Pour calculer le fuseau horaire
$city_time = time()+($gmt_diff*3600); //On initialise l'heure
 
   $currentheure = date("H"); //On mets les heures dans une variable
   $currentminutes = date("i"); //On mets les minutes dan une variable
   $currentjour = date("w"); //On mets le jour dans une variable (0 pour dimanche ... 6 pour samedi)
  
if($currentheure >= 0 AND $currentheure < 5) //Si il est entre minuit et 5h
{
  $message = "Ca bouge sur Ezur";// Le message sera "Ca bouge sur Ezur"
}
elseif($currentheure >= 5 AND $currentheure < 8 AND $currentminutes < 45) //Si il est entre 5h et 7h45
{
  $message = "Aven Actuel : Tous les hits du moment";
}
elseif($currentheure >= 7 AND $currentheure < 8 AND $currentminutes >= 45) //Si il est entre 7h45 et 8h
{
  $message = "Les deux minutes du peuple !";
}
elseif($currentheure >= 7 AND $currentheure <= 8 AND ($currentminutes >= 45 OR $currentminutes <=15) AND ($currentjour == 0 OR $currentjour == 3 OR $currentjour == 6)) // Si il est entre 7h45 et 8h15 ET que le jour est soit un samedi, dimanche ou mercredi
{
  $message = "Les deux minutes du peuple !";
}
elseif($currentheure >= 8 AND $currentheure <= 11 AND $currentminutes < 30)
{
  $message = "Aven Actuel : Tous les hits du moment";
}
elseif($currentheure >= 11 AND $currentheure <= 13)
{
  $message = "Détendez-vous avec Eden Eternews";
}
elseif($currentheure >= 13 AND $currentminutes > 30 AND $currentheures < 15)
{
  $message = "Aven Actuel : Tous les hits du moment";
}
elseif($currentheure == 15 AND $currentminutes >= 0 AND $currentminutes < 15)
{
  $message = "Le deux minutes du peuple !";
}
elseif(($currentjour == 3 OR $currentjour == 6 OR $currentjour == 0) AND $currentheure >= 16 AND $currentheure < 17)
{
  $message = "J-music !";
}
elseif($currentheure >= 15 AND $currentheure < 19)
{
  $message = "Aven Actuel : Tous les hits du moment";
}
elseif($currentheure >= 19 AND $currentheure < 20)
{
  $message = "Musiques de jeux !";
}
elseif($currentheure >= 20 AND $currentheure < 23)
{
  $message = "Aven Actuel : Tou les hits du moment";
}
elseif($currentheure >= 23 AND $currentheure < 24)
{
  $message = "Ca bouge sur Ezur !";
}
else //On s'assure que si y'a un problème, ça renvoie erreur.
{
  $messagee = "Erreur";
}



echo $messagee;
?>

