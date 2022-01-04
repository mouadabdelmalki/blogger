<?php

require_once '../../configuration/session-verification.php';
require_once '../../configuration/config.php';
require_once '../url.php';

$active_user='active';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Mon Compte</title>
    <link rel="shortcut icon" type="image/png" href="../../img/fcpo-icon.png"/>
    <!-- vendor css -->
    <link href="../../lib/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="../../lib/Ionicons/css/ionicons.css" rel="stylesheet">
    <link href="../../lib/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet">

    <!-- Katniss CSS -->
    <link rel="stylesheet" href="../../css01/katniss.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>

<?php
require_once '../header.php';
?>

<div class="kt-breadcrumb">
    <nav class="breadcrumb">
        <a class="breadcrumb-item" href="../admin/index.php">FCPO</a>
        <span class="breadcrumb-item active">Mon compte </span>
    </nav>
</div><!-- kt-breadcrumb -->

<!-- ##### MAIN PANEL ##### -->
<div class="kt-mainpanel">
    <div class="kt-pagetitle">
        <h5>Mon compte</h5>

    </div><!-- kt-pagetitle -->

    <div class="kt-pagebody">

        <div class="row">

            <div class="col-md-8 col-lg-9 mg-t-30 mg-md-t-0">
                <label class="content-left-label">Informations d'authentification</label>
                <div class="card bg-gray-200 bd-0" style="    padding: 22px;">
                    <div class=" form-group row">
                        <label class="col-sm-3 form-control-label">login: </label>
                        <div class="col-sm-8 col-xl-6 mg-t-10 mg-sm-t-0">
                            <input class="form-control" placeholder="Enter username" type="text" value="<?php echo $login;?>" disabled>
                        </div>
                    </div>
                    <div class="form-group row mg-b-0">
                        <label class="col-sm-3 form-control-label">Mot de passe</label>
                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                            <a href=""  data-toggle="modal" data-target="#modaldemo1">Changer le mot de passe</a>
                        </div>

                        <div id="modaldemo1" class="modal fade" >
                            <div class="modal-dialog modal-dialog-vertical-center" role="document" style=" width: 100%;">
                                <div class="modal-content bd-0 tx-14">
                                    <div class="modal-header pd-y-20 ">
                                        <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Modifier le mot de passe</h6>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    </div>

                                    <div class="modal-body pd-25">

                                        <div class="d-flex">

                                            <form action="" method="post" data-parsley-validate>
                                                <div class="d-sm-flex wd-sm-300">
                                                    <div class="form-group mg-b-0">
                                                        <label>mot passe  : </label>
                                                        <input id="mdp" type="password" name="mdp" class="form-control wd-200 wd-xs-250 champ" >
                                                        <div id="erreur1" style="color: red">
                                                            <p>votre mot de passe doit contenir au moins 5 caractères</p>
                                                        </div>

                                                        <label> confirmation mot passe  : </label>
                                                        <input id="confirmation" type="password" name="cmdp" class="form-control wd-200 wd-xs-250 champ">

                                                        <div id="erreur" style="color: red">
                                                            <p>Vous n'avez pas confirmé votre mot de passe correctement!</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mg-sm-l-10 mg-t-10 mg-sm-t-25 pd-t-4">
                                                    <button id="envoi" type="submit" class="btn btn-default pd-x-15" name="modif_user">Modifier</button>
                                                    <button id="rafraichir" type="reset" class="btn btn-secondary" name="annuler_modif">Annuler</button>
                                                </div>
                                            </form>
                                            <?php


                                            if (isset($_POST['modif_user'])){
                                                $mdp = md5($_POST['mdp']);
                                                $sqledit = "update utilisateurs set mot_passe='$mdp' where id_user='$user'";
                                                $req = mysqli_query($connect, $sqledit) or die('Erreur SQL!! <br />' . $sqledit . '<br />' . mysqli_error($connect));

                                                $motp= mysqli_query($connect,"select * from utilisateurs where id_user='$user'")or die('Erreur SQL!! <br />' . $cat . '<br />' . mysqli_error($connect));
                                                $passw=mysqli_fetch_assoc($motp);

                                            }

                                            ?>
                                        </div>
                                    </div>

                                </div>
                            </div><!-- modal-dialog -->
                        </div><!-- modal -->
                    </div>

                </div><!-- card -->

                <hr class="invisible">

                <label class="content-left-label">Informations personnelles </label>
                <div class="card bg-gray-200 bd-0">
                    <div class="edit-profile-form">
                        <div class="form-group row">
                            <label class="col-sm-3 form-control-label">Nom:</label>
                            <div class="col-sm-8 col-xl-6 mg-t-10 mg-sm-t-0">
                                <input class="form-control" placeholder="Enter firstname" type="text" value="<?php echo $nom;?>" disabled>
                            </div>
                        </div><!-- form-group -->
                        <div class="form-group row">
                            <label class="col-sm-3 form-control-label">Prénom:</label>
                            <div class="col-sm-8 col-xl-6 mg-t-10 mg-sm-t-0">
                                <input class="form-control" placeholder="Enter lastname" type="text" value="<?php echo $prenom;?>" disabled>
                            </div>
                        </div><!-- form-group -->
                        <div class="form-group row">
                            <label class="col-sm-3 form-control-label">Email:</label>
                            <div class="col-sm-8 col-xl-6 mg-t-10 mg-sm-t-0">
                                <input class="form-control" placeholder="Enter location" type="text" value="<?php echo $email;?>" disabled>
                            </div>
                        </div><!-- form-group -->
                        <div class="form-group row">
                            <label class="col-sm-3 form-control-label">Profil:</label>
                            <div class="col-sm-8 col-xl-6 mg-t-10 mg-sm-t-0">
                                <input class="form-control" placeholder="Enter Portfolio URL" type="text" value="<?php echo $profil;?>" disabled>
                            </div>
                        </div><!-- form-group -->

                    </div><!-- wd-60p -->
                </div><!-- card -->

                <hr class="invisible">


            </div><!-- col-9 -->
            <div class="mg-l-30">
                <a href="modif-coordonees.php">Modifier mes coordonnées</a>
            </div>

        </div><!-- row -->

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

