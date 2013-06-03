{include file='templates/defaut/header.tpl'}
{include file='templates/defaut/fichiers/sous-header.tpl'}
 <div id="contenuhaut"></div>
    <div id="contenucentre">


            		<div class="titregauche">Envoyer une dédicace</div>
                	<div class="contenugauche">
                	<br>
           		   <table width="900" border="0">
 
                     <td align="center">
					 
{if isset($session)}

	{if $postmess}
	<br><br> <div class="alert alert-success">Votre message a été envoyé ! Un animateur va bientôt le lire !!</div>
	{/if}
	
		<br />
		<div class="alert alert-info">Pas besoin d'être VIP pour envoyer un message a nos animateur ! Profitez-en.</div>
		<br /><br />
		<form action="#" method="post" >
		<div class="control-group error">
		Dédicace : <textarea name="message"  rows="3"></textarea>
		</div>
		<input class="btn btn-error" type="submit" value="Envoyer" />
		</form>

{else}		
		
<br><br>
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