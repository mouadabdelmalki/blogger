<?php
require_once '../../../configuration/session-verification.php';
require '../../../configuration/config.php';


if (isset($_POST['ajout_catg'])) {
    if (!empty($_POST['categorie_nom'])) {

        $categorie_nom = trim(htmlspecialchars($_POST['categorie_nom'], ENT_QUOTES));

        $req2= mysqli_query($connect, 'select * from categories') or die('Erreur SQL!! <br />' . $req2 . '<br />' . mysqli_error($connect));
        $var= mysqli_num_rows($req2);
        if($var==0){
            $req3= mysqli_query($connect, "insert into categories (libelle) values ('$categorie_nom')") or die('Erreur SQL!! <br />' . $req3 . '<br />' . mysqli_error($connect));
            header('Location:  ../liste-categorie.php');

        }else{
            $sql = "insert into categories (libelle) select distinct '$categorie_nom'from categories where not exists (select distinct libelle from categories where libelle='$categorie_nom')";
            $req = mysqli_query($connect, $sql) or die('Erreur SQL!! <br />' . $req . '<br />' . mysqli_error($connect));

            if($req){
                $insert_id = mysqli_insert_id($connect);
                if ($insert_id !='') {
                    header('Location:  ../liste-categorie.php');
                } else {

                    header('Location:  ../liste-categorie.php?error=1');
                }
            }
        }


    }
}

if (isset($_POST['modif_catg'])){

    $id_categ=$_POST['id_categ'];
    $categorie_nom = htmlspecialchars($_POST['categorie_nom'],ENT_QUOTES);

    $sqls = "select * from categories where libelle='$categorie_nom'";
    $reqs = mysqli_query($connect, $sqls) or die('Erreur SQL!! <br />' . $reqs . '<br />' . mysqli_error($connect));
    $result=mysqli_num_rows($reqs);

    if($result==0){
        $sqledit = "update categories set libelle='$categorie_nom' where id_cat='$id_categ'";
        $req = mysqli_query($connect, $sqledit) or die('Erreur SQL!! <br />' . $sqledit . '<br />' . mysqli_error($connect));

          $libcat=$_POST['categ'];
          $sql = "update actualites set categorie =( select libelle from categories c where c.libelle='$categorie_nom') where categorie='$libcat'";
          $requette = mysqli_query($connect, $sql) or die('Erreur SQL!! <br />' . $sql . '<br />' . mysqli_error($connect));


         header('Location:  ../liste-categorie.php');

    }else{
        header('Location:  ../liste-categorie.php?error=1');

    }
}
?>

