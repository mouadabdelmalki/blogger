<?php 
    require_once '../../configuration/session-verification.php';
    require '../../configuration/config.php';
    require_once '../url.php';
    $active_act = "active";
    $galerie = mysqli_query($connect,"SELECT * FROM galerie");
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="../../images/logo.jpg">
    <title>Ajouter un galerie</title>

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
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css">
    

</head>

<body>

<?php
require_once '../header.php';

?>

<div class="kt-breadcrumb">
    <nav class="breadcrumb">
        <a class="breadcrumb-item" href="<?=$url?>admin/index.php">Dr najib Moussa</a>
        <span class="breadcrumb-item active">Ajouter un galerie</span>
    </nav>
</div><!-- kt-breadcrumb -->
<!-- ##### MAIN PANEL ##### -->
<div class="kt-mainpanel">
    <div class="kt-pagetitle">
        <h5>Ajouter un nouvel galerie</h5>
    </div><!-- kt-pagetitle -->

    <div class="kt-pagebody">



        <div class="row row-sm mg-t-20">
            <div class="col-xl-12">
                <div class="card pd-20 pd-sm-40 form-layout form-layout-4">
                    <h6 class="card-body-title">Ajouter un nouvel galerie</h6>
                    <form action="php/traitement_galerie.php" method="post" enctype="multipart/form-data">
                        <div class="row mg-t-10">
                            <input type="text" name="galerie_id" class="form-control" hidden>

                            <label for="article_titre"  class="col-md-2 form-control-label">Titre : <span class="tx-danger">*</span></label>
                            <div class="col-md-10 mg-t-10 mg-sm-t-0" >
                                <input id="titre" type="text" name="galerie_titre" class=" champ form-control" placeholder="Titre de galerie" style="    height: 65px;">
                            </div>
                        </div><!-- row --> 
                        <div class="row mg-t-20">
                            <label for="article_resume" class="col-md-2 form-control-label">Contenu : <span class="tx-danger">*</span></label>
                            <textarea id="description" name="galerie_contenu" type="text" class="col-md-10 champ form-control card pd-20 pd-sm-40 mg-t-20 " placeholder="contenu du galerie" style="width: 75%"></textarea>
                        </div>
                        <div class="row mg-t-20">
                            <div class="col-md-12 " style="display: flex">
                                <div class="col-md-6">
                                    <label class="row mg-b-20" for="image_contenu">Image mise en avant</label>
                                    <img src="../../img/img14.jpg"  id="img1" class="img-fluid" alt="" style="width: 100%;height: 281px;">
                                    <input type="file" name="image_contenu" onchange="imagepreview(this);"/>

                                </div>

                            </div>
                        </div>
                        <div class="row mg-t-20"></div>

                        <?php
                        if(isset($msge)){echo $msge;} ?>
                        <br>


                        <div class="form-layout-footer mg-t-30">
                            <button  id="envoi" type="submit" name="add_gal" class="btn btn-default mg-r-5"> Ajouter</button>
                            
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

                            <button id="rafraichir" type="reset" class="btn btn-secondary">Annuler </button>
                            <!-- <button  id="envoi" type="submit" name="add_gal" class="btn btn-primary mg-r-5"> Ajouter Plus d'images</button> -->
                        </div><!-- form-layout-footer -->

                        <div id="erreur2" style="color: red" class="mg-t-5">
                            <p>Veuillez remplir les champs obligatoires !!</p>
                        </div>
                        <div id="success" class="alert alert-success mg-b-0" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <div class="d-flex align-items-center justify-content-start">
                                <i class="icon ion-alert-circled alert-icon tx-24 mg-t-5 mg-xs-t-0"></i>                           <?php
                                echo 'Votre article a bien été ajouté!!';
                                ?>
                            </div>
                        </div><!-- alert-->
                    </form>
                    




                    <?php
                    if(isset($msgerreur)) {
                        ?>
                        <div class="alert alert-danger mg-b-0" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <div class="d-flex align-items-center justify-content-start">
                                <i class="icon ion-ios-close alert-icon tx-24"></i>
                                <strong class="d-block d-sm-inline-block-force">Erreur!  </strong>
                                <?php
                                echo $msgerreur;
                                ?>
                            </div><!-- d-flex -->

                        </div><!-- alert -->
                        <?php
                    }elseif (isset($msg)) {
                        ?>
                        <div class="alert alert-success mg-b-0" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <div class="d-flex align-items-center justify-content-start">
                                <i class="icon ion-ios-checkmark alert-icon tx-24 mg-t-5 mg-xs-t-0"></i>
                                <strong class="d-block d-sm-inline-block-force"></strong>
                                <?php
                                echo $msg;

                                ?>
                            </div><!-- d-flex -->

                        </div><!-- alert -->
                        <?php
                    }
                    ?>
                </div><!-- card -->
            </div><!-- col-6 -->


            <script src="<?=$url?>lib/jquery/jquery.js"></script>
            <script src="<?=$url?>lib/jquery-ui/jquery-ui.js"></script>
            <script src="<?=$url?>lib/popper.js/popper.js"></script>
            <script src="<?=$url?>lib/bootstrap/bootstrap.js"></script>
            <script src="<?=$url?>lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>
            <script src="<?=$url?>lib/moment/moment.js"></script>
            <script src="<?=$url?>lib/highlightjs/highlight.pack.js"></script>
            <script src="<?=$url?>lib/summernote/summernote-bs4.min.js"></script>
            <script src="assets/vendor/dropzone/dist/min/dropzone.min.js"></script>

            <script src="<?=$url?>js/katniss.js"></script>

            

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

                        if(!verifier($title) || !verifier($descrip)){
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
                            $erreur2.hide();
                            return true;

                        }

                    }
                    function move(){

                        $('#envoi').attr('data-toggle', 'modal').attr('data-target','#modaldemo1');
                        var elem = document.getElementById("myBar");
                        var width = 10;
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
                    });


                });

            </script> -->

            <script>
           
                function imagepreview(input) {

                    if (input.files && input.files[0]){
                        var filerd = new FileReader();
                        filerd.onload=function (e) {
                            $('#img1').attr('src', e.target.result);
                        };
                        filerd.readAsDataURL(input.files[0])


                    }

                }

               

            </script>
            
            <script src="<?=$url?>js0/katniss.js"></script>
            <script src="<?=$url?>js0/ResizeSensor.js"></script>
            <script src="<?=$url?>js0/dashboard.js"></script>
            <script src="<?=$url?>js0/dropzone.js"></script>
                <!-- <script>
                            Dropzone.options.drop = {
                            url:"ajouter-galerie.php",
                            paramName: "file[]", // The name that will be used to transfer the file
                            maxFilesize: 20, // MB
                            parallelUploads : 10,
                            addRemoveLinks : true,
                            acceptedFiles : '.jpg,.jpeg,.png,.mp4',
                            previewTemplate: drop,
                            autoProcessQueue : false,
                            
                            
                            init: function(){
                            var submit = document.querySelector("#ajouter-photos");
                        
                            myDropZone = this;
                            submit.addEventListener("click",function(){
                                myDropZone.processQueue();
                            });
                            myDropZone.on("complete",(file)=>{
                                myDropZone.removeFile(file);
                                
                            });
                        }
                    };
                </script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.min.js"></script>

<!-- <script src="../../js0/ckeditor/ckeditor.js"></script>
<script src="../../js0/ckfinder/ckfinder.js"></script>
            <script>
                var editor=CKEDITOR.replace( 'editor',{
                    extraPlugins : 'filebrowser',
                    filebrowserUploadMethod:"form",
                    filebrowserUploadUrl:"../../upload.php"
                });
            </script> -->

</html>
