<?php
require_once '../../configuration/session-verification.php';
require '../../configuration/config.php';
require_once '../../url.php';

$active_act = "active";


$articleArchivee=mysqli_query($connect,"select * from actualites where archive='1'  ")or die('Erreur SQL!! <br/>'.$articleArchive.'<br/>'.mysqli_error($connect));

if(isset($_GET['archiv'])){

    $archivArt=intval($_GET['archiv']);
    $articleArchive=mysqli_query($connect,"select * from actualites where id_article='$archivArt'  ")or die('Erreur SQL!! <br/>'.$articleArchive.'<br/>'.mysqli_error($connect));
    $article=mysqli_fetch_assoc($articleArchive);


    //archiver image contenu
    $image='../../../images/blog/'.$article["image_contenu"];
    $newloccontenu='../../../images/blog/archive-blog/'.$article["image_contenu"];
    $imgloc=rename($image,$newloccontenu);


    //archiver image miniature
    $imagemin='../../../images/blog/min/'.$article["image_min"];
    $newlocmin="../../../images/blog/archive-blog/min/".$article["image_min"];
    $imgminloc=rename($imagemin,$newlocmin);


    $artArchiv=mysqli_query($connect, "update actualites set archive='1', date_archivage=CURRENT_TIMESTAMP  where id_article='$archivArt'")or die('Erreur SQL!! <br/>'.$artArchiv.'<br/>'.mysqli_error($connect));

  header('Location: articles_archives.php');



}elseif (isset($_GET['desarchiv'])){
    $desarchivArt=intval($_GET['desarchiv']);

    $articleDesarchive=mysqli_query($connect,"select * from actualites where id_article='$desarchivArt'  ")or die('Erreur SQL!! <br/>'.$articleDesarchive.'<br/>'.mysqli_error($connect));
    $article2=mysqli_fetch_assoc($articleDesarchive);



    //désarchiver image contenu
    $imgdesarchiv='../../../images/blog/archive-blog/'.$article2["image_contenu"];
    $newloccontenudes='../../../images/blog/'.$article2["image_contenu"];
    $imglocdes=rename($imgdesarchiv,$newloccontenudes);

    //désarchiver image miniature
    $imgmindesarchiv='../../../images/blog/archive-blog/min/'.$article2["image_min"];
    $newlocmindes='../../../images/blog/min/'.$article2["image_min"];
    $imgminlocdes=rename($imgmindesarchiv,$newlocmindes);

    $artDesarchiv=mysqli_query($connect, "update actualites set archive='0' where id_article='$desarchivArt'")or die('Erreur SQL!! <br/>'.$artDesarchiv.'<br/>'.mysqli_error($connect));


  header('Location: liste-articles.php');

}


?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Gestion des articles</title>

    <!-- vendor css -->
    <link href="<?=$url?>lib/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="<?=$url?>lib/Ionicons/css/ionicons.css" rel="stylesheet">
    <link href="<?=$url?>lib/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet">
    <link href="<?=$url?>lib/rickshaw/rickshaw.min.css" rel="stylesheet">
    <link href="<?=$url?>lib/highlightjs/github.css" rel="stylesheet">
    <link href="<?=$url?>lib/datatables/jquery.dataTables.css" rel="stylesheet">


    <!-- Katniss CSS -->
    <link rel="stylesheet" href="<?=$url?>css01/katniss.css">
</head>

<body>


<?php
require_once '../header.php';
?>

<div class="kt-breadcrumb">
    <nav class="breadcrumb">
        <a class="breadcrumb-item" href="<?=$url?>admin/index.php">FCPO</a>
        <span class="breadcrumb-item active">Liste des articles archivés</span>
    </nav>
