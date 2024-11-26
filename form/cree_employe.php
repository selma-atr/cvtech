<?php 
include("http://127.0.0.1/pm/form/connexion_bdd.php");
if(isset($_POST['valide'])){
$v_nom=mysqli_real_escape_string($id,$_POST["nom"]);
$v_pre=mysqli_real_escape_string($id,$_POST["pre"]);
$v_date_naissance=mysqli_real_escape_string($id,$_POST["date_naissance"]);
$diplome=mysqli_real_escape_string($id,$_POST["diplome"]);
$v_date_recrutemen=mysqli_real_escape_string($id,$_POST["date_recrutement"]);
$v_poste=mysqli_real_escape_string($id,$_POST["poste"]);
$v_user=mysqli_real_escape_string($id,$_POST["user"]);
$v_mdp=mysql_real_escape_string($_POST["mdp"]);
$v_addres=mysqli_real_escape_string($id,$_POST["adress"]);
$v_mdp2=mysql_real_escape_string($_POST["mdp2"]);
$errors = array(); 
$user_check_query = "SELECT * FROM employe WHERE username='$gg' LIMIT 1";
  $result = mysqli_query($id, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['username'] === $gg) {
      array_push($errors, "Usernam exist");
  }}

if ((strlen($_POST['mdp']))<6){array_push($errors,"la longueur du mot de passe est trop courte!");}
if ($k != $kk) {
	array_push($errors, "les mots de passe ne sont pas identiques");
  }

  
 if (count($errors) == 0)
	 {   $mdp=md5($_POST['mdp']);
		 $requete="INSERT INTO `employe`(`nom_employe`,`prenom_employe`,`date_naissance`,`address`,`nom_poste`,`diplome`,`date_recrute`,`username`,`mdp`) 
                         values ('$aa','$bb','$cc','$jj','$ff','$dd','$ee','$gg','$mdp')";
$result=$id->query($requete);
if($result)
{echo "ajouter avec succe";}
else{echo"erreur d'ajouter ";}
}}
?>	