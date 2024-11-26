<?php
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
$requete="SELECT nom_poste from poste";
$result=$id->query($requete);

$i=0;
while($donne=mysqli_fetch_array($result))
{ 
	$poste[]=$donne['nom_poste'];
 $i++;

} 
for ($k = 0; $k < $i;$k++)
  {
    echo '<option value=\'' . $poste[$k] . '\'>' . $poste[$k] . '</option>';
  }	
?>