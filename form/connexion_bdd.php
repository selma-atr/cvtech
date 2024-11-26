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
?>