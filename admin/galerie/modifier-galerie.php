<?php

require_once '../../configuration/session-verification.php';
require '../../configuration/config.php';
require_once '../url.php';

$active_act = "active";



if (isset($_GET['editgal'])){
    $editgal=intval($_GET['editgal']);
    $gal= mysqli_query($connect,"select * from galerie where id_galerie='$editgal'")or die('Erreur SQL!! <br />' . $art . '<br />' . mysqli_error($connect));
    $galerie=mysqli_fetch_assoc($gal);
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Modifier un galerie</title>
    <link rel="icon" href="../../images/logo.jpg">
    <!-- vendor css -->
    <link href="../../lib/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="../../lib/Ionicons/css/ionicons.css" rel="stylesheet">
    <link href="../../lib/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet">
    <link href="../../lib/highlightjs/github.css" rel="stylesheet">
    <link href="../../lib/medium-editor/medium-editor.css" rel="stylesheet">
    <link href="../../lib/medium-editor/default.css" rel="stylesheet">
    <link href="../../lib/summernote/summernote-bs4.css" rel="stylesheet">

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
        <span class="breadcrumb-item active"> Modifier un galerie</span>
    </nav>
</div><!-- kt-breadcrumb -->
<!-- ##### MAIN PANEL ##### -->
<div class="kt-mainpanel">
    <div class="kt-pagetitle">
        <h5> Modifier un galerie</h5>
    </div><!-- kt-pagetitle -->

    <div class="kt-pagebody">



            
                <div class="col-md-12 m-l-25-force mg-md-t-0">
                    <hr class="invisible">
                    <label class="content-left-label">Détail de galerie </label>
                    <div class="card bg-gray-200 bd-0">
                        <form action="php/modif.php" method="post"  enctype="multipart/form-data">
                            <input type="text" name="id_galerie" value="<?=$editgal?>" hidden>
                            <div class="edit-profile-form">
                                <div class="form-group row">
                                    <label for="article_titre"  class="col-md-3 form-control-label">Titre : </label>
                                    <div class="col-md-9 mg-t-30 mg-sm-t-0">
                                        <input id="titre" type="text" name="gal_titre" class=" champ form-control" value="<?php
                                        echo $galerie["titre"]; ?>" style="height: 60px;">
                                    </div>
                                </div><!-- row -->


                                <div class="row mg-t-20">
                                    <label for="article_resume" class="col-md-3 form-control-label">Contenu </label>
                                    <textarea id="description" name="galerie_contenu"  type="text" class="champ form-control card pd-20 pd-sm-40 mg-t-20 " ><?php
                                        echo $galerie["contenu"];
                                        ?></textarea>
                                </div>
                                <div class="form-layout-footer mg-t-30">
                                    <button  id="envoi" type="submit" name="edit_gal" class="btn btn-default mg-r-5">Modifier</button>
                                    <div id="modaldemo1" class="modal fade" >
                                        <div class="modal-dialog modal-dialog-vertical-center" role="document" style=" width: 100%;">
                                            <div class="modal-content bd-0 tx-14">
                                                <div class="modal-header pd-y-5 ">
                                                    <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Chargement</h6>
                                                </div>

                                                <div class="modal-body pd-25">
                                                    <div id="myProgress" class="progress">
                                                        <div id="myBar" class="progress-bar progress-bar-striped bg-info wd-75p " aria-valuemax="100">
                                                            <span id="current-progress"></span>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div> <!-- modal-dialog-->
                                    </div> <!--modal -->

                                    <button id="rafraichir" type="reset" class="btn btn-secondary">Annuler</button>
                                </div><!-- form-layout-footer -->
                                <div id="erreur2" style="color: red" class="mg-t-5">
                                    <p>Veuillez remplir tous les champs obligatoires!!</p>
                                </div>
                                <div id="success" class="alert alert-success mg-b-0" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <div class="d-flex align-items-center justify-content-start">
                                        <i class="icon ion-alert-circled alert-icon tx-24 mg-t-5 mg-xs-t-0"></i>                           <?php
                                        echo 'Votre galerie a été modifié avec succès !!';
                                        ?>
                                    </div>
                                </div><!-- alert-->
                            </div>
                        </form>

                    </div><!-- card -->
                </div><!-- col-6 -->
                <script src="../../lib/jquery/jquery.js"></script>
                <script src="../../lib/popper.js/popper.js"></script>
                <script src="../../lib/bootstrap/bootstrap.js"></script>
                <script src="../../lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>
                <script src="../../lib/moment/moment.js"></script>
                <script src="../../lib/highlightjs/highlight.pack.js"></script>
                <script src="../../lib/summernote/summernote-bs4.min.js"></script>
                <script src="../../js0/katniss.js"></script>
                <script>
                    $(document).ready(function(){

                        var  $descrip = $('#description'),
                            $title = $('#titre'),
                            $envoi = $('#envoi'),
                            $reset = $('#rafraichir'),
                            $erreur2 = $('#erreur2').hide(),
                            $success = $('#success').hide(),
                            $champ = $('.champ');

                        $envoi.click(function(e){

                            // puis on lance la fonction de vérification sur tous les champs :

                            if(!verifier($descrip) || !verifier($title)){
                                e.preventDefault(); // on annule la fonction par défaut du bouton d'envoi
                            }else{
                                move();

                            }


                        });

                        $reset.click(function(){
                            $champ.css({ // on remet le style des champs comme on l'avait défini dans le style CSS
                                borderColor : '#ccc',
                                color : '#555'
                            });
                        });

                        function verifier(champ){
                            if(champ.val() == ""){ // si le champ est vide
                                champ.css({ // on rend le champ rouge
                                    borderColor : 'red',
                                });
                                $erreur2.show();
                                return false;
                            }else{
                                return true;
                            }
                        }

                        function move(){

                            $('#envoi').attr('data-toggle', 'modal').attr('data-target','#modaldemo1');
                            var elem = document.getElementById("myBar");
                            var width = 30;
                            var id = setInterval(frame, 10);
                            function frame() {
                                if (width == 100) {
                                    clearInterval(id);
                                    $success.show();

                                } else {
                                    width++;
                                    elem.style.width = width + '%';

                                }
                            }
                        }

                    });

                </script>
                <!-- <script>
                    $(function(){
                        'use strict';

                        // Summernote editor
                        $('#summernote').summernote({
                            tooltip: false
                        })
                    });
                </script> -->


                <script>$(function(){
                        $("#upload_link").on('click', function(e){
                            e.preventDefault();
                            $("#upload:hidden").trigger('click');
                        });
                    });</script>

                <script>$(function(){
                        $("#upload_linkcontenu").on('click', function(e){
                            e.preventDefault();
                            $("#uploadimgcontenu:hidden").trigger('click');
                        });
                    });</script>
                <script type="text/javascript">

                    function imagepreview(input) {
                        if (input.files && input.files[0]){
                            var filerd = new FileReader();
                            filerd.onload=function (e) {
                                $('#img1').attr('src', e.target.result);
                            };
                            filerd.readAsDataURL(input.files[0])
                        }
                    }

                    function imagemin(input) {
                        if (input.files && input.files[0]){
                            var fileimg = new FileReader();
                            fileimg.onload=function (e) {
                                $('#img2').attr('src', e.target.result);
                            };
                            fileimg.readAsDataURL(input.files[0])
                        }
                    }
                </script>
<script src="../../js0/ckeditor/ckeditor.js"></script>
                <script>
                    var editor=CKEDITOR.replace( 'editor',{
                        extraPlugins : 'filebrowser',
                        filebrowserUploadMethod:"form",
                        filebrowserUploadUrl:"../../upload.php"
                    });
                </script>
</body>
</html>
