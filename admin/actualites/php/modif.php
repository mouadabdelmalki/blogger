<?php
require_once '../../../configuration/session-verification.php';
require '../../../configuration/config.php';


if (isset($_POST['edit_art'])){

    $article_images = $_FILES["image_contenu"];
    $image_min = $_FILES["image_miniature"];

    $last_img_contenu=$_POST['art_img_cont'];
    $last_img_min=$_POST['art_img_min'];

     $id_art=$_POST['id_art'];

    if (!empty( $article_images)) {

        $allow_ext = array('png', 'jpg', 'jpeg', 'gif');

        $img = $_FILES['image_contenu'];
        $ext = strtolower(substr($img['name'], -3));
        $ext1 = strtolower(substr($img['name'], -4));
        if (in_array($ext, $allow_ext) or in_array($ext1, $allow_ext)) {
            $path_contenu = $last_img_contenu;
            unlink("../../../images/blog/"."$path_contenu");

            $article_images = move_uploaded_file($img['tmp_name'], "../../../images/blog/" . $img['name']);
            $article_images= $img['name'];


        } else {
            $article_images = $last_img_contenu;
        }
    }
    if (!empty($image_min)) {

        $allow_ext = array('png', 'jpg', 'jpeg', 'gif');

        $img_min = $_FILES['image_miniature'];
        $extmin = strtolower(substr($img_min['name'], -3));
        $extmin1 = strtolower(substr($img_min['name'], -4));
        if (in_array($extmin, $allow_ext) or in_array($extmin1, $allow_ext)) {
            $path_min = $last_img_min;
            echo '<h1>'.$path_min.'</h1>';
            unlink("../../../images/blog/min/"."$path_min");

            $image_mini = move_uploaded_file($img_min['tmp_name'], "../../../images/blog/min/" . $img_min['name']);
            $image_min= $img_min['name'];


        } else {
            $image_min = $last_img_min;
        }
    }



    $article_titre =trim(htmlspecialchars($_POST['article_titre'], ENT_QUOTES));
    $var1=array('&#039;',' ',',', '<','>','«','»','à','â','ç','é','è','ê','î','’');
    $var2=array('-','-','','','','','','a','a','c','e','e','e','i','');

    $url=strtolower(str_replace($var1,$var2,$article_titre));

    $article_resume = trim(htmlspecialchars($_POST['article_resume'], ENT_QUOTES));
    $article_contenu = trim(html_entity_decode(htmlspecialchars($_POST['article_contenu'], ENT_QUOTES)));


  $article_categorie =$_POST['article_categorie'];

  if(!empty($article_categorie)){

     $article_categorie =$_POST['article_categorie'];
      $id_categorie= $article_categorie;
    }else{
        $article_categorie='sans catégorie';
        $id_categorie='0';
   }

    $sqledit = "update actualites set titre='$article_titre', url='$url', resume='$article_resume', contenu='$article_contenu',image_contenu='$article_images', image_min='$image_min',categorie='$article_categorie', date_modif=CURRENT_TIMESTAMP where id_article='$id_art'";
    $req = mysqli_query($connect, $sqledit) or die('Erreur SQL!! <br />' . $sqledit . '<br />' . mysqli_error($connect));


    header('Location:../liste-articles.php');

}
?>