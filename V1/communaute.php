<?php
$page = "Communauté";
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
	if(isset($_POST['message']))
	{
		$pseudo= mysql_escape_string(htmlspecialchars(ucfirst($_SESSION['username'])));
		$message= mysql_escape_string(htmlspecialchars($_POST['message']));
		$time= time();
		$result= mysql_query("INSERT INTO radio_shout (pseudo,message,temps) VALUES ('$pseudo', '$message', '$time')");
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

$smarty = new Smarty();

$smarty->assign('www', $config['www']);
$smarty->assign('nomsite', $config['nom']);
$smarty->assign('nompage', $page);
$smarty->assign('defilante', $config['defilante']);
$smarty->assign('list', $list);
$smarty->assign('rewrite', $config['rewrite']);
include('basetpl.php');
$smarty->assign('list2', $list2);

$smarty->display('templates/defaut/communaute.tpl');
echo $copyright;
mysql_close();
?>