<?php

require_once '../../configuration/session-verification.php';
require '../../configuration/config.php';


$active_act = "active";

$article= mysqli_query($connect,"select * from actualites where archive!='1' order by date_pub desc ");

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="icon" href="../../img/fcpo-icon.png" sizes="192x192">


    <title>Dr Moussa : Gestion des articles</title>

    <!-- vendor css -->
    <link href="../../lib/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="../../lib/Ionicons/css/ionicons.css" rel="stylesheet">
    <link href="../../lib/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet">
    <link href="../../>lib/rickshaw/rickshaw.min.css" rel="stylesheet">
    <link href="../../lib/highlightjs/github.css" rel="stylesheet">

    <!-- Katniss CSS -->
    <link rel="stylesheet" href="../../css01/katniss.css">
</head>

<body>


<?php
require_once '../header.php';
?>

<div class="kt-breadcrumb">
    <nav class="breadcrumb">
        <a class="breadcrumb-item" href="<?=$url?>admin/index.php">FCPO</a>
        <span class="breadcrumb-item active">Liste des articles</span>
    </nav>
</div><!-- kt-breadcrumb -->
<!-- ##### MAIN PANEL ##### -->
<div class="kt-mainpanel">
    <div class="kt-pagetitle" style="height: auto">
        <h5 class="col-md-9">Liste des articles</h5>
        <div class="col-md-3 d-block">
            <a href="ajouter-article.php">
                <button class="btn btn-primary bd-0  mg-t-5 mg-b-5" >
                    <i class="icon ion-plus"></i>
                    &nbsp; Ajouter un nouveau article &nbsp;
                </button>
            </a>

                <!-- <a href="articles_archives.php">
                    <button class="btn btn-dark mg-t-5 bd-0 mg-b-5" >
                        <i class="icon ion-archive"></i>
                        Liste des articles archivés
                    </button>
                </a> -->

        </div>
    </div><!-- kt-pagetitle -->
    <div class="kt-pagebody">

        <div class="table-responsive">

            <div class="card pd-2 pd-sm-40">
                <div class="table-wrapper mg-b-20 mg-sm-b-30">
                    <table id="datatable1" class="table display responsive nowrap">
                        <thead>
                        <tr>
                            <th class="wd-1p">Titre</th>
                            <th class="wd-1p">Auteur</th>
                            <th class="wd-1p">Catégorie</th> 
                            <th class="wd-1p">Date de publication</th>
                            <th class="wd-1p">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php

                        while ($art=mysqli_fetch_array($article)){

                        ?>
                        <tr>
                            <td>
                                <?php
                                echo $art["titre"];

                                ?>
                            </td>
                            <td>
                                <?php
                                echo $art["auteur"];

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
                                $myDateTime = DateTime::createFromFormat('Y-m-d', $art["date_pub"]);
                                $formattedweddingdate = $myDateTime->format('d-m-Y');
                                echo $formattedweddingdate;

                                ?></td>

                            <td >

                                <a href="modifier-article.php?editart=<?php echo $art['id_article']; ?>"><i class="icon ion-edit" title="modifier l'article"></i></a>
                                &nbsp;&nbsp;

                                <i id="delete" class="fa fa-trash" data-toggle="modal" data-target="#modaldemo2<?php echo $art['id_article']; ?>" title="supprimer l'article">
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
                                                <a type="button" href="php/traitement_article.php?del=<?php echo $art['id_article'] ?>&imgmin=<?php echo $art['image_min'] ?>&imgcont=<?php echo $art['image_contenu'] ?>" class="btn btn-default pd-x-20" > Supprimer</a>
                                                <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Annuler</button>
                                            </div>
                                        </div>
                                    </div><!-- modal-dialog -->
                                </div><!-- modal -->
                                &nbsp;&nbsp;

                                <!-- <i id= "archive" class="icon ion-archive" data-toggle="modal" data-target="#modaldemo3<?php echo $art['id_article']; ?>" title="archiver l'article"></i> -->


                                <!-- confirmation d'archivage -->
                                <!-- <div id="modaldemo3<?php echo $art['id_article']; ?>" class="modal fade">
                                    <div class="modal-dialog modal-sm" role="document">
                                        <div class="modal-content bd-0 tx-14">
                                            <div class="modal-header pd-x-20">
                                                <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Archivage</h6>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body pd-20">
                                                <p class="mg-b-5 text-center">Etes vous sûr de vouloir <br>archiver cet article?</p>
                                            </div>
                                            <div class="modal-footer justify-content-center">
                                                <a type="button" href="articles_archives.php?archiv=<?php echo $art['id_article']; ?>" class="btn btn-default pd-x-20" >Archiver</a>
                                                <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Annuler</button>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->

                            </td>
                            <?php
                            }
                            echo "<br>";
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


<script src="../../lib/jquery/jquery.js"></script>
<script src="../../lib/popper.js/popper.js"></script>
<script src="../../lib/bootstrap/bootstrap.js"></script>
<script src="../../lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>
<script src="../../lib/moment/moment.js"></script>
<script src="../../lib/d3/d3.js"></script>
<script src="../../lib/rickshaw/rickshaw.min.js"></script>

<script src="../../lib/highlightjs/highlight.pack.js"></script>

<script src="../../js0/katniss.js"></script>
<script src="../../js0/ResizeSensor.js"></script>
<script src="../../js0/dashboard.js"></script>

<script src="../../lib/datatables/jquery.dataTables.js"></script>
<script src="../../lib/datatables-responsive/dataTables.responsive.js"></script>
<script src="../../lib/select2/js/select2.min.js"></script>


<script>


    $('#datatable1').DataTable({
        if(responsive=true){
            $('.modal-dialog').show();
        },
        language: {
            searchPlaceholder: 'Chercher...',
            sSearch: '',
            lengthMenu: '_MENU_ articles/page',
        },

    });

</script>

</body>
</html>
