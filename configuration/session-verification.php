<?php
session_start();
if (isset( $_SESSION['logged']) || $_SESSION['logged']){
header('location:'.$url.'../admin/page-authentification.php?error=4');
//header('location: index.php');

}

  $login=isset($_SESSION['login']) ? $_SESSION['login']:'';
$profil=isset($_SESSION['password']) ? $_SESSION['password']:'';
$iduser=isset($_SESSION['iduser']) ? $_SESSION['iduser']:'';
 $profil=isset($_SESSION['profil']) ? $_SESSION['profil']:'';
$nom=isset($_SESSION['nom']) ? $_SESSION['nom']:'';
$prenom=isset($_SESSION['prenom']) ? $_SESSION['prenom']:'';
$email=isset($_SESSION['email']) ? $_SESSION['email']:'';
$user=isset($_SESSION['user']) ? $_SESSION['user']:'';


if(isset($_GET['decon'])){
    session_unset();
    session_destroy();
    header('location:'.$url.'../admin/page-authentification.php');
}
?>