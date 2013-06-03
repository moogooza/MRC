<?php
include('fonctions.php');
 /**
 * Example Application

 * @package Example-application
 */


$smarty = new SmartyBC();

$smarty->assign('www', $config['www']);
$smarty->assign('nomsite', $config['nom']);
$smarty->assign('nompage', $page);
$smarty->assign('getnom', GetPageName());
$smarty->assign('rewrite', $config['rewrite']);

$smarty->display('templates/defaut/fichiers/menu.tpl');

?>