{include file='templates/defaut/header.tpl'}
{include file='templates/defaut/fichiers/sous-header.tpl'}
 <div id="contenuhaut"></div>
    <div id="contenucentre">
<div class="titregauche">Page de connexion</div>
                	<div class="contenugauche">
                	<br>
           		   <table width="900" border="0">
                      <td align="center">

{if isset($session)}

<div class="alert alert-error" >Vous êtes déjà connecté !</div>
{else}
	
		{if $pb == 'erreur'}
		<div class="alert alert-arror" >Mauvais identifiant !<br /></div>
		{/if}
		<br><br>
		<div class="alert alert-info" style="max-width: 700px"><b>Pas encore inscrit ?</b> Inscrivez-vous gratuitement &nbsp;&nbsp;<a href="inscription.php"class="btn btn-success">en cliquant ici</a></div><br><br>
		
		    <form method="post" action="#" class="form-horizontal"  >
									<div class="input-prepend">
  					<span class="add-on"><i class="icon-user"></i></span>
					<input type="text" name="login" placeholder="Identifiant" required />
					
				</div>
				<br><br>
					<div class="input-prepend">
  					<span class="add-on"><i class="icon-lock"></i></span>
					<input type="password" name="pass" placeholder="Mot de passe" required />
					
				</div>
				<br><br><br>
					<input type="submit" class="btn" />
					
				<input type="hidden" name="co" />
			</form>
	
			
{/if}    	
</td>
                    
                      
                    </table>

                   
                   
                    </div></div> 
                    
                      	
        	    
   <div id="contenubas"></div> 
   <div id="footer">
{include file='templates/defaut/footer.tpl'}