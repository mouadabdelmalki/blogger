<?php
require_once '../../configuration/session-verification.php';
require '../../configuration/config.php';


$active_act = "active";

$error=isset($_GET['error']) ? $_GET['error']:'';


$categorie= mysqli_query($connect,"select * from categories order by libelle ASC");

if (isset($_GET['del'])){
    $delCatg=intval($_GET['del']);

    $reqdel = "delete from categories where id_cat='$delCatg'";
    $result1 = mysqli_query($connect, $reqdel) or die('Erreur SQL!! <br />' . $reqdel . '<br />' . mysqli_error($connect));
    header('Location: liste-categorie.php');
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="icon" href="../../img/fcpo-icon.png" sizes="192x192">


    <title>Al Mourchid : Gestion des catégories</title>

    <!-- vendor css -->
    <link href="../../lib/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="../../lib/Ionicons/css/ionicons.css" rel="stylesheet">
    <link href="../../lib/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet">
    <link href="../../lib/rickshaw/rickshaw.min.css" rel="stylesheet">
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
        <span class="breadcrumb-item active">Liste des catégories</span>
    </nav>
</div><!-- kt-breadcrumb -->
<!-- ##### MAIN PANEL ##### -->
<div class="kt-mainpanel">
    <div class="kt-pagetitle">
        <h5 class="col-md-9">Liste des catégories</h5>
       <div class="col-md-3">
           <a href="" id="add" data-toggle="modal" data-target="#ajouter-categ"  >
               <button class="btn btn-primary bd-0 mg-md-l-10 mg-t-20" >
                   <i class="icon ion-plus"></i>
                   Ajouter une nouvelle catégorie
               </button>
           </a>
           <div id="ajouter-categ" class="modal fade">
               <div class="modal-dialog modal-lg" role="document">
                   <div class="modal-content tx-size-sm">
                       <div class="modal-header pd-x-20">
                           <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Ajouter une catégorie</h6>
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                               <span aria-hidden="true">&times;</span>
                           </button>
                       </div>
                       <form action="php/traitement_categorie.php" method="post"  enctype="multipart/form-data">
                           <div class="modal-body pd-20">
                               <div class="d-sm-block wd-sm-300">
                                   <div class="form-group mg-b-0">

                                       <label>Catégorie  : <span class="tx-danger">*</span></label>
                                       <input id="categorie" type="text"  name="categorie_nom" class="champ form-control wd-200 wd-xs-250" placeholder="Nom du catégorie" >
                                   </div><!-- form-group -->
                                   <div id="erreur" style="color: red"> Veuillez indiquer un nom à la catégorie</div>

                               </div>
                           </div>

                           <div class="modal-footer">
                               <button id="envoi" type="submit" name="ajout_catg" class="btn btn-default pd-x-20">Ajouter</button>
                               <button id="rafraichir" type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Annuler</button>
                           </div>
                       </form>
                   </div>
               </div>
           </div>

       </div>
    </div><!-- kt-pagetitle -->
    <div class="kt-pagebody">

        <div class="table-responsive">

            <table class="table table-hover table-bordered table-primary mg-b-0">
                <thead>
                <tr>
                    <th>Catégorie</th>
                    <th></th>
                </tr>
                </thead>

                <?php  while ($cat=mysqli_fetch_array($categorie)){
                     $id_categ=$cat["id_cat"];
                     $libelle_categ=$cat["libelle"];
                $sql = " select id_cat from categories where id_cat IN( select id_categorie from actualites)";
                $req = mysqli_query($connect, $sql) or die('Erreur SQL!! <br />' . $sql . '<br />' . mysqli_error($connect));

                    ?>
                <tbody>

                <tr>

                    <td>  <?=$libelle_categ  ?>  </td>
                    <td>&nbsp;&nbsp;<a href="#"  data-toggle="modal" data-target="#modifier-categ" onclick="modifier('<?=$id_categ ?>','<?=$libelle_categ?>')"><i class="icon ion-edit"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                        <?php
                        $idcat=$cat["id_cat"];
                        $sql1 = " select distinct libelle from categories c, actualites ac where id_cat IN( select categorie from actualites ac, categories c where ac.categorie='$idcat')";
                        $req1 = mysqli_query($connect, $sql1) or die('Erreur SQL!! <br />' . $sql1 . '<br />' . mysqli_error($connect));

                        $resul=mysqli_fetch_all($req1);

                        if(!$resul){ ?>
                                <i class="fa fa-trash" data-toggle="modal"
                                   data-target="#modaldemo2<?php echo $cat['id_cat']; ?>"></i>
                        <?php } ?>

                        <!-- confirmation de suppression -->
                        <div id="modaldemo2<?php echo $cat['id_cat']; ?>" class="modal fade">
                            <div class="modal-dialog modal-sm" role="document">
                                <div class="modal-content bd-0 tx-14">
                                    <div class="modal-header pd-x-20">
                                        <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Suppression</h6>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body pd-20">
                                        <p class="mg-b-5">Etes vous sûr de vouloir supprimer cette catégorie?</p>
                                    </div>
                                    <div class="modal-footer justify-content-center">
                                        <a type="button" href="?del=<?php echo $cat['id_cat']; ?>" class="btn btn-default pd-x-20" > Supprimer</a>
                                        <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Annuler</button>
                                    </div>
                                </div>
                            </div><!-- modal-dialog -->
                        </div><!-- modal -->

                    </td>

                    <div id="modifier-categ" class="modal fade">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content tx-size-sm">
                                <div class="modal-header pd-x-20">
                                    <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Modifier la catégorie</h6>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="php/traitement_categorie.php" method="post"  enctype="multipart/form-data">
                                    <div class="modal-body pd-20">
                                        <div class="d-sm-flex wd-sm-300">
                                            <div class="form-group mg-b-0">
                                                <input type="text" id="id_categ" name="id_categ" hidden>
                                                <input type="text" id="categ" name="categ" hidden>
                                                <label>Catégorie  : <span class="tx-danger">*</span></label>
                                                <input type="text" id="libelle_categ" name="categorie_nom" class="form-control wd-200 wd-xs-250" placeholder="Nom du catégorie" >
                                            </div><!-- form-group -->

                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="submit" name="modif_catg" class="btn btn-default pd-x-20">Modifier</button>
                                        <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Annuler</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </tr>
                </tbody>
                <?php } ?>
            </table>
            <?php
            switch ($error){
            case 1:
                ?>
                <div id="duplicat" class="alert alert-danger mg-t-8" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <div class=" align-items-center justify-content-start">
                        <i class="icon ion-ios-close alert-icon tx-20"></i>
                        <strong class="d-sm-inline-block-force">Erreur !!</strong>
                        <?php
                        echo ' Cette catégorie existe déjà, Veulliez indiquer un autre nom à votre catégorie!!';
                        break;
                        ?>
                    </div><!-- d-flex -->

                </div><!-- alert -->


            <?php }?>
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

<script>
    $("#duplicat").fadeTo(4000, 500).slideUp(500, function(){
        $("#duplicat").slideUp(4000);
    });
        $('#add').click(function(){

        var  $categorie = $('#categorie'),
            $envoi = $('#envoi'),
            $reset = $('#rafraichir'),
            $erreur = $('#erreur').hide(),

            $champ = $('.champ');


        $envoi.click(function(e){

            if(!verifier($categorie)){
                e.preventDefault();
            }

        });

        $reset.click(function(){
            $champ.css({
                borderColor : '#ccc',
                color : '#555'
            });
        });

        function verifier(champ){
            if(champ.val() == ""){
                champ.css({
                    borderColor : 'red',
                });
                $erreur.show();
                return false;
            }else{
                champ.css({
                    borderColor : 'green',
                });
                $erreur.hide();
                return true;

            }

        }

    });

</script>

<script>
    function modifier(id,libelle) {
        document.getElementById('id_categ').value = id;
        document.getElementById('libelle_categ').value = libelle;
        document.getElementById('categ').value = libelle;
    }

</script>



</body>
</html>