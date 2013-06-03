<?php
if(isset($_SESSION['username']))
{
	$smarty->assign('session', $_SESSION['username']);
	$smarty->assign('urang', $user['rang']);
	$smarty->assign('uvip', $user['vip']);
	$smarty->assign('uid', $user['id']);
	$smarty->assign('uusername', $user['username']);
}
?>