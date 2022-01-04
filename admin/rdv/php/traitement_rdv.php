<?php

require '../../../configuration/config.php';

if(isset($_POST['send_rdv']))
{
    $date=$_POST["date"] ;
    $seance=$_POST["seance"] ;
    $nomP = $_POST['nom_P'] ;
    $ageP = $_POST['age_P'] ;
    $villeP = $_POST['ville_P'] ;
    $adresseP = $_POST['adresse_P'] ;
    $emailP = $_POST['email_P'] ;
    $telP = $_POST['tel_P'] ;
    $descriptionP = $_POST['description_P'] ;

   $sql = mysqli_query($connect,"INSERT INTO `rdv`(`nom`, `date`, `adresse`, `ville`, `tel`, `email`, `description`, `seance`, `age`) VALUES ('$nomP','$date','$adresseP','$villeP','$telP','$emailP','$descriptionP','$seance','$ageP')");

    header('Location:  ../../../telemedcine.php');
}

?>