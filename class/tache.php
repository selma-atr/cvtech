<?php
class tache
{
	var $nom_tache,$description_tache,$date_attachemen,$attache_a,$id_phas;
	
	//ajouter une n tache
 public	function ajoute_tache($v_nom,$v_description,$v_date_attachement,$id_phase,$chef , $iserror ,$ar)
 {
	  include("form/connexion_bdd.php");	
	  $result="";
	  if($iserror==false)
{
$requete="INSERT INTO `tache`(`nom_tache`,`description_tache`,`date_attachemen`,`id_phase`,`id_chef`) 
                      values('$v_nom','$v_description','$v_date_attachement','$id_phase','$chef')" ;
$result=$id->query($requete);
if($result)
{  
foreach($ar as $valeur)
   { 
      $query="SELECT  id_tache FROM tache WHERE nom_tache='$v_nom' ";
      $resulta=$id->query($query);
      $donne=mysqli_fetch_array($resulta);
       $v_id=$donne[0];
     echo $v_id;
     echo $valeur;
     $requete="INSERT INTO `attache`(`id_tache`,`id_employe`)values('$v_id','$valeur')";
     $re=$id->query($requete);

      if($re)
        {
		 echo "ok";
         $date=date('d-m-Y');
         $msg=" vous avez une nouvelle tache à faire ";
          $requete="INSERT INTO `notification`(`id_rec_note`,`msg_note`,`dat_note`) values ('$valeur','$msg','$date')";
          $rep=$id->query($requete);
          header('Location: resultat_ajouchef.php');
	    }
     else echo"no";
    }


    echo "ajouter avec succe";}
 else{ $iserror=true;
    $errormsg="erreur d'ajouter ";}
   }
	  
 }
 
 //modifier une tache
  public function modifier_tache($v_nom,$v_description,$v_date_attachement,$id_phase,$i)
  {
	  include("form/connexion_bdd.php");	
	  $result="";
	  $requete="UPDATE `tache` SET `nom_tache`='$v_nom',`description_tache`='$v_description',`date_attachemen`='$v_date_attachement',id_phase='$id_phase'  WHERE id_tache='$i'" ;
      $result=$id->query($requete);
	  return $result;
	  
  }
  
  //sup
  public function suprimeer_tache($i)
  {
	  include("form/connexion_bdd.php");	
	  $result="";
	 $requete="UPDATE tache SET  vu_tch='1' WHERE id_tache='$i'";
     $result=$id->query($requete);
      return $result;
	  
  }
  
  //update tch
   public function upd_tache($id_phase)
  {
	  include("form/connexion_bdd.php");	
	  $result="";
       $requeti="UPDATE tache SET vu_tch='1' WHERE id_phase='$id_phase'";
       $resulti=$id->query($requeti);
	   return $resulti;
	   
  }
       public	function  affiche_tache ($id_tache)
        {  
		    include("form/connexion_bdd.php");
		   $resulta="";

		    $queryp="SELECT * FROM tache WHERE id_tache='$id_tache'";
            $resulta=$id->query($queryp);
		   
	       
			  return $resulta;
}

  public	function  get_id_phase ($id_tache){
	  include("form/connexion_bdd.php");
	 $result="";
	  $query="SELECT id_phase FROM tache WHERE id_tache='$id_tache' ";
$resulta=$id->query($query);
$donne=mysqli_fetch_array($resulta);
$v_id=$donne[0];
	  return $v_id;
  }
 public	function  get_nom_tache ($id_tache){
	 	  $query="SELECT  nom_tache FROM phase WHERE id_tache='$id_tache' ";
$resulta=$id->query($query);
$donne=mysqli_fetch_array($resulta);
$v_id=$donne[0];
	  return $v_id;
	 
 }
 
  public	function  get_id_tache ($nom_tache){
	   include("form/connexion_bdd.php");
	  $iserror="";
	 	  $query="SELECT  id_tache FROM tache WHERE nom_tache='$nom_tache' ";
      $resulta=$id->query($query);
      $donne=mysqli_fetch_array($resulta);
      $v_id=$donne[0];
	  return $v_id;
	 
 }
 

 public	function  nomtch_existe ($id_phase, $v_nom){
	 	  include("form/connexion_bdd.php");
	  $iserror=false;	
      $que="SELECT * FROM tache WHERE  id_phase='$id_phase' AND nom_tache='$v_nom' LIMIT 1";
	  
	  $resul=mysqli_query($id,$que);
	  if(	mysqli_num_rows ($resul)==1){
		$iserror=true;
		$errormsg="ce nom de tache est deja pris  dans la phase de ce projet  il faut choisir un autre !";
		}
	  return $iserror;
	 
 } 
  //get all with id phase
   public	function get_alltch_phas($id_phase )
   {
	   include("form/connexion_bdd.php");
	$resulth="";
	$queryt="SELECT * FROM tache WHERE id_phase='$id_phase' AND vu_tch='0'";
	$resulth=$id->query($queryt);
	   
	   return $resulth;
   }
  
  public function updattche()
  {
	  include("form/connexion_bdd.php");
	  $resulth="";
	  return  $resulth ;
  }
  
  //get all with id phase
   public	function all_tch_phs($id_phase ,$v_nom ,$i )
   {
	   include("form/connexion_bdd.php");
	  $resul="";
      $que="SELECT * FROM tache WHERE  id_phase='$id_phase' AND nom_tache='$v_nom' AND id_tache!= '$i'LIMIT 1";
	  $resul=mysqli_query($id,$que);
	  return $resul;
 
 }
 
 //get all with id tch
   public	function all_tch($i )
   {
	   include("form/connexion_bdd.php");
	  $resul="";
      $queryp="SELECT * FROM tache WHERE id_tache='$i'";
      $resul=$id->query($queryp);
	  return $resul;
 
 }
}
?>