<?php
 session_start();
$cp=0;
 $_SESSION['ouvrire']=false;
 $err=false;
$erreur="";
if(isset($_POST['submit']))
	
{ 

include("form/connexion_bdd.php");


  $uid = mysqli_real_escape_string( $id,$_POST['uid']);
  $mdp = mysqli_real_escape_string($id ,$_POST['mdp']);
  $mdp=md5($mdp);
 // $m = mysqli_real_escape_string($conn ,$_POST['clicks']);
 //$m->execute($_POST['clicks']);
	/*if($valeur_id > 4)
    {
	 header("Location: erreur.php?login=err");
	 
    }*/

	if(empty($uid) || empty($mdp))
	{
		// header("Location: index.php?login=empty");
	}
	else
	{   
     
	 
		$sql ="SELECT mdp FROM `employe` WHERE username = '$uid'";
		$result=$id->query($sql);

		
		
		if(!$result)
		{ $erreur= "user not exist"; $err=true;
			
		}
		else
	    {
			if($row = mysqli_fetch_assoc($result))
			{
			
if($mdp == $row['mdp'] )	
			{
				
				
				
				
				 $sq ="SELECT * FROM `employe` WHERE username = '$uid'";
				$resulta=$id->query($sq);
				$row = mysqli_fetch_assoc($resulta);
				
			$_SESSION['id_employe'] = $row['id_employe'];
			if($row['act']==1) {	  $erreur="compte desactive contacter l'administration";	 $err=true;}
			
			else{		
				if( $row['type'] == 0) 
				{
								 header("Location: baradmin.php");
				}
				
				if( $row['type']== 1) 
				{ header("Location: homechef.php");}
			    if( $row['type'] == 2) 
				{  header("Location: homemp.php");}
				
				
				 $_SESSION['ouvrire']=true;
				
			}
			}else{  $erreur="mdp erreur ";
			$err=true;}









				  }










}













}
if( $_SESSION['ouvrire']==false){
	
	if(isset($_COOKIE['cpt'])){
				$cp=$_COOKIE['cpt']+1;
	setcookie('cpt', $cp, time() + 5*60);
	}
	else{
      $cp=1;
	setcookie('cpt', $cp, time() + 5*60);}
	
}
	if(isset($_COOKIE['cpt']) && $_COOKIE['cpt']>1	&&$_SESSION['ouvrire']==false)
	{ $x= 'Location: erreurcon.php?d='.$uid.'';
		header($x);


      }
}

		
		
		?>
<html>
<head>
<title>connecter</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Modern Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
 <!-- Bootstrap Core CSS -->
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- jQuery -->
<script src="js/jquery.min.js"></script>
<!----webfonts--->
<link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'>
<!---//webfonts--->  
<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>
</head>
<body  id="login">
  <div class="login-logo">
    <a href="#"><img src="images/oct.png" alt=""/></a>
  </div>
  <h2 class="form-heading">login</h2>
  <?php if($err==true){?>
   <div class="alert alert-danger" role="alert">
  <strong align="center"> <?php echo $erreur; ?></strong> 
       </div><?php } ?>
  <div class="app-cam">
          
	  <form method="POST">
		
		<input type="text" name="uid" placeholder="username">
		<input type="password" name="mdp" placeholder="password">
		<button class="btn-default btn"  name="submit" >connecte</button>
  
		         
		<ul class="new">
			
			<div class="clearfix"></div>
		</ul>
		
	   </form>
	 
  </div>
   <div class="copy_layout login">
      <p>octenium </a> </p>
   </div>
</body>
</html>