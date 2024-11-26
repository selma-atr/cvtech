<?php 
include("form/connexion_bdd.php");
class employe
{
 var $id_employe, $nom_employe,$prenom_employe,$date_naissance,$address,$id_poste,$diplome,$date_recrute,$username,$v_type ,$mdp,$chemain, $v_sexe ;

 //ajouter
 public	function ajoute_employe($v_nom,$v_pre,$v_date_naissance,$v_addres,$vid,$v_diplome,$v_date_recrutemen,$v_user,$v_type,$mdp,$chemain,$v_sexe)
   {
     include("form/connexion_bdd.php");	 
	 if ($v_sexe=="homme") $chemain="images/3.png";else $chemain="images/5.png";
		 $requete="INSERT INTO `employe`(`nom_employe`,`prenom_employe`,`date_naissance`,`address`,`id_poste`,`diplome`,`date_recrute`,`username`,`type`,`mdp`,`photo`,`sexe`) 
                               values ('$v_nom','$v_pre','$v_date_naissance','$v_addres','$vid','$v_diplome','$v_date_recrutemen','$v_user','$v_type','$mdp','$chemain','$v_sexe')";
        $result=$id->query($requete);
	
     if($result)
{ header('Location: resultat_ajou.php');echo "ajouter avec succe";}
else{echo"erreur d'ajouter ";}
   }
 
 //modifier
 public	function modifier_employe($i ,$v_nom,$v_pre,$v_date_naissance , $v_addres , $vid , $v_diplome , $v_date_recrutemen, $v_user, $v_mdp, $chemain, $v_sexe)
  { 
    include("form/connexion_bdd.php");	 
    $result="";
      $mdp=md5($_POST['mdp']);
      if ($v_sexe=="homme") $chemain="images/3.png";else $chemain="images/5.png";
      $requete="UPDATE employe SET nom_employe='$v_nom',prenom_employe='$v_pre',date_naissance='$v_date_naissance',address='$v_addres',id_poste='$vid',
         diplome='$v_diplome',date_recrute='$v_date_recrutemen',username='$v_user',mdp='$v_mdp',photo='$chemain',sexe='$v_sexe' where id_employe='$i'  ";
       $result=$id->query($requete);
        if($result)
           { header('Location: resultat_ajou.php');echo "ajouter avec succe";}
         else{echo"erreur d'ajouter ";}

  }
  
//supprimer  
  public	function suprimer_employe($i){
	  
	  include("form/connexion_bdd.php");
	  $result="";
	  $requete="DELETE FROM attache  WHERE id_employe='$i'";
      $resulta=$id->query($requete);
      $requete="DELETE FROM employe   WHERE id_employe='$i'";
      $result=$id->query($requete);
	return   $result;
  }
  
 //afficher la liste 
    public	function affiche_tt_employe()
   {
	   	  include("form/connexion_bdd.php");
		  $id =mysqli_connect("localhost","root","","pfe");
		  $result="";
	      $id =mysqli_connect("localhost","root","","pfe");
          if ( ! $id )
        {
          die ("echec de connexion au serveur M.ySQL. <br/>");
        }
         $id_db=mysqli_select_db($id,"pfe");
        if(! $id_db)
        {
	        die("echec de selectionne de la bdd");
        }
         $requete="SELECT * from employe";
         $result=$id->query($requete);
		 
       return $result;
   }
   
   
   public	function affiche_employe($o)
   {
	   	  include("form/connexion_bdd.php");
		  $donne="";
	   $requete="SELECT type from employe WHERE id_employe='$o'";
       $result=$id->query($requete);
	   $donne=mysqli_fetch_array($result);

       return $donne;
   }
   
   public	function get_id_employe($user)
   {
	   	  include("form/connexion_bdd.php");
		  $result="";
	   $req="select id_employe from employe where id_poste=$user or nom_employe='$user'";
	   $result=$id->query($requete);
       $donne=mysqli_fetch_array($result);
       $v_id=$donne[0];
	   return $v_id;
    
   }
  
  //get tyype employe vc id
    public	function get_type($o)
	{
			  include("form/connexion_bdd.php");
         $requete="SELECT type from employe WHERE id_employe='$o'";
         $result=$id->query($requete);
         $donne=mysqli_fetch_array($result);
         $v_id=$donne[0];
         return $v_id;
  
	}
	
	//delet form emp with id poste
	 public	function dlt_ps($i)
	{
			  include("form/connexion_bdd.php");
			  
			  $requete="DELETE FROM employe WHERE id_poste='$i'";
              $result=$id->query($requete);
			  
	}
	
	//get
	  public	function get_id_emp($i)
   {
	   	  include("form/connexion_bdd.php");
		 
	   $req="select id_employe from employe where id_poste='$i'";
	   $result=$id->query($req);
	   return $result;
    
   }
	
    public	function get_id_poste($user){
			  include("form/connexion_bdd.php");
	   $req="select id_poste from employe where id_poste='$user' ";
       $result=$id->query($requete);
       $donne=mysqli_fetch_array($result);
       $v_id=$donne[0];
	  return $v_id;
     
   }
    
    public	function get_all_with_username($v_user)
	{
			  include("form/connexion_bdd.php");
			  $resul="";
	  	$user_check_query = "SELECT * FROM employe WHERE username='$v_user' LIMIT 1";
     	$resul=mysqli_query($id,$user_check_query);
	    return $resul;
     
   }
   //get all vc usrnm id emp
   public	function get_all_wusr_id($v_user, $i)
	{
			  include("form/connexion_bdd.php");
			  $resul="";
        $user_check_query = "SELECT * FROM employe WHERE username='$v_user' and id_employe!='$i' LIMIT 1";
	    $resul=mysqli_query($id,$user_check_query);
		return $resul;
		
	}
   //get nom vc id employe
       public	function get_nomemp($ij)
	   {
			  include("form/connexion_bdd.php");
			 $queryp="SELECT nom_employe FROM employe WHERE id_employe='$ij'";
	         $resulta=$id->query($queryp);
	         $id_p=mysqli_fetch_array($resulta);
             $vid=$id_p[0];
			 return $vid;
	   }
   //get all emplye
   public	function all_emp()
	   {
			  include("form/connexion_bdd.php");
			  $result ="";
			  $query="SELECT * FROM employe ";
              $result=$id->query($query);
			  
			  return $result;
   
	   }
} ?>