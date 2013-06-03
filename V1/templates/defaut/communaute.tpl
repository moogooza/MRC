{include file='templates/defaut/header.tpl'}
{include file='templates/defaut/fichiers/sous-header.tpl'}
 <div id="contenuhaut"></div>
    <div id="contenucentre">


	<div class="titregauche">Page communautaire</div>
    <div class="contenugauche">
    <br>
		<table width="900" border="0">
			<td align="center">
			
{if isset($session)}

<div class="well" style="max-width: 600px;">
	<div class="well2" style="max-width: 1200px;"><div id="musique"></div></div>
	<form action="#musique" method="post">
		Message:
		<input type="text" name="message" size=30 maxlength='100' required /><br/>
		<input class="btn" type="submit" value="Shout !" />
	</form>
</div>

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
	</div>                       	

   <div id="contenubas"></div> 
   <div id="footer">
{include file='templates/defaut/footer.tpl'}