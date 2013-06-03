{if $rewrite == '1'}
<ul id="navigation">
    <li><a href="{$www}accueil">ACCUEIL</a></li>
    <li><a style="cursor:pointer;" onclick="javascript:window.open('{$www}player/','webcam','width=815,height=390,left=50,top=50,scrollbars=0');">ECOUTER</a></li>
    <li><a href="{$www}communaute">SHOUTBOX</a></li>
    <li><a href="{$www}emissions">EMISSIONS</a></li>
    <li><a href="{$www}equipe">EQUIPE</a></li>
    <li><a href="{$www}replay">REPLAY</a></li>
</ul>
{else}
<ul id="navigation">
    <li><a href="{$www}">ACCUEIL</a></li>
    <li><a style="cursor:pointer;" onclick="javascript:window.open('{$www}player/','webcam','width=815,height=390,left=50,top=50,scrollbars=0');">ECOUTER</a></li>
    <li><a href="{$www}communaute.php">SHOUTBOX</a></li>
    <li><a href="{$www}emissions.php">EMISSIONS</a></li>
    <li><a href="{$www}equipe.php">EQUIPE</a></li>
    <li><a href="{$www}replay.php">REPLAY</a></li>        
</ul>
{/if}
       	
   