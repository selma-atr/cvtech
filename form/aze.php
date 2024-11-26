

<?php
include("connexion_bdd.php");
$requete="SELECT * from service";
$result=$id->query($requete);

$i=0;
while($donne=mysqli_fetch_array($result))
{ 
	$service[]=$donne['nom_service'];
 $i++;

} 
for ($k = 0; $k < $i;$k++)
  {
    echo '<option value=\'' . $service[$k] . '\'>' . $service[$k] . '</option>';
  }
?>
