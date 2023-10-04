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

	$nom = $_POST['Nom'];
	$pass = $_POST['PassWord'];
         $pdo = new PDO('mysql:host=localhost; dbname=projet', 'root', '');
         $sql = "SELECT * FROM etudiants WHERE MATRICULE = '$pass'  AND NOM_ETUDIANT  = '$nom' ";
         $result = $pdo->prepare($sql);
         $result->execute();

         if ($result->rowCount() > 0) 
         {
         		?><h1><i>Bonjour <?php echo($nom); ?></i></h1>
 <?php	
         		$sql1 = "SELECT P.JOURS, P.HEURE_DEBUT, P.HEURE_FIN, M.NOM_MATIERE, M.CODE_MATIERE, M.CREDIT_MATIERE, ME.SEMESTRE FROM matieres M, etudiants E, matiereetudiant ME, programmes P WHERE M.ID_MATIERE = ME.ID_MATIERE AND E.ID_ETUDIANT = ME.ID_ETUDIANT AND P.ID_MATIERE=M.ID_MATIERE";
         		$result1 = $pdo->prepare($sql1);
         		$ok=$result1-> execute();
         		$liste= $result1->fetchAll();
         		?>
         		<h2>Liste des matières</h2>
         		<center>
         		<table border="0">
         			<tr>
         				<td bgcolor="#109243" id="text"><center>INTITULE</center></td><td>  </td>
         				<td><center>CODE</center></td><td>  </td>
         				<td bgcolor="#109243" id="text"><center>CREDIT</center></td><td>  </td>
         				<td><center>SEMESTRE</center></td><td>  </td>
         				<td bgcolor="#109243" id="text"><center>JOURS</center></td><td>  </td>
         				<td><center>HEURE DE DEBUT</center></td><td>  </td>
         				<td bgcolor="#109243" id="text"><center>HEURE DE FIN</center></td><td>  </td>
         			</tr>
         		<?php foreach ($liste as $matieres): ?>
         			<tr>
         				<td bgcolor="A0A0A0"><center><?= $matieres[ 'NOM_MATIERE' ] ?></center></td><td>  </td>
         				<td><center><?= $matieres[ 'CODE_MATIERE' ] ?></center></td><td>  </td>
         				<td bgcolor="A0A0A0"><center><?= $matieres[ 'CREDIT_MATIERE' ] ?></center></td><td>  </td>
         				<td><center><?= $matieres[ 'SEMESTRE' ] ?></center></td><td>  </td>
         				<td bgcolor="A0A0A0"><center><?= $matieres[ 'JOURS' ] ?></center></td><td>  </td>
         				<td><center><?= $matieres[ 'HEURE_DEBUT' ] ?></center></td><td>  </td>
         				<td bgcolor="A0A0A0"><center><?= $matieres[ 'HEURE_FIN' ] ?></center></td><td>  </td>
         			</tr>
         		<?php endforeach; ?>
         		</table>
         		</center>	
  <?php

         }else{
         		echo "losed";
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