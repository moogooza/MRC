<?php
if($user['rang'] != 3)
{
	mysql_close();
	die('Il n\'y a rien pour toi ici..');
}

	if(!isset($_GET['action']))
	{

	$rang = array();
	
	$rang[0] = array(); // auditeur
	$rang[1] = array(); // auditeur fidèle
	$rang[2] = array(); // animateur
	$rang[3] = array(); // admin

	$rangname = array(
	
		'Auditeur',
		'Auditeur Fidèle',
		'Animateur',
		'Administrateur'
	);
	
	
	
	$sql = "SELECT * FROM radio_users ORDER BY username ASC";
	$req = mysql_query($sql) or die('ERREUR SQL - ' . $sql . ' - ' . mysql_error());
	
	while($data = mysql_fetch_assoc($req))
	{
		$rang[$data['rang']][] = '<tr>';
		
		if($data['avatar'] != "")	$rang[$data['rang']][] = '	<td><img alt="" style="width:20px;" src="'.$data['avatar'].'" /></td>';
		else						$rang[$data['rang']][] = '	<td><i class="icon-remove" ></i></td>';
		
		$rang[$data['rang']][] = '	<td>'.$data['username'].'</td>';
		// $rang[$data['rang']][] = '	<td>'.$rangname[$data['rang']].'</td>';
		$rang[$data['rang']][] = '	<td>'.$data['email'].'</td>';
		$rang[$data['rang']][] = '	<td>
		<a href="index.php?page=users&action=edit&id='.$data['id'].'" class="btn btn-inverse" ><i class="icon-pencil icon-white"></i> Éditer</a> ';
		
		if($data['ban'] == 0)	$rang[$data['rang']][] =  '<a href="index.php?page=users&action=ban&id='.$data['id'].'" class="btn btn-danger" ><i class="icon-off"></i> Bannir</a>';
		else					$rang[$data['rang']][] =  '<a href="index.php?page=users&action=unban&id='.$data['id'].'" class="btn btn-success" ><i class="icon-ok"></i> Débannir</a>';
		
		$rang[$data['rang']][] =  '</td>';
		
		$rang[$data['rang']][] = '</tr>';
		// echo '<tr>';
			// echo '<td>'.$data['username'].'</td>';
			
		// echo '</tr>';
	}
	
	for($x = 0; $x < sizeof($rang); $x++)
	{
		echo '<caption><b>'.$rangname[$x].'</b></caption>';
		echo '<table class="table table-striped" >';
		// echo $x;
		// echo $rang[$x];
		
		echo '<thead><tr>
			<th width="20%" >#</th>
			<th width="25%" >Nom</th>

			<th width="30%" >Email</th>
		</tr></thead>';
		// if(sizeof($rang[$x] == 0))
		
		$num = 0;
		for($i = 0; $i < sizeof($rang[$x]); $i++)
		{
			echo $rang[$x][$i];
			$num++;
			// echo $num++;
		}
		if($num == 0)
		{
			echo '<tr>
			<td><i class="icon-remove" ></i></td>
			<td><i class="icon-remove" ></i></td>
			<td><i class="icon-remove" ></i></td>
			<td><i class="icon-remove" ></i></td>
			<td><i class="icon-remove" ></i></td>
			</tr>';
		}
		
		echo '</table><br /><br />';
	}
	
	
	
	// echo '<pre>';
	// print_r($rang);
	// echo '</pre>';
	
	}
	else if($_GET['action'] == "ban" && is_numeric($_GET['id']))
	{
		$sql = "UPDATE radio_users SET ban = 1 WHERE id = " . $_GET['id'] . " LIMIT 1";
		
			mysql_query($sql) or die('ERREUR SQL ' . $sql . ' - ' . mysql_error() );
		
			echo '<center><a class="btn btn-danger" href="index.php?page=users" >Retour</a></center>';
	}
	else if($_GET['action'] == "unban" && is_numeric($_GET['id']))
	{
			$sql = "UPDATE radio_users SET ban = 0 WHERE id = " . $_GET['id'] . " LIMIT 1";
		
			mysql_query($sql) or die('ERREUR SQL ' . $sql . ' - ' . mysql_error() );
		
			echo '<center><a class="btn btn-danger" href="index.php?page=users" >Retour</a></center>';
	}
	else if($_GET['action'] == "edit" && is_numeric($_GET['id']))
	{
	
		if(isset($_POST['username']))
		{
				foreach($_POST as $name => $value)
				{
					$_POST[$name] = mysql_escape_string($_POST[$name]);
				}
			
				$sql_add = "";
			
				if($_POST['password'] != "")
				{
					$sql_add = ", password = '".md5($_POST['password'])."'";
				}
			
				$sql = "UPDATE radio_users SET 
				username = '".$_POST['username']."', 
				email = '".$_POST['email']."', 
				avatar = '".$_POST['avatar']."', 
				description = '".$_POST['description']."', 
				rang = '".$_POST['rang']."'  
				".$sql_add." 
				WHERE id = ".$_GET['id']." LIMIT 1";
			
			
				mysql_query($sql) or die('ERREUR SQL ' . $sql . ' - ' . mysql_error() );
				echo '<center><div class="alert alert-success" >Les configurations ont été appliquées !</div><br><br>';
				echo '<a href="index.php?page=users" class="btn btn-success" >Accueil</a></center>';
		}
		else
		{
			$sql = "SELECT * FROM radio_users WHERE id = ".$_GET['id']." LIMIT 1";
			
			$req = mysql_query($sql) or die('ERREUR SQL ' . $sql . ' - ' . mysql_error() );
			
			echo '<form method="post" action="#" class="form-inline" >';
			
			while($data = mysql_fetch_assoc($req))
			{
				echo 'Pseudonyme : &nbsp;&nbsp;<input type="text" name="username" value="'.$data['username'].'" /><br /><br />';
				echo 'Mot de passe : &nbsp;&nbsp;<input type="password" name="password" /><br /><br />';
				echo 'Email : &nbsp;&nbsp;<input type="text" name="email" value="'.$data['email'].'" /><br /><br />';
				echo 'Avatar : &nbsp;&nbsp;<input type="text" name="avatar" value="'.$data['avatar'].'" /><br /><br />';
				echo 'Description : &nbsp;&nbsp;<input type="text" name="description" value="'.$data['description'].'" /><br /><br />';
			?>	
				
           		<label for="defilante">Rang : &nbsp;&nbsp;</label>
           	 	<label class="radio">
				<input type="radio" name="rang" id="optionsRadios1" value="0" <?php if($data['rang'] == '0'){ echo 'checked '; } ?>>
				Auditeur
				</label>
		 		&nbsp;&nbsp;
				<label class="radio">
				<input type="radio" name="rang" id="optionsRadios2" value="1" <?php if($data['rang'] == '1'){ echo 'checked '; } ?>>
				Auditeur Fidèle
				</label>
				&nbsp;&nbsp;
				<label class="radio">
				<input type="radio" name="rang" id="optionsRadios2" value="2" <?php if($data['rang'] == '2'){ echo 'checked '; } ?>>
				Animateur
				</label>
				&nbsp;&nbsp;
				<label class="radio">
				<input type="radio" name="rang" id="optionsRadios2" value="3" <?php if($data['rang'] == '3'){ echo 'checked '; } ?>>
				Administrateur
				</label>
			<?php	
			}
			
			echo '<br /><br /><a class="btn btn-danger" href="index.php?page=users" >Retour</a>&nbsp;&nbsp;&nbsp;<input type="submit" class="btn" /></form>';
		}
	}
?>

