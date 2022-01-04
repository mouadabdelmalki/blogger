<?php

require_once '../../configuration/session-verification.php';
require '../../configuration/config.php';


$active_act = "active";

$rdv= mysqli_query($connect,"select * from bookings");

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="../../images/logo.jpg">
    <title>Dr Moussa : Gestion des rendez-vous</title>

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
        <span class="breadcrumb-item active">Liste des rendez-vous</span>
    </nav>
</div><!-- kt-breadcrumb -->
<!-- ##### MAIN PANEL ##### -->
<div class="kt-mainpanel">
    <div class="kt-pagetitle" style="height: auto">
        <h5 class="col-md-9" style="padding: 10px 0;">Liste des rendez-vous</h5>
    </div><!-- kt-pagetitle -->
    <div class="kt-pagebody">

        <div class="table-responsive">

            <div class="card pd-2 pd-sm-40">
                <div class="table-wrapper mg-b-20 mg-sm-b-30">
                    <table id="datatable1" class="table display responsive nowrap">
                        <thead>
                        <tr>
                            <th class="wd-1p">nom complet</th>
                            <th class="wd-1p">date</th>
                            <th class="wd-1p">seance</th>
                            <th class="wd-1p">Email</th>
                            <th class="wd-1p">ACTION</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php

                        while ($gal=mysqli_fetch_array($rdv)){

                        ?>
                        <tr>
                            <td>
                                <?php
                                echo $gal["name"];

                                ?>
                            </td>
                            <td>
                                <?php
                                echo $gal["date"];

                                ?>
                            </td>
                            <td>
                                <?php
                                echo $gal["timeslot"];

                                ?>

                            </td>
                            <td>
                            <?php
                                echo $gal["email"];
                            ?>

                                <!-- confirmation de suppression -->
                                <!-- confirmation d'archivage -->

                            </td>
                            <td>
                            <?php
                                echo "<h6> - </h6> ";
                            ?>
                                <!-- confirmation de suppression -->
                                <!-- confirmation d'archivage -->

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
