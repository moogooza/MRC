<?php
$page = "Équipe";
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
$news = mysql_query('SELECT * FROM radio_news ORDER BY stamp DESC LIMIT 3');
while ($row3 = mysql_fetch_assoc($news)) {
    $list3[]=$row3;
}

$list4=array();
$equipeadmin = mysql_query('SELECT * FROM radio_equipe WHERE rrang = \'Admin\' ORDER BY pseudo');
while ($row4 = mysql_fetch_assoc($equipeadmin)) {
    $list4[]=$row4;
}

$list5=array();
$equipeanim = mysql_query('SELECT * FROM radio_equipe WHERE rrang = \'Anim\' ORDER BY pseudo');
while ($row5 = mysql_fetch_assoc($equipeanim)) {
    $list5[]=$row5;
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
$smarty->assign('list4', $list4);
$smarty->assign('list5', $list5);

$smarty->display('templates/defaut/equipe.tpl');
echo $copyright;
mysql_close();
?>