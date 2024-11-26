 <?php
 include("form/connexion_bdd.php");
 $v_nom="";
 $v_date_debut="";
 $v_description_tache="";
 $iserror=false;
$errormsg="";
 
if(isset($_POST['valide'])){
	if((strlen($_POST['nom']))<3){
	$iserror=true;$errormsg="la longeur du nom de projet  est trop courte";
	}
	
	$v_nom=mysqli_real_escape_string($id,$_POST["nom"]);
$user_check_query = "SELECT * FROM projet WHERE nom_projet`='$v_nom' LIMIT 1";
$resul=mysqli_query($id,$user_check_query);
  
  if (mysqli_num_rows($resul)==1) 
  { 
  $iserror=true;
  $errormsg=" nom du projet  exite deja ";
  }
  
$v_description_tache=mysqli_real_escape_string($id,$_POST["description_tache"]);
$v_date_debut=mysqli_real_escape_string($id,$_POST["date-debut"]);
	
	if($iserror==false){
$requete="INSERT INTO `projet`(`nom_projet`,`discription_prj`,`date_debut`) 
                         values ('$v_nom','$v_description_tache','$v_date-debut')";
$result=$id->query($requete);
if($result)
{header('Location: resultat_ajouchef.php');echo "ajouter avec succe";}
else{echo"erreur d'ajouter ";}
  }}

?>