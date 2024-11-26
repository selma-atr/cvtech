<?php
include("connexion_bdd.php");
$aa=mysqli_real_escape_string($id,$_POST["nom_poste"]);
$bb=mysqli_real_escape_string($id,$_POST["service"]);
$cc=mysqli_real_escape_string($id,$_POST["salaire"]);

$requete="INSERT INTO `poste`(`nom_poste`,`nom_service`,`salaire`) values ('$aa','$bb','$cc') ";
$result=$id->query($requete);
if($result)
{echo "ajouter avec succe";}
else{echo"erreur d'ajouter ";}
?>