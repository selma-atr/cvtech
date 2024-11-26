<?php
include("connexion_bdd.php");
 $i=$_GET['id'];
$query="SELECT nom_projet FROM projet WHERE id_projet='$i' ";
$resulta=$id->query($query);

$nomprojet=mysqli_fetch_array($resulta)


$nomproje=$nomprojet[nom_projet];





$requete="SELECT nom_phase from phase where nom_projet='$nomproje'";
$result=$id->query($requete);

$i=0;
while($donne=mysqli_fetch_array($result))
{ 
	$poste[]=$donne['nom_phase'];
 $i++;

} 
for ($k = 0; $k < $i;$k++)
  {
    echo '<option value=\'' . $poste[$k] . '\'>' . $poste[$k] . '</option>';
  }	
?>