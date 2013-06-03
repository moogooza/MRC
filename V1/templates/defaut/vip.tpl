{include file='templates/defaut/header.tpl'}
{include file='templates/defaut/fichiers/sous-header.tpl'}
 <div id="contenuhaut"></div>
    <div id="contenucentre">

<!-- <div class="gauche"> -->
            		<div class="titregauche">Espace VIP</div>
                	<div class="contenugauche">
                	<br>
           		   <table width="900" border="0">
                      <td align="center">


{if isset($session)}

	{if $getp == 'ok'}
	<div class="alert alert-success" style="max-width: 700px;">
	<b>Information : </b> La transaction a été réalisée avec succès.
	</div>
	{/if}
	
	{if $getp == 'erreur'}
	<div class="alert alert-error" style="max-width: 700px;">
	<b>Information : </b> La transaction a échoué.
	</div>
	{/if}


	{if $uvip == '1'}

		<div class="alert alert-info" style="max-width: 700px;">
		<h4 class="alert-heading">Information :</h4> 
		Votre compte VIP est actif. Vous pouvez le renouveler avant la date d'échéance.<br />
		Vous ne perdez pas de jours VIP à renouveler avant l'expiration. Les durées se cumulent. <br />
		Votre abonnement prendra fin le : <b>{$fin_vip_date} à {$fin_vip_heure}</b> !
		</div>
		<br /><br />

	{else}

		<div class="alert alert-info" style="max-width: 700px;">
		<h4 class="alert-heading">Information :</h4>
		Vous n'êtes pas encore VIP !!! Qu'attendez-vous ? <b>C'est automatique !</b><br />

		</div>
		<br />


<br /><br />
	{/if}
	
<div class="well2" style="max-width: 400px;"><img src="images/star.png"/> <font size="5"><b>AVANTAGES VIP</b></font><br /><br />
<font color="green">&#10004;</font> Passage en priorité en LIVE
<br />
<font color="green">&#10004;</font> Demande de musique
<br />
<font color="green">&#10004;</font> Dédicaces sur le site
</div>
<br><br><br>
<center><div id="starpass_{$idd}"></div>
<script type="text/javascript" src="http://script.starpass.fr/script.php?idd={$idd}&amp;verif_en_php=1&amp;datas=&amp;theme=white_grey_small">
</script>
<noscript>Veuillez activer le Javascript de votre navigateur s'il vous pla&icirc;t.<br />
<a href="http://www.starpass.fr/">Micro Paiement StarPass</a>
</noscript></center>
{else}
<br><br>
<div class="alert alert-error" style="max-width: 700px;">
<h4 class="alert-heading">Information :</h4> Vous devez etre connect&eacute; pour acc&eacute;der &agrave; cette page.
</div>
<br><br><br>
{/if}
                      </td>
                    
                      
                    </table>

                   
                   
                    </div>
<!-- </div> -->
                    
                      	
        	    </div>
   <div id="contenubas"></div> 
   <div id="footer">
{include file='templates/defaut/footer.tpl'}