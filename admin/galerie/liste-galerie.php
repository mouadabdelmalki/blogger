<?php

require_once '../../configuration/session-verification.php';
require '../../configuration/config.php';


$active_act = "active";

$galerie= mysqli_query($connect,"select * from galerie");

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="icon" href="../../images/logo.jpg">


    <title>Dr Moussa : Gestion des galeries</title>

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
        <span class="breadcrumb-item active">Liste des galeries</span>
    </nav>
</div><!-- kt-breadcrumb -->
<!-- ##### MAIN PANEL ##### -->
<div class="kt-mainpanel">
    <div class="kt-pagetitle" style="height: auto">
        <h5 class="col-md-9">Liste des galeries</h5>
        <div class="col-md-3 d-block">
            <a href="ajouter-galerie.php">
                <button class="btn btn-primary bd-0  mg-t-5 mg-b-5" >
                    <i class="icon ion-plus"></i>
                    &nbsp; Ajouter un nouveau galerie &nbsp;
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
                            <th class="wd-1p">Contenu</th>
                            <th class="wd-1p">Image</th> 
                            <th class="wd-1p">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php

                        while ($gal=mysqli_fetch_array($galerie)){

                        ?>
                        <tr>
                            <td>
                                <?php
                                echo $gal["titre"];

                                ?>
                            </td>
                            <td>
                                <?php
                                echo $gal["contenu"];

                                ?>
                            </td>
                            <td>
                                <?php
                                echo $gal["image"];

                                ?>

                            </td>
                            <td>
                                <a href="modifier-galerie.php?editgal=<?php echo $gal['id_galerie']; ?>"><i class="icon ion-edit" title="modifier galerie"></i></a>
                                &nbsp;&nbsp;

                                <i id="delete" class="fa fa-trash" data-toggle="modal" data-target="#modaldemo2<?php echo $gal['id_galerie']; ?>" title="supprimer galerie">
                                </i>

                                <!-- confirmation de suppression -->
                                <div id="modaldemo2<?php echo $gal['id_galerie']; ?>" class="modal fade">
                                    <div class="modal-dialog modal-sm" role="document">
                                        <div class="modal-content bd-0 tx-14">
                                            <div class="modal-header pd-x-20">
                                                <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Suppression</h6>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body pd-20">
                                                <p class="mg-b-5 text-center">Etes vous sûr de vouloir <br>supprimer cet galerie?</p>
                                            </div>
                                            <div class="modal-footer justify-content-center">
                                                <a type="button" href="php/traitement_galerie.php?del=<?php echo $gal['id_galerie'] ?>" class="btn btn-default pd-x-20" > Supprimer</a>
                                                <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Annuler</button>
                                            </div>
                                        </div>
                                    </div><!-- modal-dialog -->
                                </div><!-- modal -->
                                &nbsp;&nbsp;

                                <i id= "archive" class="icon ion-archive" data-toggle="modal" data-target="#modaldemo3<?php echo $gal['id_galerie']; ?>" title="archiver l'article"></i>


                                <!-- confirmation d'archivage -->
                                <div id="modaldemo3<?php echo $gal['id_galerie']; ?>" class="modal fade">
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
                                                <a type="button" href="articles_archives.php?archiv=<?php echo $gal['id_galerie']; ?>" class="btn btn-default pd-x-20" >Archiver</a>
                                                <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Annuler</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

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
