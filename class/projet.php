
<?php
class projet
{
	var $id_projet,$nom_projet,$discription_prjt;
    var $date_debut;
	
	//ajouter un vc projet dans la bdd
		public	function ajoute_projet( $v_nom ,$v_description_tache,$v_date_debut , $chef)
	{
		include("form/connexion_bdd.php");	
		$result="";
		 $requete="INSERT INTO `projet`(`nom_projet`,`discription_prjt`,`date_debut`,`id_chef`) 
                         values ('$v_nom','$v_description_tache','$v_date_debut','$chef')";
         $result=$id->query($requete);
         return $result;
		
	}	
	
public	function modifier_projet( $i ,$v_nom ,$v_description_tache,$v_date_debut)
	{ 
	  include("form/connexion_bdd.php");
	  $result="";
		$requete="UPDATE `projet` SET `nom_projet`='$v_nom',`discription_prjt`='$v_description_tache',`date_debut`='$v_date_debut' WHERE `id_projet`='$i'";
        $result=$id->query($requete);
		return $result;
	}	
//suppression du projet
	public	function suprimer_projet($i)
	{ 
	  include("form/connexion_bdd.php");
	  $result="";
	  $resulto="";
       $requeto=" UPDATE phase  SET show_ph='1' WHERE id_projet='$i' ";
       $resulto=$id->query($requeto);
     if($resulto){
	   $requet=" UPDATE projet SET show_pr='1' WHERE id_projet='$i' ";
	   $result=$id->query($requet);
	  if($result){
	    header('Location: projet.php');}else echo"2";
      }else 
	   echo "nn";
	}	
	
public	function  affiche_projet ($o, $row)
{ 
    include("form/connexion_bdd.php");
    $currentPhase = array();
	 $currentProject = array();
	 $countProjects = 0;
	 $o= $_SESSION['id_employe'];
	$resul = $id->query("SELECT  id_tache FROM attache where id_employe=$o ");
	if($resul)
		while($row =MYSQLi_FETCH_ASSOC($resul))
		{ $l=$row['id_tache'];
			$resulta = $id->query("SELECT id_phase FROM tache where id_tache='$l' OR id_chef='$o'");
			if($resulta){
				
				
				while($row1 =MYSQLi_FETCH_ASSOC($resulta))
				{
					if(!in_array($row1['id_phase'], $currentPhase)){
						array_push($currentPhase, $row1['id_phase']);
						
						//$result2 = $id->query('SELECT id_projet FROM phase where id_phase='.$row1["id_phase"].' ');
						$classphs= new phase;
						$result2 = $classphs->get_id_projet($row1["id_phase"]);
						if($result2){
							while($row2 =MYSQLi_FETCH_ASSOC($result2))
							{
								if(!in_array($row2['id_projet'], $currentProject)){
									array_push($currentProject, $row2['id_projet']);
							
									$countProjects += 1;
								}
							}
						}
					}
				}
			}
	     }
	return $countProjects;
	
}
public function  nom_projet_exist($nom_projet,$id_projet)
{
	 include("form/connexion_bdd.php");
	$resul="";
		/*if(this->$id_projet==$id_projet && this->$nom_projet==$nom_projet){
	    $query="SELECT * FROM projet WHERE nom_projet='$nom_projet' and id_projet!='id_projet' LIMIT 1";
		$resul=mysqli_query($id,$query);}
        }*/
	
	return $resul;
}

//get all from projet vc nomp
public function get_all_projet($v_nom)
{ 
  include("form/connexion_bdd.php");
  $ras="";
  $query="SELECT * FROM projet WHERE nom_projet='$v_nom' LIMIT 1";
  $ras=mysqli_query($id,$query);
  return $ras;
	
}

public function get_nom_projet($ri)
{ 
  include("form/connexion_bdd.php");
  $ras="";
  $que="SELECT nom_projet FROM projet WHERE id_projet='$ri'";
			    $ras=$id->query($que);
return $ras;
	
}


//
public function slct_allprj($v_nom ,$i )
{
	include("form/connexion_bdd.php");
	$resul ="";
    $query="SELECT * FROM projet WHERE nom_projet='$v_nom' and id_projet!='$i' LIMIT 1";
	$resul=mysqli_query($id,$query);
    return $resul;
}
public function get_id_projet_phs($i)
{ 
   include("form/connexion_bdd.php");
   $resulta="";
   $query="SELECT id_projet FROM phase WHERE id_phase='$i' ";
   $resulta=$id->query($query);
	  
return $resulta;
	
}
//get all vc id prj
public function get_aall($i)
{
	include("form/connexion_bdd.php");
   $resulta="";
   $queryp="SELECT * FROM projet WHERE id_projet='$i'";
   $resulta=$id->query($queryp);

	return $resulta;
}


public function get_nbrprojet_chef($o){
	$countProjects=0; include("form/connexion_bdd.php");
	$result2 = $id->query("SELECT id_projet  FROM projet where id_chef='$o' AND show_pr='0'" );
						if($result2){
							while($row2 =MYSQLi_FETCH_ASSOC($result2))
							{
							
							
									$countProjects += 1;
								}
							}
						return $countProjects;
	
}

public function get_idpr_nompr($o){
	$resul=""; include("form/connexion_bdd.php");
	$query="SELECT id_projet FROM projet WHERE nom_projet='$v_nom' ";
	$resul=mysqli_query($id,$query);
						return $resul;
	
}
public function get_nbrprojet_employe($o){
$currentPhase = array();   
include("form/connexion_bdd.php");
	 $currentProject = array();
	 $countProjects = 0;
	// $o= $_SESSION['id_employe'];
	$resul = $id->query("SELECT  id_tache FROM attache where id_employe=$o ");
	if($resul)
		while($row =MYSQLi_FETCH_ASSOC($resul))
		{ $l=$row['id_tache'];
			$resulta = $id->query("SELECT id_phase FROM tache where id_tache='$l' OR id_chef='$o' AND vu_tch='0' ");
			if($resulta){
				
				
				while($row1 =MYSQLi_FETCH_ASSOC($resulta))
				{
					if(!in_array($row1['id_phase'], $currentPhase)){
						array_push($currentPhase, $row1['id_phase']);
						$n=0;
						$result2 = $id->query('SELECT id_projet  FROM phase  where  phase.id_phase='.$row1["id_phase"].' ');
						if($result2){
							while($row2 =MYSQLi_FETCH_ASSOC($result2))
							{
								if(!in_array($row2['id_projet'], $currentProject)){
									
									$result3= $id->query('SELECT show_pr FROM projet where id_projet='.$row2['id_projet'].'');
									if($result3)
									{while($row3 =MYSQLi_FETCH_ASSOC($result3))
							{if($row3['show_pr']==0){
									array_push($currentProject, $row2['id_projet']);
							
							$countProjects += 1;}}
									}
							}
							}
						}
					}
				}
			}
	     }
		 return $countProjects;
		 }
}

?>