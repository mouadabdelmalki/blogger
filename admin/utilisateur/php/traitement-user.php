<?php
require_once '../../../configuration/session-verification.php';
require '../../../configuration/config.php';
require_once '../../url.php';

if (isset($_GET['del'])){
    $deluser=intval($_GET['del']);

    $reqdel = "delete from utilisateurs where id_user='$deluser'";
    $result1 = mysqli_query($connect, $reqdel) or die('Erreur SQL!! <br />' . $reqdel . '<br />' . mysqli_error($connect));
    header('Location: ../liste-utilisateurs.php');
}
?>