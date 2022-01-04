<?php
require_once '../../configuration/session-verification.php';
require '../../configuration/config.php';
require_once '../url.php';

$active_act = "active";
$galerie = mysqli_query($connect,"SELECT * FROM galerie");
$id_gl = mysqli_query($connect,"SELECT * FROM galerie ORDER BY id_galerie DESC LIMIT 1");
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Gestion de galerie</title>
    <!-- vendor css -->
    <link href="<?=$url?>lib/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="<?=$url?>lib/Ionicons/css/ionicons.css" rel="stylesheet">
    <link href="<?=$url?>lib/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet">
    <link href="<?=$url?>lib/rickshaw/rickshaw.min.css" rel="stylesheet">
    <link href="<?=$url?>lib/highlightjs/github.css" rel="stylesheet">
    <!-- Katniss CSS -->
    <link rel="stylesheet" href="<?=$url?>css01/katniss.css">
    <link rel="stylesheet" href="<?=$url?>css01/bootstrap.min.css">
    <link rel="stylesheet" href="<?=$url?>css01/dropzone.min.css">
    <link rel="stylesheet" href="<?=$url?>css01/basic.min.css">
    <link rel="stylesheet" href="<?=$url?>css01/galerie.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css">
</head>

<body>


<?php
require_once '../header.php';
?>

<div class="kt-breadcrumb">
    <nav class="breadcrumb">
        <a class="breadcrumb-item" href="<?=$url?>admin/index.php">FCPO</a>
        <span class="breadcrumb-item active">Galerie </span>
    </nav>
</div><!-- kt-breadcrumb -->
<!-- ##### MAIN PANEL ##### -->
<div class="kt-mainpanel">
    <div class="kt-pagetitle">
        <h5 class="col-md-9">Galerie</h5>
    </div><!-- kt-pagetitle -->
    <div class="kt-pagebody text-center">
        <div class="container">
            <div class="col-md-12">
                <form action="traitement-images.php" method="post" class="dropzone" id="drop" enctype="multipart/form-data">
                           <div class="col-md-12">
                                <label class="card-title"> Article :  <span class="tx-danger">*    </span>  </label>
                                <select name="listgalerie" id="id_gal" style="height:40px;font-weight:500;font-size:18px;">
                                <?php   foreach($galerie as $GL) {
                                 echo'<option name="galerietitre" value='.$GL["id_galerie"].'>'.$GL["titre"].'</option>';}
                                  ?>
                                </select>
                            </div>
                    <span class="dz-message">Déplacez votre image ici ou cliquez </span>
                </form>
            </div>
            <div>
            <button id="ajouter-photos" type="susbmit" class="btn btn-default btn-primary">Ajouter</button>
            
            </div>
            

           <!-- <div class="col-md-12">
                <h2 class="card-title">Aperçu</h2>
            </div>  -->
        </div>
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
<script src="<?=$url?>js/katniss.js"></script>
<script src="<?=$url?>js0/katniss.js"></script>
<script src="<?=$url?>js0/ResizeSensor.js"></script>
<script src="<?=$url?>js0/dashboard.js"></script>
<script src="<?=$url?>js0/dropzone.js"></script>
<script>
  Dropzone.options.drop = {
            paramName: "file[]", // The name that will be used to transfer the file
            maxFilesize: 20, // MB
            parallelUploads : 10,
            addRemoveLinks : true,
            acceptedFiles : '.jpg,.jpeg,.png,.mp4',
            autoProcessQueue : false,
        
        
            init: function(){
            var submit = document.querySelector("#ajouter-photos");
           
            myDropZone = this;
            submit.addEventListener("click",function(){
                myDropZone.processQueue();
            });
            myDropZone.on("complete",(file)=>{
                myDropZone.removeFile(file);
                window.location='<?php echo "$listegl"; ?>';

            });
            
        }
    };
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.min.js"></script>
<!-- <script>
    $(document).on('click', '[data-toggle="lightbox"]', function(event) {
            event.preventDefault();
            $(this).ekkoLightbox();
        });
</script> -->
<!-- <script>
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

</script> -->

<!-- <script>
    function modifier(id,libelle) {
        document.getElementById('id_categ').value = id;
        document.getElementById('libelle_categ').value = libelle;
        document.getElementById('categ').value = libelle;
    }

</script> -->
<!-- <script>
$('#confirm-delete').on('show.bs.modal', function(e) {
    $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
});
</script> -->


</body>
</html>