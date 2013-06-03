<?php
$page = "Dédicace";
include('global.php');

if(isset($_SESSION['username']))
{
	if($user['ban'] == 1)
	{
		mysql_close();
		die('Vous avez &eacute;t&eacute; banni');
	}
	if($date >= $user['fin_vip']) 
	{
		$pts = "UPDATE radio_users SET debut_vip = '".$config['reset']."' WHERE id = '".$user['id']."'";
		$pts0 = "UPDATE radio_users SET fin_vip = '".$config['reset']."' WHERE id = '".$user['id']."'";
		$pts1 = "UPDATE radio_users SET vip = 0 WHERE id = '".$user['id']."'";
		$action = mysql_query($pts);
		$action0 = mysql_query($pts0);
		$action1 = mysql_query($pts1);
	}
}

require('libs/Smarty.class.php');

$copyright = 'Powered by MyRadioCMS - Copyright &copy; 2013 <a href="http://myradiocms.com">www.myradiocms.com</a>
</div>
</div>
</body>
</html>';

if(isset($_SESSION['username']))
{
	if(isset($_POST['info']))
	{
		$sql = "UPDATE radio_users 
		SET email = '".mysql_escape_string(htmlspecialchars($_POST['email']))."', avatar = '".mysql_escape_string(htmlspecialchars($_POST['avatar']))."', 
		age = ".(is_numeric($_POST['age']) ? $_POST['age'] : 'age').", sexe = '".mysql_escape_string(htmlspecialchars($_POST['sexe']))."', 
		profession = '".mysql_escape_string(htmlspecialchars($_POST['profession']))."', description = '".mysql_escape_string(htmlspecialchars($_POST['description']))."' 
		WHERE id = ".$_SESSION['userid']." 
		LIMIT 1";
		mysql_query($sql) or die('Erreur SQL: ' . mysql_error() );
		
	}
}

if(isset($_POST['new_mdp']))
	{
		if(isset($_POST['pass2']))
		{
			$sql = "UPDATE radio_users SET password = '".md5(mysql_escape_string($_POST['pass2']))."' WHERE id = ".$_SESSION['userid']." LIMIT 1";
			mysql_query($sql) or die('Erreur SQL: ' . mysql_error() );	
		}
	}
$list=array();
$affdedi = mysql_query('SELECT * FROM radio_defilante ORDER BY id DESC LIMIT 0, 15');
while ($row = mysql_fetch_assoc($affdedi)) {
    $list[]=$row;
}

$list2=array();
$linkfooter = mysql_query('SELECT * FROM radio_footer ORDER BY ordre ASC');
while ($row2 = mysql_fetch_assoc($linkfooter)) {
    $list2[]=$row2;
}

$list3=array();
$infoscompte = mysql_query('SELECT * FROM radio_users WHERE id = '.$_SESSION['userid'].' LIMIT 1');
while ($row3 = mysql_fetch_assoc($infoscompte)) {
    $list3[]=$row3;
}

$smarty = new Smarty();

$smarty->assign('www', $config['www']);
$smarty->assign('nomsite', $config['nom']);
$smarty->assign('nompage', $page);
$smarty->assign('defilante', $config['defilante']);
$smarty->assign('list', $list);
$smarty->assign('rewrite', $config['rewrite']);
include('basetpl.php');
$smarty->assign('list2', $list2);
$smarty->assign('list3', $list3);
$smarty->assign('postmdp', $_POST['new_mdp']);
$smarty->assign('pass2', $_POST['pass2']);
$smarty->assign('postinfo', $_POST['info']);

$smarty->display('templates/defaut/mon-compte.tpl');
echo $copyright;
mysql_close();
?>