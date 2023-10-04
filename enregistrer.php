 <!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8"/>
      <meta name="viewport" content="width=device-width"/>
      <link rel="stylesheet" type="text/css"  href="style.css"/>
      <link rel="shortcut icon" type="image/x-icon" href="images\logo-esiac3.png" />
      <title accesskey="">G*E*T</title>
   </head>
   <body>
      <div id="header">
              <a href="#"><img src="images\titre_1.png" id=""></a>
           </div>
<?php

	
	$pdo = new PDO('mysql:host=localhost; dbname=projet', 'root','');
	$id=$_GET['ID'];
	$idM=$_GET['ID2'];

	$sql= "SELECT * FROM enseignants WHERE  ID_ENSEIGNANT = '$id'";
	$result= $pdo->prepare($sql);
	$result->execute();
	$liste= $result->fetchAll();

	$sql2= "SELECT * FROM  matieres  WHERE  ID_MATIERE = '$idM'";
	$result2= $pdo->prepare($sql2);
	$result2->execute(); 
	$liste2= $result2->fetchAll();
		?>
		<h2><i>Enseignant</i></h2>
		<form method="POST" action="modif.php">
			<center>
			<table border="0">
				<tr>
					<td >
						<center><label></label></center>
					</td>
					<td bgcolor="#109243" id="text">
						<center><label>NOM </label></center>
					</td>
					<td>
						<center><label>MATRICULE </label></center>
					</td>
					<td bgcolor="#109243" id="text">
						<center><label>SEXE </label></center>
					</td>
					
				</tr>
				<?php foreach($liste as $ens): ?>
				<tr>
					<td>
						<center><input type="hidden" name="id" value="<?= $ens['ID_ENSEIGNANT'] ?>"></center>
					</td>
					<td>
						<center><input type="text" name="nom" value="<?= $ens['NOM_ENS'] ?>"></center>
					</td>
					<td>
						<center><input type="text" name="matricule" value="<?= $ens['MATRICULE_ENS'] ?>"></center>
					</td>
					<td>
						<center><input type="text" name="sexe" value="<?= $ens['SEXE_ENS'] ?>"></center>
					</td>
					<td>
						<button name="submit">Enregistrer</button>
					</td>
				</tr>
			<?php endforeach; ?>
			</table>	
			</center>
		</form>

		<h2><i>Matiere(s)</i></h2>
		<form method="POST" action="modif.php">
			<center>
			<table border="0">
				<tr>
					<td id="text">
						<center><label></label></center>
					</td>
					<td>
						<center><label>INTITULLE</label></center>
					</td>
					<td bgcolor="#109243" id="text">
						<center><label>CODE</label></center>
					</td>
					<td>
						<center><label>CREDITS</label></center>
					</td>
				</tr>
				<?php foreach($liste2 as $ens2): ?>
				<tr>
					<td>
						<center><input type="hidden" name="idM" value="<?= $ens2['ID_MATIERE'] ?>"></center>
					</td>
					<td>
						<center><input type="text" name="nomM" value="<?= $ens2['NOM_MATIERE'] ?>"></center>
					</td>
					<td>
						<center><input type="text" name="codeM" value="<?= $ens2['CODE_MATIERE'] ?>"></center>
					</td>
					<td>
						<center><input type="text" name="creditM" value="<?= $ens2['CREDIT_MATIERE'] ?>"></center>
					</td>
					<td>
						<button name="submit2">Enregistrer</button>
					</td>
				</tr>
			<?php endforeach; ?>
			</table>	
			</center>
		</form>
          <br>
           <br>
           <br>
           <br>
           <h5>Copyright &copy; Martial 2021</h5>
    </body>
 </html>