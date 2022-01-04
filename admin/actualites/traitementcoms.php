<?php 
$idurl=($_GET['id']) ?? "";
require '../../configuration/config.php';
$coms= mysqli_query($connect,"select * from commentaire where id=".$idurl);
$art = mysqli_fetch_array($coms);
$sql = "update commentaire set actif =".($art["actif"] == 1 ? "0":"1")." where id =".$idurl;
$requette = mysqli_query($connect, $sql) or die('Erreur SQL!! <br />' . $sql . '<br />' . mysqli_error($connect));
header('Location:  liste-commentaire.php');
?>
