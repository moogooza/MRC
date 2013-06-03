{if isset($session)}

<div id="well"></div>
<div id="test">
<center>
{if $rewrite == '1'}
	Vous êtes connecté en tant que : <b>{$uusername|ucfirst}</b><br>
	{if $uvip == '1'}<span class="label label-success">Compte VIP</span>{else}<span class="label label-error">Compte non VIP</span> {/if} -
 	<a href="{$www}mon-compte">Mon compte</a> - 
 	<a href="{$www}profil/{$uid}-{$uusername}.html">Mon profil</a> - 
 	<a href="{$www}vip">VIP</a> 
 	{if $uvip == '1' && $defilante == '1'} - <a href="{$www}dediweb">Poster une DediWeb</a> {/if} -
 	<a href="{$www}dedicace">Poster une dédicace</a> - 
 	{if $urang >= '2'}<span class="label label-important"><a style="color:white;" href="{$www}admin">ADMIN</a></span> - {/if}
 	<a href="{$www}logout">D&eacute;connexion</a>
{else} 
	Vous êtes connecté en tant que : <b>{$uusername|ucfirst}</b><br />
	{if $uvip == '1'}<span class="label label-success">Compte VIP</span>{else}<span class="label label-error">Compte non VIP</span> {/if} -
	 <a href="{$www}mon-compte.php">Mon compte</a> - 
 	<a href="{$www}profil/{$uid}-{$uusername}.html">Mon profil</a> - 
 	<a href="{$www}vip.php">VIP</a> 
 	{if $uvip == '1' && $defilante == '1'}  - <a href="{$www}defilante.php">Poster une DediWeb</a> {/if} -
 	<a href="{$www}dedicace.php">Poster une dédicace</a>
 	{if $urang >= '2'}<span class="label label-important"><a style="color:white;" href="{$www}admin">ADMIN</a></span> - {/if}
 	<a href="{$www}logout.php">D&eacute;connexion</a>
{/if}
</center>
</div>
 
{else}
	
	{if $rewrite == '1'}
 		<div id="well"><center><a href="{$www}connexion">Connexion</a> - <a href="{$www}inscription">Inscription</a></center></div>
 	{else}
 		<div id="well"><center><a href="{$www}connexion.php">Connexion</a> - <a href="{$www}inscription.php">Inscription</a></center></div>
 	{/if}
	
{/if}
