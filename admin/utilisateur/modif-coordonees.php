<?php
    require_once '../../configuration/session-verification.php';
    require_once '../../configuration/config.php';
    require_once '../url.php';$active_user='active';
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> <!-- Twitter -->
    
    <title>Modification du compte</title> <!-- vendor css -->
    <link href="../../lib/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="../../lib/Ionicons/css/ionicons.css" rel="stylesheet">
    <link href="../../lib/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet"> <!-- Katniss CSS -->
    <link rel="stylesheet" href="../../css01/katniss.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
    <?php require_once '../header.php';?>
    <div class="kt-breadcrumb">
        <nav class="breadcrumb"> <a class="breadcrumb-item" href="<?=$url?>admin/index.php">FCPO</a> <span
                class="breadcrumb-item active">Modification du compte</span> </nav>
    </div><!-- kt-breadcrumb -->
    <!-- ##### MAIN PANEL ##### -->
    <div class="kt-mainpanel">
        <div class="kt-pagetitle">
            <h5>Modification du compte</h5>
        </div><!-- kt-pagetitle -->
        <div class="kt-pagebody">
            <div class="row">
                <div class="col-md-8 col-lg-9 mg-t-30 mg-md-t-0">
                    <hr class="invisible"> <label class="content-left-label">Coordonnées du compte</label>
                    <div class="card bg-gray-200 bd-0">
                        <div class="edit-profile-form">
                            <form action="" method="post">
                                <div class=" form-group row"> <label class="col-sm-3 form-control-label">login: </label>
                                    <div class="col-sm-8 col-xl-6 mg-t-10 mg-sm-t-0"> <input name="log"
                                            class="form-control" placeholder="Enter username" type="text"
                                            value="<?php echo $login;?>"> </div>
                                </div>
                                <div class="form-group row"> <label class="col-sm-3 form-control-label">Nom:</label>
                                    <div class="col-sm-8 col-xl-6 mg-t-10 mg-sm-t-0"> <input name="nom"
                                            class="form-control" placeholder="Enter firstname" type="text"
                                            value="<?php echo $nom;?>"> </div>
                                </div><!-- form-group -->
                                <div class="form-group row"> <label class="col-sm-3 form-control-label">Prénom:</label>
                                    <div class="col-sm-8 col-xl-6 mg-t-10 mg-sm-t-0"> <input name="prenom"
                                            class="form-control" placeholder="Enter lastname" type="text"
                                            value="<?php echo $prenom;?>"> </div>
                                </div><!-- form-group -->
                                <div class="form-group row"> <label class="col-sm-3 form-control-label">Email:</label>
                                    <div class="col-sm-8 col-xl-6 mg-t-10 mg-sm-t-0"> <input name="email"
                                            class="form-control" placeholder="Enter location" type="text"
                                            value="<?php echo $email;?>"> </div>
                                </div><!-- form-group -->
                                <div class="form-group row"> <label class="col-sm-3 form-control-label">Profil:</label>
                                    <div class="col-sm-8 col-xl-6 mg-t-10 mg-sm-t-0"> <input name="profil"
                                            class="form-control" placeholder="Enter Portfolio URL" type="text"
                                            value="<?php echo $profil;?>"> </div>
                                </div><!-- form-group -->
                                <div class="row row-xs mg-t-30">
                                    <div class="col-sm-8 mg-l-auto">
                                        <div class="form-layout-footer"> <button name="modif" type="submit"
                                                class="btn btn-default mg-r-5">Modifier </button> <button type="reset"
                                                class="btn btn-secondary">Annuler</button> </div>
                                        <!-- form-layout-footer -->
                                    </div><!-- col-8 -->
                                </div>
                            </form>
                            <?php
                            if (isset($_POST['nom'], $_POST['prenom'], $_POST['email'], $_POST['profil'], $_POST['log'])){
                                $log = htmlspecialchars($_POST['log'], ENT_QUOTES);
                                $name = htmlspecialchars($_POST['nom'], ENT_QUOTES);
                                $lname=htmlspecialchars($_POST['prenom'], ENT_QUOTES);
                                $umail=htmlspecialchars($_POST['email'], ENT_QUOTES);
                                $profile=htmlspecialchars($_POST['profil'], ENT_QUOTES);
                                $sqledit = "update utilisateurs set Nom='$name', Prenom='$lname', login='$log', Mail='$umail', profil='$profile' where id_user='$user'";

                            $req = mysqli_query($connect, $sqledit) or die('Erreur SQL!! <br />' . $sqledit . '<br />' . mysqli_error($connect));                            $msg="Votre compte a été modifié avec succés !!";                        }                        ?>
                        </div><!-- wd-60p --> <?php                    if (isset($msg)) {                        ?>
                        <div class="alert alert-success mg-b-0" role="alert"> <button type="button" class="close"
                                data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span>
                            </button>
                            <div class="d-flex align-items-center justify-content-start"> <i
                                    class="icon ion-ios-checkmark alert-icon tx-24 mg-t-5 mg-xs-t-0"></i> <strong
                                    class="d-block d-sm-inline-block-force"></strong>
                                <?php                                echo $msg;                                ?> </div>
                            <!-- d-flex -->
                        </div><!-- alert --> <?php                    } ?>
                    </div><!-- card -->
                    <hr class="invisible">
                </div><!-- col-9 -->
            </div><!-- row -->
        </div><!-- kt-pagebody --> <?php    require_once '../footer.php';    ?>
    </div><!-- kt-mainpanel -->
    <script src="<?=$url?>lib/jquery/jquery.js"></script>
    <script src="<?=$url?>lib/popper.js/popper.js"></script>
    <script src="<?=$url?>lib/bootstrap/bootstrap.js"></script>
    <script src="<?=$url?>lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>
    <script src="<?=$url?>lib/moment/moment.js"></script>
    <script src="<?=$url?>js0/katniss.js"></script>
    <script>
        $(document).ready(function () {
                    var $mdp = $('#mdp'),
                        $confirmation = $('#confirmation'),
                        $envoi = $('#envoi'),
                        $reset = $('#rafraichir'),
                        $erreur = $('#erreur').hide(),
                        $erreur1 = $('#erreur1').hide(),
                        $champ = $('.champ');
                    $champ.keyup(function () {
                                if ($(this).val().length <
                                    5
                                    ) { // si la chaîne de caractères est inférieure à 5                $(this).css({ // on rend le champ rouge                    borderColor : 'red',                    color : 'red'                });                $erreur1 = $('#erreur1').show();            }            else{                $(this).css({ // si tout est bon, on le rend vert                    borderColor : 'green',                    color : 'green'                });                $erreur1 = $('#erreur1').hide();            }        });        $confirmation.keyup(function(){            if($(this).val() != $mdp.val()){ // si la confirmation est différente du mot de passe                $(this).css({ // on rend le champ rouge                    borderColor : 'red',                    color : 'red'                });                $erreur1 = $('#erreur1').hide();            }            else{                $(this).css({ // si tout est bon, on le rend vert                    borderColor : 'green',                    color : 'green'                });                $erreur = $('#erreur').hide();            }        });        $envoi.click(function(e){            // puis on lance la fonction de vérification sur tous les champs :            verifier($mdp);            if(!verifier($confirmation)){                e.preventDefault(); // on annule la fonction par défaut du bouton d'envoi            }        });        $reset.click(function(){            $champ.css({ // on remet le style des champs comme on l'avait défini dans le style CSS                borderColor : '#ccc',                color : '#555'            });            $erreur.css('display', 'none'); // on prend soin de cacher le message d'erreur            $erreur1.css('display', 'none'); // on prend soin de cacher le message d'erreur        });        function verifier(champ){            if(champ.val() == ""){ // si le champ est vide                $erreur.css('display', 'block'); // on affiche le message d'erreur                champ.css({ // on rend le champ rouge                    borderColor : 'red',                    color : 'red'                });            }            if ($confirmation.val() != $mdp.val()) {                $erreur.show();                $erreur1.hide();                return false;            }else{                $erreur.hide();                $erreur1.hide();                return true;            }        }    });
    </script>
</body>

</html>