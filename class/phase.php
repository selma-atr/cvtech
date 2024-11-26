<?php
class phase
{
var $id_phase,$nom_projet,$nom_phase;
 
	
	
	
public	function modifier_phase( $i, $v_id ,$vnom_phase )
	{ 
	 include("form/connexion_bdd.php");
	 include("class/projet.php");
	 $result="";
	 $requete="UPDATE phase SET nom_phase='$vnom_phase',id_projet='$v_id' where id_phase='$i'";
						
$result=$id->query($requete);
if($id->query($requete))
{   echo"tre";header('Location: resultat_ajouchef.php');echo "ajouter avec succe";}
 else{ $iserror=true;
		$errormsg="erreur dajouter ";}
		
		return $result;
	}	
	
	
	
	
	
	public	function ajoute_phase( $i,$vnom_phase)
	{
	  include("form/connexion_bdd.php");
	  $result="";
     $requete="INSERT INTO `phase`(`nom_phase`,`id_projet`) 
                         values ('$vnom_phase','$i')";
						
     $result=$id->query($requete);
     if($result)
       {   echo"tre";header('Location: resultat_ajouchef.php');echo "ajouter avec succe";}
      else{ $iserror=true;
		$errormsg="erreur dajouter ";}
      
		
	}	
	public	function suprimer_phase($o )
	{
		include("form/connexion_bdd.php");
		$resulti="";
		$requeto="";
		$requeti="UPDATE tache SET vu_tch='1' WHERE id_phase='$o'";
         $resulti=$id->query($requeti);
         if($resulti){
     	$requeto=" UPDATE phase  SET show_ph='1' WHERE id_phase='$o' ";
        $resulto=$id->query($requeto);
		return $resulto;
	}
	}	
	

  public function  get_id_projet ($id_phase)
  {
	  include("form/connexion_bdd.php");
      $result2="";
	  $result2 = $id->query('SELECT id_projet FROM phase where id_phase='.$row1["id_phase"].' ');				
	  return $result2;
  }
  
 public	function  get_nom_phase ($id_phase)
 {
	 include("form/connexion_bdd.php");
	 	

		$query="SELECT  nom_phase FROM phase WHERE id_phase='$id_phase' ";
          $resulta=$id->query($query);
          $donne=mysqli_fetch_array($resulta);
          $v_id=$donne[0];
	  return $v_id;
	 
 }

  public	function  get_id_phase ($nom_phase)
  {
	  include("form/connexion_bdd.php");
	  $resulta="";	
		//$resulta = $id->query("SELECT id_phase FROM tache where id_tache='$l' OR id_chef='$o'");

		$query="SELECT  id_phase FROM phase WHERE nom_phase='$nom_phase' ";
          $resulta=$id->query($query);
          $donne=mysqli_fetch_array($resulta);
          $v_id=$donne[0];
	  return $v_id;
	 
 }
 
 //get id phase vc id prj
   public	function  get_id_phs ($i)
  {
	  include("form/connexion_bdd.php");
	  $result="";	
		$queryz="SELECT id_phase FROM phase WHERE id_projet='$i' ";
        $result=$id->query($queryz);
	  return $result;
	 
 }
  
  //gt nom ph
  public function gt_nm_phs($id_ph)
  {
	  include("form/connexion_bdd.php");
	  $result="";
      $qu="SELECT nom_phase FROM phase  WHERE id_phase='$id_ph' ";
      $result=$id->query($qu);
     return $result;
  }
  
public function  nom_phase_exist($id_projet,$nom_phase)
{
	include("form/connexion_bdd.php");
	$resul="";
		/*if(this->$id_phase==$id_phase && this->$id_projet==$id_projet)
		{
			$que="SELECT * FROM phase WHERE  nom_phase='$nom_phase' AND id_projet='$id_projet' LIMIT 1";
	        $resul=mysqli_query($id,$que);
	
	    }*/
     return $resul;
}
	
	public	function  get_id_tache ($v_phase){
	   include("form/connexion_bdd.php");
	  $done="";
    $q="SELECT id_phase FROM phase WHERE nom_phase='$v_phase' ";
  	$done=$id->query($q);
    return $done;
 
   }
  public	function  get_all_phase ($vnom_phase , $i)
  {
	  include("form/connexion_bdd.php");
	  $resulta="";	
		$que="SELECT * FROM phase WHERE  nom_phase='$vnom_phase' AND id_projet='$i' LIMIT 1";
	    $resulta=mysqli_query($id,$que);
	  return $resulta;
	 
 }	
	public function get_nomph_ajttache($i)
	{
		 include("form/connexion_bdd.php");
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
     // $i=$_GET['id'];
      $query="SELECT id_projet FROM projet WHERE id_projet='$i' ";
       $resulta=$id->query($query);

       $nomprojet=mysqli_fetch_array($resulta);
       $nomproje=$nomprojet[nom_projet];
       $requete="SELECT nom_phase from phase where id_projet='$i'";
       $result=$id->query($requete);
	   return $result;
	}
	
   public function get_i_prj($i)
   {
	   include("form/connexion_bdd.php");
	    $resulta="";	
		$query="SELECT id_projet FROM phase WHERE id_phase='$i' ";
        $resulta=$id->query($query);
		return $resulta;
	   
   }
	
	
	}
?>