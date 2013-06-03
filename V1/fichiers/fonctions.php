<?
function GetPageName()
{
	$webpage = basename($_SERVER['PHP_SELF']);
	return $webpage;
}

$rewrite = $config['rewrite'];

?>