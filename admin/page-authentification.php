<?php
session_start();

$error=isset($_GET['error']) ? $_GET['error']:'';
// $password=md5(isset($_GET['password']) ? $_GET['password']:'');

?>

<!DOCTYPE html>
<html lang="fr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <title>Authentification: Administration</title>
     <link rel="icon" href="../images/logo.jpg">

    <!-- vendor css -->
    <link href="../lib/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="../lib/Ionicons/css/ionicons.css" rel="stylesheet">
    <link href="../lib/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet">

    <!-- Katniss CSS -->
    <link rel="stylesheet" href="../css01/katniss.css">
  </head>

  <body>

    <div class="signpanel-wrapper">
      <div class="signbox">
        <div class="signbox-header">
          <h4>Dr Najib Moussa</h4>
          <p class="mg-b-0">Authentification</p>
        </div><!-- signbox-header -->
        <div class="signbox-body">
            <form action="../configuration/session.php" method="post">
                <div class="form-group">
                   <label class="form-control-label">Identifiant:</label>
                   <input type="text" name="login" placeholder="Saisir votre identifiant" class="form-control">
               </div><!-- form-group -->
               <div class="form-group">
                   <label class="form-control-label">Mot de passe:</label>
                   <input type="password" name="password" placeholder="Saisir votre mot de passe" class="form-control">
               </div><!-- form-group -->

               <button class="btn btn-dark btn-block  mg-t-40" name="connecter" type="submit">Se connecter</button>
          </form>


            <div class="form-group row mg-b-0">
                <div class="col-sm-8 mg-t-20 mg-sm-t-20 text-right">
                    <a href=""  data-toggle="modal" data-target="#modaldemo1">Mot de passe oublié</a>
                </div>

                <div id="modaldemo1" class="modal fade">
                    <div class="modal-dialog modal-dialog-vertical-center" role="document" style=" width: 100%;">
                        <div class="modal-content bd-0 tx-14">
                            <div class="modal-header pd-y-20 ">
                                <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Récupération de mot de
                                    passe</h6>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                            aria-hidden="true">&times;</span></button>
                            </div>

                            <div class="modal-body pd-25">

                                <div class="d-flex">

                                    <form action="utilisateur/mot-passe-oublie.php" method="post" data-parsley-validate>
                                        <div class="d-flex wd-300">
                                            <div class="form-group mg-b-0">
                                                <label>Adresse email : <span class="tx-danger">*</span></label>
                                                <input id="email" type="email" name="email" class="form-control wd-250"
                                                       placeholder="Entrer votre email" required>
                                            </div><!-- form-group -->
                                            <div class="mg-l-10 mg-t-25 pd-t-4">
                                                <button class="btn btn-default" type="submit" id="lien" name="post"
                                                        onclick="envoyer()">Valider Email
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div><!-- modal-dialog -->
                </div><!-- modal -->
            </div>


            <?php
            switch ($error){
                case 1:
                    ?>
                    <div class="alert alert-danger mg-t-8" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <div class=" align-items-center justify-content-start">
                            <i class="icon ion-ios-close alert-icon tx-20"></i>
                            <strong class="d-sm-inline-block-force">Erreur !!</strong> <br>
                            <?php
                            echo ' Veuillez saisir un login et un mot de passe';
                            break;
                            ?>
                        </div><!-- d-flex -->

                    </div><!-- alert -->


                <?php case 2:?>
                <div class="alert alert-danger mg-b-0" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <div class="d-flex align-items-center justify-content-start">
                        <i class="icon ion-ios-close alert-icon tx-24"></i>
                        <strong class="d-block d-sm-inline-block-force">Erreur! </strong>
                        <?php
                        echo ' Veuillez saisir votre mot de passe';
                        break;
                        ?>
                    </div><!-- d-flex -->

                </div><!-- alert -->


            <?php case  3: ?>
                <div class="alert alert-danger mg-b-0" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <div class="d-flex align-items-center justify-content-start">
                        <i class="icon ion-ios-close alert-icon tx-24"></i>
                        <strong class="d-block d-sm-inline-block-force"></strong>
                        <?php
                        echo 'login ou mot de passe est invalide ...';
                        break;
                        ?>
                    </div>
                </div><!-- alert -->

            <?php case 4: ?>
                <div class="alert alert-warning mg-b-0" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <div class="d-flex align-items-center justify-content-start">
                        <i class="icon ion-alert-circled alert-icon tx-24 mg-t-5 mg-xs-t-0"></i>                           <?php
                        echo ' Veuillez se connecter pour pouvoir accéder à la page';
                        break;
                        ?>
                    </div>
                </div><!-- alert-->


            <?php case 5: ?>
                <div class="alert alert-info mg-b-0" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <div class="d-flex align-items-center justify-content-start">
                        <i class="icon ion-alert-circled alert-icon tx-24 mg-t-5 mg-xs-t-0"></i>                           <?php
                        echo '  Un message vous a été envoyer! <br> Veuillez consulter votre boite email.';
                        break;
                        ?>
                    </div>
                </div><!-- alert-->
            <?php case 6: ?>
                <div class="alert alert-warning mg-b-0" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <div class="d-flex align-items-center justify-content-start">
                        <i class="icon ion-alert-circled alert-icon tx-24 mg-t-5 mg-xs-t-0"></i>                           <?php
                        echo ' Email non valide';
                        break;
                        ?>
                    </div>
                </div><!-- alert-->

            <?php
            }

            ?>

        </div><!-- signbox-body -->

      </div><!-- signbox -->
    </div><!-- signpanel-wrapper -->

    <script src="../lib/jquery/jquery.js"></script>
    <script src="../lib/popper.js/popper.js"></script>
    <script src="../lib/bootstrap/bootstrap.js"></script>
    <script src="../js0/envoyer.js"></script>
  </body>
</html>