<script src="../../js0/katniss.js"></script>
<script>
    $(document).ready(function(){

        var  $mdp = $('#mdp'),
            $confirmation = $('#confirmation'),
            $envoi = $('#envoi'),
            $reset = $('#rafraichir'),
            $erreur = $('#erreur').hide(),
            $erreur1 = $('#erreur1').hide(),
            $erreur2 = $('#erreur2').hide(),
            $success = $('#success').hide(),


            $champ = $('.champ');

        $champ.keyup(function(){
            if($(this).val().length < 5){ // si la chaîne de caractères est inférieure à 5
                $(this).css({ // on rend le champ rouge
                    borderColor : 'red',
                    color : 'red'
                });
                $erreur1 = $('#erreur1').show();
                $erreur2 = $('#erreur2').hide();
            }
            else{
                $(this).css({ // si tout est bon, on le rend vert
                    borderColor : 'green',
                    color : 'green'
                });
                $erreur1 = $('#erreur1').hide();
                $erreur2 = $('#erreur2').hide();
            }
        });

        $confirmation.keyup(function(){
            if($(this).val() != $mdp.val()){ // si la confirmation est différente du mot de passe
                $(this).css({ // on rend le champ rouge
                    borderColor : 'red',
                    color : 'red'
                });
                $erreur1 = $('#erreur1').hide();
            }
            else{
                $(this).css({ // si tout est bon, on le rend vert
                    borderColor : 'green',
                    color : 'green'
                });
                $erreur = $('#erreur').hide();
            }
        });

        $envoi.click(function(e){


            if(!verifier($champ)){
                e.preventDefault();
            }else{
                $success.show();

            }
        });

        $reset.click(function(){
            $champ.css({ // on remet le style des champs comme on l'avait défini dans le style CSS
                borderColor : '#ccc',
                color : '#555'
            });
            $erreur.css('display', 'none'); // on prend soin de cacher le message d'erreur
            $erreur1.css('display', 'none'); // on prend soin de cacher le message d'erreur
            $erreur2.css('display', 'none'); // on prend soin de cacher le message d'erreur

        });

        function verifier(champ){
            if(champ.val() == ""){ // si le champ est vide
                champ.css({ // on rend le champ rouge
                    borderColor : 'red',
                    color : 'red'
                });
                $erreur2.show();
                return false;
            }else {
                $erreur.css('display', 'none'); // on prend soin de cacher le message d'erreur
                $erreur1.css('display', 'none'); // on prend soin de cacher le message d'erreur
                $erreur2.css('display', 'none'); // on prend soin de cacher le message d'erreur
                if(!verifiermp()){
                }else {
                    return true;

                }
            }
        }

        function verifiermp() {
            if ($confirmation.val() != $mdp.val()) {
                $erreur.show();
                $erreur1.hide();
                return false;
            }else{
                $erreur.hide();
                $erreur1.hide();
                return true;
            }
        }


    });

</script>
</body>
</html>
