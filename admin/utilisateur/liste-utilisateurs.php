<?php
require_once '../../configuration/session-verification.php';
require '../../configuration/config.php';
require_once '../url.php';

$active_user='active';

$utilisateur= mysqli_query($connect,"select * from utilisateurs where id_user!='$user'");





?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <title>liste des utilisateurs</title>
    <link rel="shortcut icon" type="image/png" href="../../img/fcpo-icon.png"/>
    <!-- vendor css -->
    <link href="../../lib/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="../../lib/Ionicons/css/ionicons.css" rel="stylesheet">
    <link href="../../lib/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet">
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
        <a class="breadcrumb-item" href="../../admin/index.php">FCPO</a>
        <span class="breadcrumb-item active">Liste des utilisateurs</span>
    </nav>
</div><!-- kt-breadcrumb -->

<!-- ##### MAIN PANEL ##### -->
<div class="kt-mainpanel">
    <div class="kt-pagetitle">
        <h5>Liste des utilisateurs</h5>
    </div><!-- kt-pagetitle -->

    <div class="kt-pagebody">





        <div class="card pd-20 pd-sm-40 mg-t-50">
            <h6 class="card-body-title">Liste des utilisateurs</h6>

            <div class="table-responsive">
                <table class="table table-hover table-bordered mg-b-0">
                    <thead class="bg-info">
                    <tr>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Email</th>
                        <th>Rôle</th>
                        <th>Action</th>

                    </tr>
                    </thead>
                    <tbody>
                    <?php

                    while ($user=mysqli_fetch_array($utilisateur)) {

                        ?>

                        <tr>
                            <td>
                                <?php
                                echo $user["Nom"];

                                ?>
                            </td>
                            <td>
                                <?php
                                echo $user["Prenom"];

                                ?>
                            </td>
                            <td><?php
                                echo $user["Mail"];

                                ?> </td>
                            <td><?php
                                echo $user["profil"];

                                ?> </td>
                            <td>

                                &nbsp;&nbsp;                             &nbsp;&nbsp;


                                <a href="modifier-utilisateur.php?edit=<?php echo $user['id_user']; ?>"><i class="icon ion-edit"></i></a>
                                &nbsp;&nbsp;

                                <i class="fa fa-trash" data-toggle="modal" data-target="#modaldemo2<?php echo $user['id_user']; ?>">
                                </i>

                                <!-- confirmation de suppression -->
                                <div id="modaldemo2<?php echo $user['id_user']; ?>" class="modal fade">
                                    <div class="modal-dialog modal-sm" role="document">
                                        <div class="modal-content bd-0 tx-14">
                                            <div class="modal-header pd-x-20">
                                                <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Suppression</h6>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body pd-20">
                                                <p class="mg-b-5 text-center">Etes vous sûr de vouloir <br>supprimer cet utilisateur?</p>
                                            </div>
                                            <div class="modal-footer justify-content-center">
                                                <a type="button" href="php/traitement-user.php?del=<?php echo $user['id_user']; ?>" class="btn btn-default pd-x-20" > Supprimer</a>
                                                <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Annuler</button>
                                            </div>
                                        </div>
                                    </div><!-- modal-dialog -->
                                </div><!-- modal -->
                                &nbsp;&nbsp;


                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                    </tbody>
                </table>
            </div><!-- table-responsive -->

        </div><!-- card -->



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
<script src="../../lib/highlightjs/highlight.pack.js"></script>

<script src="../../js0/katniss.js"></script>
</body>
</html>
