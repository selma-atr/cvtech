<?php 
class poste
{
	var $id_poste, $nom_poste,$id_service,$salaire;

	//inserer un nv poste 
  public	function ajoute_poste($v_nom_poste,$vid,$v_salaire)
  {
	   include("form/connexion_bdd.php");
	   $result="";
       $requete="INSERT INTO `poste`(`nom_poste`,`id_service`,`salaire`) values ('$v_nom_poste','$vid','$v_salaire') ";
       $result=$id->query($requete);
      return $result; 
  }
 
 //modifier
  public	function modifier_poste($i,$v_nom_poste,$v_salaire,$vid)
  {
      include("form/connexion_bdd.php");
	  $result="";	  
      $requete="UPDATE poste SET nom_poste='$v_nom_poste',salaire='$v_salaire',id_service='$vid'  where id_poste='$i' ";
      $result=$id->query($requete);
	  return $result;
  }
  
  //supp
  public	function suprimer_poste($i )
   {
	 include("form/connexion_bdd.php");  
      $result="";
      $requete="DELETE FROM employe WHERE id_poste='$i'";
      $result=$id->query($requete);
      $requete="DELETE FROM poste  WHERE id_poste='$i'";
      $result=$id->query($requete);
       return $result;
    }
   public	function affiche_poste($user)
   {
	   include("form/connexion_bdd.php");
	   $result="";	
	   $req="select *from poste where id_poste='$user' ";  
       $result=$id->query($requete);
      return $result;
   }
   
   //get all from poste
    public	function get_all_poste($v_nom_poste)
   {
	   include("form/connexion_bdd.php");
	   $resul="";	  
	   $user_check_query = "SELECT * FROM poste WHERE nom_poste='$v_nom_poste' LIMIT 1";
       $resul=mysqli_query($id,$user_check_query);
	   return $resul;
	   
   }
   
   //affiche all poste
   
       public	function affiche_tt_poste()
	   {
		   include("form/connexion_bdd.php");
	       $result="";	
		   if ( ! $id )
            {
             die ("echec de connexion au serveur M.ySQL. <br/>");
            }
           $id_db=mysqli_select_db($id,"pfe");
             if(! $id_db)
          {
	       die("echec de selectionne de la bdd");
          }
          $requete="SELECT * from poste";
          $result=$id->query($requete);
		   return $result;
	   }
   
   public	function get_id_poste($v_poste)
   {
	   include("form/connexion_bdd.php");
	   $re="";	  
	   $user_p = "SELECT id_poste FROM poste WHERE nom_poste='$v_poste' ";
       $re=$id->query($user_p);
	   return $re;
	   
   }
  //get all 
 public function get_post($v_nom_poste , $i)
 { 
      include("form/connexion_bdd.php");
	   $resul="";
      $user_check_query = "SELECT * FROM poste WHERE nom_poste='$v_nom_poste'  AND id_poste!='$i'LIMIT 1";
       $resul=mysqli_query($id,$user_check_query);
      return $resul;
   
 }
   //get
 public	function get_nom_poste($p)
   {   
      include("form/connexion_bdd.php");
	   $id_p="";	
     $user_p = "SELECT nom_poste FROM poste WHERE id_poste='$p' ";
     $re=$id->query($user_p);
     $id_p=mysqli_fetch_array($re);
	 
	 return $id_p;
   }
   
   //get id pst with id srvc
    public	function get_id_pst($i)
   {
	   include("form/connexion_bdd.php");
	   $re="";	  
	  $queryz="SELECT id_poste FROM poste WHERE id_service='$i' ";
      $re=$id->query($queryz);
	   return $re;
	   
   }
    public	function get_id_service($user){
	   $req="select id_service from service where id_service='$user' ";
	   
   $result=$id->query($requete);
$donne=mysqli_fetch_array($result);
$v_id=$donne[0];
	  return $v_id;
   
	   
	   
   }
} ?>