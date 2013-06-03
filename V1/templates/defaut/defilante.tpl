{include file='templates/defaut/header.tpl'}
{include file='templates/defaut/fichiers/sous-header.tpl'}
 <div id="contenuhaut"></div>
    <div id="contenucentre">


            		<div class="titregauche">Ajouter un message</div>
                	<div class="contenugauche">
                	<br />
           		   <table width="900" border="0">
                      <td align="center">

{if isset($session)}
	{if $defilante == '1'}
		{if $uvip == '1'}

<br /><br />
{if isset($postdefilante)}
	{if isset($postmessage)}
		<div class="alert alert-success">Votre défilante a bien été postée !</div>
	{/if}
{/if}
<div class="alert alert-block" style="max-width: 700px;">
  <h4>Attention :</h4>
  Tout abus sera sanctionné par un bannissement permanent du site de la radio !<br />
  La pub est interdite, les insultes interdites.
</div>
<br /><br />
<form action="#" method="post">
<div class="control-group error">
Message : <textarea name="message"  rows="3"></textarea>
<input type="hidden" name="defilante" />
</div>
<input class="btn btn-error" type="submit" value="Envoyer" />
</form>

{else}

<br /><br />
<div class="alert alert-error" style="max-width: 700px;">
<h4 class="alert-heading">Information :</h4> Vous devez être VIP pour pouvoir publier une défilante (message en haut du site) !!
</div>
<br /><br />
<div class="alert alert-info" style="max-width: 700px;">
<h4 class="alert-heading">Information :</h4> Vous n'êtes pas encore VIP !!! Qu'attendez-vous ? <b>C'est automatique !</b>
</div>
<br /><br /><center>Pour découvrir tous les avantages du VIP, cliquez <a href="{$www}vip{if $rewrite == '0'}.php{/if}">ici</a> !<br />Pour seulement 1 allopass !</center>
<br /><br />
{/if}
{else}
<br /><br />
<div class="alert alert-block" style="max-width: 700px;">
  <h4>Attention :</h4>
  L'administrateur du site a décidé de désactiver le module de dédicaces défilantes !<br />
  Il est donc impossible d'en poster.
</div>
<br /><br />
{/if}
{else}
<br /><br />
<div class="alert alert-error" style="max-width: 700px;">
<h4 class="alert-heading">Information :</h4> Vous devez etre connect&eacute; pour acc&eacute;der &agrave; cette page.
</div>
<br /><br /><br />

{/if}

</td>
                    
                      
                    </table>

                   
                   
                    </div></div> 
                    
                      	
        	    
   <div id="contenubas"></div> 
   <div id="footer">
{include file='templates/defaut/footer.tpl'}
