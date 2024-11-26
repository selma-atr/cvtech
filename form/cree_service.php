<?php
include("connexion_bdd.php");$v_nom_service="";$v_number="";

$iserror=false;
$errormsg="";
if(empty($v_nom_service)){
	$iserror=true;$errormsg="le nom de service est obligatoire";
}else{
	$pseudo=($_POST['nom_service']);
	$query="SELECT *FROM service WHERE nom_service='$v_nom_service'";
	$resul=mysqli_query($id,$query);
	if(mysqli_num_rows($resul)==1){
		$iserror=true;$errormsg="ce nom de service est deja pris   il faut choisir un autre !";
	}else{$v_nom_service=mysqli_real_escape_string($id,$_POST["nom_service"]);
}
}
$v_number=mysqli_real_escape_string($id,$_POST["number"]);
 if ($iserror!=true){
$requete="INSERT INTO `service`(`nom_service`,`nbr_employe`) values ('$v_nom_service','$v_number') ";
$result=$id->query($requete);
if($result)
{ header('Location: resultat_ajou.php');echo "ajouter avec succe";}
 else{echo"erreur d'ajouter ";}}
?>