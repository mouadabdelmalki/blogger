<?php
require_once '../../../configuration/session-verification.php';
require '../../../configuration/config.php';


if (isset($_POST['edit_gal'])){

     $id_gal=$_POST['id_galerie'];

   

    $galerie_titre =trim(htmlspecialchars($_POST['gal_titre'], ENT_QUOTES));
    $var1=array('&#039;',' ',',', '<','>','«','»','à','â','ç','é','è','ê','î','’');
    $var2=array('-','-','','','','','','a','a','c','e','e','e','i','');

    $url=strtolower(str_replace($var1,$var2,$galerie_titre));

    $galerie_contenu = trim(htmlspecialchars($_POST['galerie_contenu'], ENT_QUOTES));


    $sqledit = "update galerie set titre='$galerie_titre', contenu='$galerie_contenu' where id_galerie='$id_gal'";
    $req = mysqli_query($connect, $sqledit) or die('Erreur SQL!! <br />' . $sqledit . '<br />' . mysqli_error($connect));


    header('Location:../liste-galerie.php');

}
?>