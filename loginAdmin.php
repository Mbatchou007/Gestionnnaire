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
if (isset($_POST['submit'])) {
	$nom= $_POST['UserAdmin'];
	$password= $_POST['Password'];
	$pdo = new PDO('mysql:host=localhost; dbname=projet', 'root','');

	$sql= "SELECT * FROM admins WHERE  MATRICULE_ADMIN = '$password' AND NOM_ADMIN= '$nom' ";
	$result= $pdo->prepare($sql);
	$result->execute();

	if ($result->rowcount() > 0) {
		?>
		<h1><i>Bonjour <?php echo ($nom); ?></i></h1>
		<?php
		$sql1= "SELECT E.NOM_ENS, E.MATRICULE_ENS, E.ID_ENSEIGNANT, M.NOM_MATIERE, M.CODE_MATIERE, M.CREDIT_MATIERE, M.ID_MATIERE, P.JOURS, P.HEURE_DEBUT, P.HEURE_FIN, S.CODE_SALLE, S.TYPE_SALLE FROM matieres M, enseignants E, matierenseignant ME, programmes P, salles S WHERE M.ID_MATIERE = ME.ID_MATIERE AND E.ID_ENSEIGNANT = ME.ID_ENS AND P.ID_MATIERE = ME.ID_MATIERE AND S.ID_SALLE = P.ID_SALLE";
		$result1=$pdo->prepare($sql1);
		$ok=$result1->execute();
		$liste= $result1->fetchAll();
		?>
		<h3><i>Programmation des Enseignants</i></h3>
		<form method="POST" action="enregistrer.php">
			<center>
			<table border="0">
				<tr>
					<td bgcolor="#109243">
						<center><label id="text">NOM </label></center>
					</td>
					<td bgcolor="A0A0A0">
						<center><label id="text">MATRICULE </label></center>
					</td>
					<td bgcolor="#109243">
						<center><label id="text">MATIERE </label></center>
					</td>
					<td bgcolor="A0A0A0">
						<center><label id="text">CODE DE LA MATIERE</label></center>
					</td>
					<td bgcolor="#109243">
						<center><label id="text">JOURS</label></center>
					</td>
					<td bgcolor="A0A0A0">
						<center><label id="text">HEURE DE DEBUT</label></center>
					</td>
					<td bgcolor="#109243">
						<center><label id="text">HEURE DE FIN</label></center>
					</td>
					<td bgcolor="A0A0A0">
						<center><label id="text">SALLE</label></center>
					</td>
					<td bgcolor="#109243">
						<center><label id="text">TYPE DE SALLE</label></center>
					</td>
				</tr>
				<?php foreach($liste as $ens): ?>
				<tr>
					<td>
						<center><input type="text" name="nom" value="<?= $ens['NOM_ENS'] ?>"></center>
					</td>
					<td>
						<center><input type="text" name="matricule" value="<?= $ens['MATRICULE_ENS'] ?>"></center>
					</td>
					<td>
						<center><input type="text" name="matiere" value="<?= $ens['NOM_MATIERE'] ?>"></center>
					</td>
					<td>
						<center><input type="text" name="code" value="<?= $ens['CODE_MATIERE'] ?>"></center>
					</td>
					<td>
						<center><input type="text" name="jour" value="<?= $ens['JOURS'] ?>"></center>
					</td>
					<td>
						<center><input type="text" name="heureD" value="<?= $ens['HEURE_DEBUT'] ?>"></center>
					</td>
					<td>
						<center><input type="text" name="heureF" value="<?= $ens['HEURE_FIN'] ?>"></center>
					</td>
					<td>
						<center><input type="text" name="heureF" value="<?= $ens['CODE_SALLE'] ?>"></center>
					</td>
					<td>
						<center><input type="text" name="heureF" value="<?= $ens['TYPE_SALLE'] ?>"></center>
					</td>
					<td>
						<a href="enregistrer.php?ID=<?= $ens['ID_ENSEIGNANT'] ?>&ID2=<?= $ens['ID_MATIERE'] ?>"><img src="images/Modif.png" id="save"></a>
					</td>
				</tr>
			<?php endforeach; ?>
			</table>	
			</center>
		</form>
		<?php
	}else{
		echo "Mot de passe ou Nom utilisateur incorrect";
	}
}
?>

          <br>
           <br>
           <br>
           <br>
           <h5>Copyright &copy; Martial 2021</h5>
    </body>
 </html>