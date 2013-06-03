<?php
$page = "Inscription";
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

require('libs/SmartyBC.class.php');

$copyright = 'Powered by MyRadioCMS - Copyright &copy; 2013 <a href="http://myradiocms.com">www.myradiocms.com</a>
</div>
</div>
</body>
</html>';

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


if(isset($_POST['insc']))
	{
			$identifiant = mysql_escape_string(htmlspecialchars($_POST['username']));
			$email = mysql_escape_string(htmlspecialchars($_POST['mail']));
	
		$sql1234 = "SELECT * FROM radio_users WHERE username = '" . $identifiant . "'";
		$result1234 = mysql_query($sql1234) or die('erreur sql');
		$row1234 = mysql_fetch_assoc($result1234);
		if(mysql_num_rows($result1234) or $identifiant == NULL or $email == NULL or $_POST['password'] == NULL )
		{
			header('Location: inscription.php?pb=erreur');
		}
		else
		{
			$identifiant = mysql_escape_string(htmlspecialchars($_POST['username']));
			$email = mysql_escape_string(htmlspecialchars($_POST['mail']));
			
			$sql = "INSERT INTO radio_users (username, password, email) VALUES ('".$identifiant."', '".md5($_POST['password'])."', '".$email."')";
			$req = mysql_query($sql);
			
			header('Location: connexion.php');
		}
	}


$smarty = new SmartyBC();

$smarty->assign('www', $config['www']);
$smarty->assign('nomsite', $config['nom']);
$smarty->assign('nompage', $page);
$smarty->assign('defilante', $config['defilante']);
$smarty->assign('list', $list);
$smarty->assign('rewrite', $config['rewrite']);
include('basetpl.php');
$smarty->assign('list2', $list2);
$smarty->assign('pb', $_GET['pb']);

$smarty->display('templates/defaut/inscription.tpl');
echo $copyright;
mysql_close();
?>