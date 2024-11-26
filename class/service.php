<?php 
class service
{
	var $id_service, $nom_service;

	//ajouter un nv service
  public	function ajoute_service($v_nom_service,$v_number, $iserror)
  {
	   include("form/connexion_bdd.php");
	   $result="";
      if ($iserror==false)
    {
      $requete="INSERT INTO `service`(`nom_service`,`nbr_employe`) values ('$v_nom_service','$v_number') ";
      $result=$id->query($requete);
      if($result)
      { header('Location: resultat_ajou.php');echo "ajouter avec succe";}
      else{echo"erreur d'ajouter ";}
    }
      
  }
 
  public	function modifier_service($v_number,$v_nom_service,$i)
  {
      include("form/connexion_bdd.php");
	  $result="";	  
       $requete="UPDATE service SET nom_service='$v_nom_service',nbr_employe='$v_number'  where id_service='$i' ";
       $result=$id->query($requete);
       if($result)
        {  $v="mod"; header('Location: liste_service.php?id=$v');echo "ajouter avec succe";}
      else{echo"erreur d'ajouter ";}
  }
  
  //supp
  public	function suprimer_service($i)
  {
	  include("form/connexion_bdd.php");  
	  $requete="DELETE FROM poste  WHERE id_service='$i'";
      $result=$id->query($requete);

      $requet="DELETE FROM service WHERE id_service='$i'";
      $result=$id->query($requet);
        if($result)
          { echo "ajouter avec succe";  $v="sup"; header('Location: liste_service.php?id=$v');
            echo "ajouter avec succe";
		  }
        else{echo"erreur de suppression ";}
  }
  
  
   public	function affiche_service($user)
   {
	   include("form/connexion_bdd.php");
	   $result="";	
	   $req="select *from poste where id_poste='$user' ";  
       $result=$id->query($requete);
      return $result;
   }
   
   
   //get nom service
   public	function get_nm_srvice($p)
   {
        include("form/connexion_bdd.php");
	    $re="";
        $user_p = "SELECT nom_service FROM service WHERE id_service='$p' ";
        $re=$id->query($user_p);
		return $re;
   }
   //get id_service vc nom_s
   public	function get_id_service($v_service)
   {
	   include("form/connexion_bdd.php");
	   $re="";	  
	   $user_ser = "SELECT id_service FROM service WHERE nom_service='$v_service' ";
       $re=$id->query($user_ser);
	   return $re;
	   
   }
   //all
    public	function all_noms_id($v_nom_service ,$i)
   {
	   include("form/connexion_bdd.php");
	   $resul="";	
	   $query="SELECT *FROM service WHERE nom_service='$v_nom_service and id_service!='$i'";
       $resul=mysqli_query($id,$query);
	   return resul ;
   
   }
   //get nom service
   public	function get_nom_service($p)
   {
        include("form/connexion_bdd.php");
	    $id_p="";
        $user_p = "SELECT nom_service FROM service WHERE id_service='$p' ";
        $re=$id->query($user_p);
        $id_p=mysqli_fetch_array($re);
		return $id_p;
   }
 
 //GET ALL FROM SERVICE vc nom
   public	function get_all_service($v_nom_service)
   {
	   include("form/connexion_bdd.php");
	   $re="";	  
	  $query="SELECT *FROM service WHERE nom_service='$v_nom_service'";
	  $re=mysqli_query($id,$query);
	   return $re;
	   
   }
   
   //get all from service
 public	function  get_all_srcv()
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

        $requete="SELECT * from service";
        $result=$id->query($requete);
		return $result;
   }
   
} ?>