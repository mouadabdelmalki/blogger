<?php


require_once '../../../configuration/session-verification.php';
require '../../../configuration/config.php';


if(isset($_POST['add_art'])){
    
    $allow_ext = array('png', 'jpg', 'jpeg', 'gif');

    $img_min=$_FILES['image_miniature'];
    $extimgmin = strtolower(substr($img_min['name'], -3));
    $extm1=strtolower(substr($img_min['name'], -4));
    if(in_array($extimgmin, $allow_ext) or in_array($extm1, $allow_ext)){
        $image_min= move_uploaded_file($img_min['tmp_name'], "../../../images/blog/min/" . $img_min['name']);

    } elseif (empty($image_min))
    {
        $msge= "Veuillez saisir une image pour la miniature";
    }
    else{
        $msge = "Votre fichier n'est pas une image";
    }


    $img = $_FILES['image_contenu'];
    $ext = strtolower(substr($img['name'], -3));
    $ext1= strtolower(substr($img['name'], -4));
    if(in_array($ext, $allow_ext)or in_array($ext1,$allow_ext)){
        $article_images= move_uploaded_file($img['tmp_name'], "../../../images/blog/" . $img['name']);

    } elseif (empty($article_images))
    {
        $msge= "";
    }
    else{
        $msge = "Votre fichier n'est pas une image";
    }



    if (!empty($_POST['article_titre']) AND !empty($_POST['article_resume'])) {
        $article_titre =trim(htmlspecialchars($_POST['article_titre'], ENT_QUOTES));
        $var1=array('&#039;',' ',',', '<','>','«','»','à','â','ç','é','è','ê','î','’');
        $var2=array('-','-','','','','','','a','a','c','e','e','e','i','');


        $url=strtolower(str_replace($var1,$var2,$article_titre));

        
      
        $article_resume =trim(html_entity_decode(htmlspecialchars($_POST['article_resume'], ENT_QUOTES))) ;
        $article_contenu = trim(html_entity_decode(htmlspecialchars($_POST['article_contenu'], ENT_QUOTES)));
        $article_images= $_FILES['image_contenu']['name'];
        $image_min= $_FILES['image_miniature']['name'];

        $article_categorie =$_POST['article_categorie'];

        if(!empty($article_categorie)){

            $article_categorie =$_POST['article_categorie'];
            $id_categorie= $article_categorie;
        }else{
            $article_categorie='sans catégorie';
            $id_categorie='0';
        }
       
        $date=date("Y-m-d");
        if(isset($_FILES['upload']['name']))
{
 $file = $_FILES['upload']['tmp_name'];
 $file_name = $_FILES['upload']['name'];
 $file_name_array = explode(".", $file_name);
 $extension = end($file_name_array);
 $new_image_name = rand() . '.' . $extension;
 chmod('upload', 0777);
 $allowed_extension = array("jpg", "gif", "png");
 if(in_array($extension, $allowed_extension))
 {
  move_uploaded_file($file, 'upload/' . $new_image_name);
  $function_number = $_GET['CKEditorFuncNum'];
  $url = 'upload/' . $new_image_name;
  $message = '';
  echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($function_number, '$url', '$message');</script>";
 }
}
        $sql = "insert into actualites (titre, url,auteur, resume, contenu,date_pub, categorie, image_contenu, image_min,archive, id_categorie) values ('$article_titre','$url', '$iduser', '$article_resume', '$article_contenu', '$date','$article_categorie', '$article_images', '$image_min', '0', '$id_categorie' )";
        $req = mysqli_query($connect, $sql) or die('Erreur SQL!! <br />' . $sql . '<br />' . mysqli_error($connect));

//todo recuper email
        
//send artice to emails
        header('Location:  ../liste-articles.php');

    } else {
        $msgerreur = 'Veuillez remplir les champs obligatoire';
    }

}



if(isset($_GET['del'])){
    $delart=intval($_GET['del']);
     $delimgcont=$_GET['imgcont'];
     $delimgmin=$_GET['imgmin'];
    $art= mysqli_query($connect,"select * from actualites where id_article='$delart'")or die('Erreur SQL!! <br />' . $art . '<br />' . mysqli_error($connect));
    $artic=mysqli_fetch_array($art);


    $img="../../../../images/blog/".$delimgcont;
    unlink("$img");

    $imgmin="../../../../images/blog/min/".$delimgmin;
    unlink("$imgmin");


    $reqdel = "delete from actualites where id_article='$delart'";
    $result1 = mysqli_query($connect, $reqdel) or die('Erreur SQL!! <br />' . $reqdel . '<br />' . mysqli_error($connect));


    header('Location: ../liste-articles.php');

}

if(isset($_GET['delarchiv'])){
    $delart=intval($_GET['delarchiv']);
    $delimgcont=$_GET['imgcont'];
    $delimgmin=$_GET['imgmin'];
    $art= mysqli_query($connect,"select * from actualites where id_article='$delart'")or die('Erreur SQL!! <br />' . $art . '<br />' . mysqli_error($connect));
    $artic=mysqli_fetch_array($art);


    $img="../../../../images/blog/archive-blog/".$delimgcont;
    unlink("$img");

    $imgmin="../../../../images/blog/archive-blog/min/".$delimgmin;
    unlink("$imgmin");


    $reqdel = "delete from actualites where id_article='$delart'";
    $result1 = mysqli_query($connect, $reqdel) or die('Erreur SQL!! <br />' . $reqdel . '<br />' . mysqli_error($connect));


    header('Location: ../liste-articles.php');

}


?>