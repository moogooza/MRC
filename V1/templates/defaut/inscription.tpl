{include file='templates/defaut/header.tpl'}
{include file='templates/defaut/fichiers/sous-header.tpl'}
 <div id="contenuhaut"></div>
    <div id="contenucentre">
    <br />
<br />
<br />
<br />
<br />

		<center>
				
				<div class="well2" style="width:500px;">
				
				{if $pb == 'erreur'}
				<div class="alert alert-error" style="max-width: 300px;">Erreur durant l'inscription !</div>
				<br /><br />
				{/if}
				
			
			<form class="form-horizontal" method="post" action="#" >
				<div class="control-group">
					<label class="control-label" for="username">Nom d'utilisateur</label>
					<div class="controls">
						<input type="text" name="username" placeholder="Username" required>
					</div>
				</div>
				
				<div class="control-group">
					<label class="control-label" for="mail">Email</label>
					<div class="controls">
						<input type="text" name="mail" placeholder="Email" required>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="password">Mot de Passe</label>
					<div class="controls">
						<input type="password" name="password" placeholder="Password" required>
					</div>
				</div>
				<input type="hidden" name="insc" />
						<button type="submit" class="btn">Valider</button>
					

			</form>
		</div>	
		</center>
		

</div>
<div id="contenubas"></div>
   <div id="footer">
{include file='templates/defaut/footer.tpl'}