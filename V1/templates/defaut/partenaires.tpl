{include file='templates/defaut/header.tpl'}
{include file='templates/defaut/fichiers/sous-header.tpl'}
 <div id="contenuhaut"></div>
    <div id="contenucentre">

<div class="gauche">
	<div class="titregauche">Nos partenaires</div>
    <div class="contenugauche">
    <br>
		<table width="900" border="0">
			<td align="center">
				<br><br><br>
				
{foreach from=$list3 item=row3}

<div class="well2" style="max-width: 640px;">
<font size="6">{$row3.nom}</font><br>
<a href="{$row3.ref}"><img src="{$row3.img}" /></a><br>
</div><br><br>
{/foreach}

				
				<br><br><br>
				
			</td>            
        </table>               
	</div>
	</div>                       	
</div>
   <div id="contenubas"></div> 
   <div id="footer">
{include file='templates/defaut/footer.tpl'}