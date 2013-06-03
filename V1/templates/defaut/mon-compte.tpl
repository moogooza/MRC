{include file='templates/defaut/header.tpl'}
{include file='templates/defaut/fichiers/sous-header.tpl'}
 <div id="contenuhaut"></div>
    <div id="contenucentre">

<div class="gauche">
            		<div class="titregauche">Mon compte</div>
                	<div class="contenugauche">
                	<br>
           		   <table width="900" border="0">
                      <td align="center">
                     

{if isset($session)}

	{if isset($postinfo)}
		<div class="alert alert-success" >Vos informations ont bien été changées</div><br />
	{/if}

<form method="post" action="#" class="form-inline" >

{foreach from=$list3 item=row3}
		
		Email <input type="text" name="email" value="{$row3.email}" /><br /><br />
		Avatar <input type="text" name="avatar" value="{$row3.avatar}" /><br /><br />
		Age <input type="text" name="age" value="{$row3.age}" /><br /><br />
		<label class="radio">
		<input type="radio" name="sexe" id="optionsRadios1" value="homme" {if $row3.sexe == 'homme'}checked{/if}>
		Homme
		</label>
		<label class="radio">
		<input type="radio" name="sexe" id="optionsRadios2" value="femme" {if $row3.sexe == 'femme'}checked{/if}>
		Femme
		</label><br /><br />
		Profession <input type="text" name="profession" value="{$row3.profession}" /><br /><br />
		Description (MAX: 120 caractères)<br /><textarea maxlength="120" name="description" >{$row3.description}</textarea>
{/foreach}
	<br />
	<input type="hidden" name="info" />
	<br />
	<input type="submit" class="btn" value="Enregistrer mon profil" />
</form>

<br />

<hr />

<br />
{if isset($postmdp)}
	{if isset($pass2)}
		<div class="alert alert-success" >Le mot de passé a été changé</div><br />
	{else}
		<div class="alert alert-error" >Le mot de passe est vide </div><br />
	{/if}
{/if}
	
<form method="post" action="#" >

	<label for="pass2" >Nouveau mot de passe</label> <input type="password" name="pass2" required /><br />
	<input type="hidden" name="new_mdp" />
	<input type="submit" class="btn" value="Changer mon mot de passe" />
</form>

{else}

<br><br>
<div class="alert alert-error" style="max-width: 700px;">
<h4 class="alert-heading">Information :</h4> Vous devez etre connect&eacute; pour acc&eacute;der &agrave; cette page.
</div>
<br><br><br>

{/if}

</td>
                    
                      
                    </table>

                   
                   
                    </div></div> 
                    
                      	
        	    </div>
   <div id="contenubas"></div> 
   <div id="footer">
{include file='templates/defaut/footer.tpl'}