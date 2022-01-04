<?php
session_start();
require 'config.php';


$login=isset($_POST['login']) ? $_POST['login']:'';
$password=md5(isset($_POST['password']) ? $_POST['password']:'');


$req=mysqli_query($connect,"select * from utilisateurs where login='$login' or Mail='$login' and mot_passe='$password'");

$requset=mysqli_fetch_array($req);



$id=$requset['id_user'];
$loginuser=$requset['login'];
$passworduser=$requset['mot_passe'];
$profiluser=$requset['profil'];
$nomuser=$requset['Nom'];
$prenomuser=$requset['Prenom'];
$identifiant=$requset['Nom']. "  ".$requset['Prenom'];
$emailuser=$requset['Mail'];



   if($login=='' || $password==''){
       header('location: ../admin/page-authentification.php?error=1');
   }
   elseif ($password==''){
       header('location: ../admin/page-authentification.php?error=2');

   }
   elseif ($password!==$passworduser|| $login!==$loginuser &&  $login!==$emailuser){

    //  header('location: ../admin/page-authentification.php?error=3$password=' .$password);
     header('location: ../admin/index.php');


   }
   elseif($profiluser=="admin"){
       $_SESSION['login']=$login;
       $_SESSION['password']=$password;
       $_SESSION['logged']=true;
       $_SESSION['iduser']=$identifiant;
       $_SESSION['profil']=$profiluser;
       $_SESSION['nom']=$nomuser;
       $_SESSION['prenom']=$prenomuser;
       $_SESSION['email']=$emailuser;
       $_SESSION['user']=$id;



       header('location: ../admin/index.php');
   }
   else{
       session_start();
       $_SESSION['login']=$login;
       $_SESSION['password']=$password;
       $_SESSION['logged']=true;
       $_SESSION['iduser']=$identifiant;
       $_SESSION['profil']=$profiluser;
       $_SESSION['nom']=$nomuser;
       $_SESSION['prenom']=$prenomuser;
       $_SESSION['email']=$emailuser;
       $_SESSION['user']=$id;


       header('location:  ../admin/index.php');

   }

?>