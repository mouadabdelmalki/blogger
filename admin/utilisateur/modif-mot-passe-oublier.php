<?php
require '../../configuration/config.php';
require_once '../url.php';


if (isset($_GET['id'])) {
    $edituser = intval($_GET['id']);
    $req = mysqli_query($connect, "select * from utilisateurs where id_user='$edituser'") or die('Erreur SQL!! <br />' . $req . '<br />' . mysqli_error($connect));
    $user = mysqli_fetch_assoc($req);

    if (isset($_POST['modif'])){

        $mdp =md5($_POST['mdp']);
        $sqledit = "update utilisateurs set mot_passe='$mdp' where id_user='$edituser'";
        $req = mysqli_query($connect, $sqledit) or die('Erreur SQL!! <br />' . $sqledit . '<br />' . mysqli_error($connect));
        header('location:'.$url.'admin/page-authentification.php');

    }

}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <title>Authentification: Administration</title>

    <!-- vendor css -->
    <link href="<?=$url?>lib/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="<?=$url?>lib/Ionicons/css/ionicons.css" rel="stylesheet">
    <link href="<?=$url?>lib/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet">

    <!-- Katniss CSS -->
    <link rel="stylesheet" href="<?=$url?>css01/katniss.css">
</head>

<body>

<div class="signpanel-wrapper">
    <div class="signbox">
        <div class="signbox-header">
            <h4>FCPO</h4>
            <p class="mg-b-0">Changer Mot de passe</p>
        </div><!-- signbox-header -->
        <div class="signbox-body">
            <div class="form-group">
                <form action="" method="post" data-parsley-validate>
                    <div class="d-sm-flex wd-sm-300">
                        <div class="form-group mg-b-0">
                            <label>mot passe  : </label>
                            <input id="mdp" type="password" name="mdp" class="champ form-control wd-200 wd-xs-250" >
                            <div id="erreur1" style="color: red">
                                <p>votre mot de passe doit contenir au moins 5 caractères</p>
                            </div>

                            <label> confirmation mot passe  : </label>
                            <input id="confirmation" type="password" name="cmdp" class="champ form-control wd-200 wd-xs-250">

                            <div id="erreur" style="color: red">
                                <p>Vous n'avez pas confirmé votre mot de passe correctement!</p>
                            </div>

                        </div>
                    </div>
                    <div class="mg-sm-l-10 mg-t-10 mg-sm-t-25 pd-t-4">
                        <button id="envoi" type="submit" class="btn btn-default pd-x-15" name="modif" >Modifier</button>
                        <button id="rafraichir" type="reset" class="btn btn-secondary">Annuler</button>
                    </div>
                    <div id="erreur2" style="color: red" class="mg-t-5">
                        <p>Veuillez remplir tous les champs!!</p>
                    </div>
                    <div id="success" class="alert alert-success mg-b-0" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <div class="d-flex align-items-center justify-content-start">
                            <i class="icon ion-alert-circled alert-icon tx-24 mg-t-5 mg-xs-t-0"></i>                           <?php
                            echo 'Votre mot de passe a bien été modifé !!';
                            ?>
                        </div>
                    </div><!-- alert-->
                </form>

            </div><!-- signbox-body -->

        </div><!-- signbox -->
    </div><!-- signpanel-wrapper -->

    <script src="<?=$url?>lib/jquery/jquery.js"></script>
    <script src="<?=$url?>lib/popper.js/popper.js"></script>
    <script src="<?=$url?>lib/bootstrap/bootstrap.js"></script>
    <script src="<?=$url?>js0/envoyer.js"></script>
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

