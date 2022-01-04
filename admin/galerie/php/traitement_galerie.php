<?php


require_once '../../../configuration/session-verification.php';
require '../../../configuration/config.php';


if(isset($_POST['add_gal'])){

    $allow_ext = array('png', 'jpg', 'jpeg', 'gif');

    $img = $_FILES['image_contenu'];
    $ext = strtolower(substr($img['name'], -3));
    $ext1= strtolower(substr($img['name'], -4));
    if(in_array($ext, $allow_ext)or in_array($ext1,$allow_ext)){
        $galerie_images= move_uploaded_file($img['tmp_name'], "../../../images/galerie/" . $img['name']);

    } elseif (empty($galerie_images))
    {
        $msge= "";
    }
    else{
        $msge = "Votre fichier n'est pas une image";
    }

    



    if (!empty($_POST['galerie_titre']) AND !empty($_POST['galerie_contenu'])) {
        $galerie_titre =trim(htmlspecialchars($_POST['galerie_titre'], ENT_QUOTES));
        $var1=array('&#039;',' ',',', '<','>','«','»','à','â','ç','é','è','ê','î','’');
        $var2=array('-','-','','','','','','a','a','c','e','e','e','i','');


        $url=strtolower(str_replace($var1,$var2,$galerie_titre));


        $galerie_contenu =trim(html_entity_decode(htmlspecialchars($_POST['galerie_contenu'], ENT_QUOTES))) ;
        $galerie_images= $_FILES['image_contenu']['name'];
       

        $sql = "insert into galerie (titre,contenu,image) values ('$galerie_titre', '$galerie_contenu', '$galerie_images')";
        $req = mysqli_query($connect, $sql) or die('Erreur SQL!! <br />' . $sql . '<br />' . mysqli_error($connect));

//todo recuper email
        
//send artice to emails
        header('Location:  ../gestion-galerie.php');

    } else {
        $msgerreur = 'Veuillez remplir les champs obligatoire';
    }

}



if(isset($_GET['del'])){
    $delgal=intval($_GET['del']);
    // $delimgcont=$_GET['imgcont'];
    $gal= mysqli_query($connect,"select * from galerie where id_galerie='$delgal'")or die('Erreur SQL!! <br />' . $gal . '<br />' . mysqli_error($connect));
    $galer=mysqli_fetch_array($gal);

    // $img ="../../../images/galerie/".$delimgcont;
    // unlink($img);
    


    $reqdel = "delete from galerie where id_galerie='$delgal'";
    $reqdelimg = "delete from img_galerie where id_galerie='$delgal'" ;
    $result1 = mysqli_query($connect, $reqdel) or die('Erreur SQL!! <br />' . $reqdel . '<br />' . mysqli_error($connect));
    $result2 = mysqli_query($connect, $reqdelimg) or die('Erreur SQL!! <br />' . $reqdelimg . '<br />' . mysqli_error($connect));
   

    header('Location: ../liste-galerie.php');

}




?>