{include file='templates/defaut/header.tpl'}
{include file='templates/defaut/fichiers/sous-header.tpl'}
 <div id="contenuhaut"></div>
    <div id="contenucentre">
<div class="gauche">

{if isset($getid)}

	{$getid = $getid|mysql_real_escape_string|htmlspecialchars}

		{foreach from=$list3 item=row3}
   
   <div class="titregauche">Profil de {$row3.username}</div>
                	<div class="contenugauche">
                	<br>
           		   <table width="890" border="0">
                      

<br><br>

<div class="span4 well2" style="margin-left: 270px;">
	<div class="row">
		<div class="span1"><a href="#" class="thumbnail"><img src="{$row3.avatar}" alt=""></a></div>
		<div class="span3">
			<p>
			{if $row3.rang >= '2'}
			<font color="red"><b>Staff</b></font> {$nomsite}
			{elseif $row3.rang == '1'}
			<font color="orange"><b>Auditeur fidèle</b></font> {$nomsite}
			{else}
			<font color="blue"><b>Auditeur</b></font> {$nomsite}
			{/if}
			</p>
          	<p><strong> {if $row3.sexe == "homme"}<img src="{$www}images/homme.png" title="Homme"/>{else}<img src="{$www}images/femme.png" title="Femme"/>{/if}
          	&nbsp;{$row3.username|ucfirst}</strong></p>
			{if $row3.vip == '1'}
			<span class=" badge badge-success"><img src="{$www}images/star.png" width="10" height="10" /> Compte VIP</span>
			{else}
			 <span class=" badge badge-error">Non VIP</span>
			 {/if}
			 
		</div>
	</div>
</div>

</table>

<table width="890" align="center" border="0">
{if isset($session)}
<div class="well2" style="width: 600px; margin-left: 125px;">

<center><font size="6"><b><span style="color: #007711; text-shadow: 3px 3px 8px #007711;">MON PROFIL</span></b></font></center><br>
<b>Mon âge : </b><br>
<i>J'ai {$row3.age} ans !!</i>
<br><br>
<b>Ma situation amoureuse :</b> <br>
<i>Je suis {$row3.situation}. </i>
{if $row3.situation == 'en couple'}<img src='{$www}images/couple.gif'/>{else}<img src='{$www}images/celib.gif'/>{/if}
<br><br>
<b>Ma profession : </b><br>
{if $row3.profession == 'NULL'} 
<i>Je suis auditeur et je fais rien d'autre !</i>
{else}
<i>Je suis {$row3.profession}.</i>
{/if}
<br><br>
<b>Ma petite description : </b><br>
{if $row3.description == ''}
<i>Salut à tous moi c'est {$row3.username|ucfirst}.<br>Je me suis inscrit sur {$nomsite} comme vous !! <br> A bientôt sur le forum <3 </i>
{if $row3.username == $uusername}
<br><br><font size='1'> ==> Ceci est une présentation automatique. <br> ==> Vous pouvez la changer depuis la rubrique <b>Mon Compte</b>.<br> ==> Message visible uniquement par vous.</font>
{/if}
{else}

<i> {$row3.description} </i>

{/if}

</div>

{else}
<td align="center">
<div class="alert alert-alert" style="width: 500px;">
<h4 class="alert-heading">Information :</h4> Vous devez être connecté pour voir plus d'informations ! <br><a href="{$www}connexion{if $rewrite == '0'}.php{/if}">Connexion</a></td>
</div>

{/if}                     
                    
                      
                    </table>
                   
                   
                    </div></div> 
{/foreach}					
{else} 

<div class="titregauche">Erreur</div>
                	<div class="contenugauche">
                	<br>
           		   <table width="900" border="0">
                      <td align="center">

<br><br>

<div class="alert alert-error" style="max-width: 700px;">
  
  <h4>Information</h4>
  Accès a cette page interdit ! <br><a href="{$www}{if $rewrite == '1'}accueil{else}index.php{/if}">Accueil</a>
</div>

  <br><br><br>                    </td>
                    
                      
                    </table>

                   
                   
                    </div></div>  
  
{/if}
  
            		
                      	
        	    </div>
   <div id="contenubas"></div> 
   <div id="footer">
{include file='templates/defaut/footer.tpl'}