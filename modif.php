<?php 
 if (isset($_POST['submit'])) {
	$id= $_POST['id'];
	$nom= $_POST['nom'];
	$matricule= $_POST['matricule'];
	$sexe= $_POST['sexe'];
	$pdo = new PDO('mysql:host=localhost; dbname=projet', 'root','');

	$sql= "UPDATE enseignants SET NOM_ENS='$nom', MATRICULE_ENS='$matricule', SEXE_ENS='$sexe' WHERE ID_ENSEIGNANT='$id' ";
	$result= $pdo->prepare($sql);
	$result->execute();
	echo "MODIFICATION EFFECTUER";
}
?>

<?php 
 if (isset($_POST['submit2'])) {
	$id= $_POST['idM'];
	$nom= $_POST['nomM'];
	$code= $_POST['codeM'];
	$credits= $_POST['creditM'];
	$pdo = new PDO('mysql:host=localhost; dbname=projet', 'root','');

	$sql= "UPDATE matieres SET ID_MATIERE='$nom', NOM_MATIERE='$nom', CODE_MATIERE='$code', CREDIT_MATIERE='$credits' WHERE ID_MATIERE='$id'";
	$result= $pdo->prepare($sql);
	$result->execute();
	echo "MODIFICATION EFFECTUER";
}
?>