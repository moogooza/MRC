<?php
if($user['rang'] != 3)
{
	mysql_close();
	die('Il n\'y a rien pour toi ici..');
}                      
	if(isset($_POST['conf']))
	{
		
			$sql = "UPDATE radio_config 
			SET nom = '".mysql_escape_string($_POST['nom'])."', www = '".mysql_escape_string($_POST['www'])."', 
			path = '".mysql_escape_string($_POST['path'])."', defilante = '".mysql_escape_string($_POST['defilante'])."', 
			rewrite = '".mysql_escape_string($_POST['rewrite'])."', rnuid = '".mysql_escape_string($_POST['uid'])."', 
			rnapikey = '".mysql_escape_string($_POST['apikey'])."', rnplay = '".mysql_escape_string($_POST['play'])."', 
			idd = '".mysql_escape_string($_POST['idd'])."', idp = '".mysql_escape_string($_POST['idp'])."', 
			licence = '".mysql_escape_string($_POST['licence'])."'  
			LIMIT 1";
			mysql_query($sql) or die('Erreur SQL: ' . mysql_error() );
				
			?>
			<div class="alert alert-success" >Les configurations ont été appliquées !</div>
	
			<?
		
	}

	$sql = "SELECT * FROM radio_config";
	$req = mysql_query($sql) or die('Erreur SQL: ' . mysql_error() );
	
	while($data = mysql_fetch_assoc($req))
	{
	?>
<p><form method="post" action="#" class="form-inline" >
        
        <div class="center">
            <label for="nom">Nom du site : &nbsp;&nbsp;</label><input type="text" name="nom" id="nom" value="<?php echo $data['nom']; ?>" required /><br /><br>
            <label for="www">Url du site : &nbsp;&nbsp;</label><input type="text" name="www" id="www" value="<?php echo $data['www']; ?>" required /><br /><br>
            <label for="path">Chemin du script : &nbsp;&nbsp;</label><input type="text" name="path" id="path" value="<?php echo $data['path']; ?>" required /><br /><br>
            <label for="defilante">Défilante en haut du site : &nbsp;&nbsp;</label>
            <label class="radio">
		<input type="radio" name="defilante" id="optionsRadios1" value="1" <?php if($data['defilante'] == '1'){ echo 'checked '; } ?>>
		Oui
		</label>
		 &nbsp;&nbsp;
		<label class="radio">
		<input type="radio" name="defilante" id="optionsRadios2" value="0" <?php if($data['defilante'] == '0'){ echo 'checked '; } ?>>
		Non
		</label>
           <br><br>
           <label for="defilante">Url Rewrite* : &nbsp;&nbsp;</label>
            <label class="radio">
		<input type="radio" name="rewrite" id="optionsRadios1" value="1" <?php if($data['rewrite'] == '1'){ echo 'checked '; } ?>>
		Oui
		</label>
		 &nbsp;&nbsp;
		<label class="radio">
		<input type="radio" name="rewrite" id="optionsRadios2" value="0" <?php if($data['rewrite'] == '0'){ echo 'checked '; } ?>>
		Non
		</label><br /><br />
		<label for="uid">Radionomy Radio UID : &nbsp;&nbsp;</label><input type="text" name="uid" id="uid" value="<?php echo $data['rnuid']; ?>" required /><br /><br>	
		<label for="apikey">Radionomy Api Key : &nbsp;&nbsp;</label><input type="text" name="apikey" id="apikey" value="<?php echo $data['rnapikey']; ?>" required /><br /><br>
		<label for="play">Radionomy listen Stream : &nbsp;&nbsp;</label><input type="text" name="play" id="play" value="<?php echo $data['rnplay']; ?>" required /><br /><br>
		<label for="idd">IDD Starpass : &nbsp;&nbsp;</label><input type="text" name="idd" id="idd" value="<?php echo $data['idd']; ?>" required /><br /><br>
		<label for="idp">IDP Starpass : &nbsp;&nbsp;</label><input type="text" name="idp" id="idp" value="<?php echo $data['idp']; ?>" required /><br /><br>
		<label for="licence">Licence MyRadioCMS : &nbsp;&nbsp;</label><input type="text" name="licence" id="licence" value="<?php echo $data['licence']; ?>" required /><br /><br>
		
			
         <input type="hidden" name="conf" /><br />
            <button class="btn btn-success" type="submit" value="Envoyer">Enregistrer</button>
        </div>
    </form>
    <hr />
   	* L'URL rewrite permet de réécrire les adresses de votre site.<br>&nbsp; <b>Exemple :</b> www.exemple.com/replay.php <b>devient</b> www.exemple.com/replay
   
    </p>
    
    <?php
   	}

?>