</div><!-- kt-breadcrumb -->
<!-- ##### MAIN PANEL ##### -->
<div class="kt-mainpanel">
    <div class="kt-pagetitle">
        <h5 class="col-md-9">Liste des articles archivés</h5>
        <div class="col-md-3">

            <a href="liste-articles.php">
                <button class="btn btn-primary bd-0 mg-md-l-10 mg-t-20" >
                    <i class="icon ion-plus"></i>
                    Liste des articles
                </button>
            </a>
        </div>
    </div><!-- kt-pagetitle -->
    <div class="kt-pagebody">

        <div class="table-responsive">

            <div class="card pd-20 pd-sm-40">

                <div class="table-wrapper mg-b-20 mg-sm-b-30">
                    <table id="datatable1" class="table display responsive nowrap">
                        <thead>
                        <tr>
                            <th class="wd-15p">Titre</th>
                            <th class="wd-15p">Catégorie</th>
                            <th class="wd-20p">Date de publication</th>
                            <th class="wd-20p">Date de modification</th>
                            <th class="wd-20p">Date d'archivage</th>
                            <th class="wd-15p"></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php  while ($art=mysqli_fetch_array($articleArchivee)){ ?>

                        <tr>
                            <td>
                                <?php
                                echo $art["titre"];

                                ?>
                            </td>
                            <td>
                                <?php
                                if($art["categorie"]=='sans catégorie'){?>
                                    <div id="cat" style="color:red;">
                                        <?php
                                        echo $art["categorie"];
                                        ?>
                                    </div>
                                    <?php
                                }else{
                                    $id=$art["categorie"];

                                    $categorie1= mysqli_query($connect,"select libelle from categories where id_cat='$id'");
                                    $mycateg=mysqli_fetch_assoc($categorie1);
                                    echo $mycateg['libelle'];
                                }
                                ?>
                                
                            </td>
                            <td><?php
                                echo $art["date_pub"];

                                ?> </td>
                            <td><?php
                                echo $art["date_modif"];

                                ?> </td>
                            <td><?php
                                echo $art["date_archivage"];

                                ?></td>
                            <td>

                                <a href="?desarchiv=<?php echo $art['id_article']; ?>"><i class="icon ion-filing" title="désarchiver"></i></a>
                                &nbsp;&nbsp;

                                <i id="" class="fa fa-trash" data-toggle="modal" data-target="#modaldemo2<?php echo $art['id_article']; ?>" title="supprimer l'article">
                                </i>

                                <!-- confirmation de suppression -->
                                <div id="modaldemo2<?php echo $art['id_article']; ?>" class="modal fade">
                                    <div class="modal-dialog modal-sm" role="document">
                                        <div class="modal-content bd-0 tx-14">
                                            <div class="modal-header pd-x-20">
                                                <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Suppression</h6>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body pd-20">
                                                <p class="mg-b-5 text-center">Etes vous sûr de vouloir <br>supprimer cet article?</p>
                                            </div>
                                            <div class="modal-footer justify-content-center">
                                                <a type="button" href="php/traitement_article.php?delarchiv=<?php echo $art['id_article'] ?>&imgmin=<?php echo $art['image_min'] ?>&imgcont=<?php echo $art['image_contenu'] ?>" class="btn btn-default pd-x-20" > Supprimer</a>
                                                <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Annuler</button>
                                            </div>
                                        </div>
                                    </div><!-- modal-dialog -->
                                </div><!-- modal -->

                            </td>
                            <?php
                            }
                            ?>
                        </tr>

                        </tbody>
                    </table>
                </div><!-- table-wrapper -->
            </div><!-- card -->
        </div><!-- table-responsive-->

    </div><!-- kt-pagebody -->

    <?php
    require_once '../footer.php';
    ?>
</div><!-- kt-mainpanel -->


<script src="<?=$url?>lib/jquery/jquery.js"></script>
<script src="<?=$url?>lib/popper.js/popper.js"></script>
<script src="<?=$url?>lib/bootstrap/bootstrap.js"></script>
<script src="<?=$url?>lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>
<script src="<?=$url?>lib/moment/moment.js"></script>
<script src="<?=$url?>lib/d3/d3.js"></script>
<script src="<?=$url?>lib/rickshaw/rickshaw.min.js"></script>

<script src="<?=$url?>lib/highlightjs/highlight.pack.js"></script>

<script src="<?=$url?>js0/katniss.js"></script>
<script src="<?=$url?>js0/ResizeSensor.js"></script>
<script src="<?=$url?>js0/dashboard.js"></script>

<script src="<?=$url?>lib/datatables/jquery.dataTables.js"></script>
<script src="<?=$url?>lib/datatables-responsive/dataTables.responsive.js"></script>
<script src="<?=$url?>lib/select2/js/select2.min.js"></script>
<script>$('#datatable1').DataTable({
        responsive: true,
        language: {
            searchPlaceholder: 'Chercher...',
            sSearch: '',
            lengthMenu: '_MENU_ articles/page',
        }
    });</script>

</body>
</html>
