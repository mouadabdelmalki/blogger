<?php

require '../../configuration/config.php';
require_once '../url.php';

$active_user='active';

$authen= mysqli_query($connect,"select Mail from utilisateurs");
$identificateur=mysqli_fetch_all($authen);


foreach ($identificateur as $item) {
    if (in_array($_POST['email'], $item)) {

        $email = $_POST['email'];
        $req = mysqli_query($connect, "select * from utilisateurs where Mail='$email'");
        $ident = mysqli_fetch_assoc($req);
        $result = $ident['id_user'];
        $lien = "https://www.gc-terrasses.fr/gcterrasses-test/admin_gc_terrasses/admin/utilisateur/modif-mot-passe-oublier.php?id=".$result;



        $to =$_POST['email'];
        $from ="admin@admin.ma";
        $message = "&nbsp;&nbsp;&nbsp;&nbsp;<strong>Nom: </strong>".$ident['Nom'];
        $message .= "&nbsp;&nbsp;&nbsp;<strong> </strong>".$ident['Prenom']."<br />";
        $message .= "&nbsp;&nbsp;&nbsp;&nbsp; <strong>Email: </strong>".$_POST['email']."<br /><br />";
        $message .= "&nbsp;&nbsp;&nbsp;&nbsp; Il semble que vous avez oublié votre mot de passe d'authentification pour l'accès à votre site d'administration. <br />";
        $message .= "&nbsp;&nbsp;&nbsp;&nbsp; Nous vous invitons à rejoindre le lien ci-dessus pour pouvoir modifier votre mot de passe :<br />";
        $message .= $lien;
        $subject = 'Récupération de mot de passe';
        $headers = "From: ".$from."\n";
        $headers .= "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";

        $send =	mail($to,$subject,$message,$headers);
        header('location:'.$url.'app/page-authentification.php?error=5');

        break;

    } else {


        header('location:'.$url.'app/page-authentification.php?error=6');

    }
}
?>
