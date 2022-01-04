<?php
require_once '../../configuration/session-verification.php';
require '../../configuration/config.php';
require_once '../url.php';
$active_user='active';

if (isset($_GET['edit'])){
    $edituser=intval($_GET['edit']);
    $requette= mysqli_query($connect,"select * from utilisateurs where id_user='$edituser'")or die('Erreur SQL!! <br />' . $cat . '<br />' . mysqli_error($connect));
    $afficheuser=mysqli_fetch_assoc($requette);

    if (isset($_POST['modif_user'])){
        $nom =trim(htmlspecialchars($_POST['nom'],ENT_QUOTES));
        $prenom =trim(htmlspecialchars($_POST['prenom'],ENT_QUOTES));
        $email = trim(htmlspecialchars($_POST['email'],ENT_QUOTES));
        $role = trim(htmlspecialchars($_POST['role'],ENT_QUOTES));
        $ident = trim(htmlspecialchars($_POST['ident'],ENT_QUOTES));

        $mp=md5($_POST['motpasse']);

        $sqledit = "update utilisateurs set Nom='$nom', Prenom='$prenom', Mail='$email', login='$ident',mot_passe='$mp', profil='$role' where id_user='$edituser'";
        $req = mysqli_query($connect, $sqledit) or die('Erreur SQL!! <br />' . $sqledit . '<br />' . mysqli_error($connect));

        $msg="l'utilisateur a bien était modifiée !!";

        $requette= mysqli_query($connect,"select * from utilisateurs where id_user='$edituser'")or die('Erreur SQL!! <br />' . $cat . '<br />' . mysqli_error($connect));
        $afficheuser=mysqli_fetch_assoc($requette);

    }

}


?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <title>FCPO : Modification du compte</title>
    <link rel="shortcut icon" type="image/png" href="../../img/fcpo-icon.png"/>
    <!-- vendor css -->
    <link href="../../lib/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="../../lib/Ionicons/css/ionicons.css" rel="stylesheet">
    <link href="../../lib/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet">
    <link href="../../lib/rickshaw/rickshaw.min.css" rel="stylesheet">

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
        <a class="breadcrumb-item" href="<?=$url?>admin/index.php">FCPO</a>
        <span class="breadcrumb-item active">Modification du compte</span>
    </nav>
</div><!-- kt-breadcrumb -->
<!-- ##### MAIN PANEL ##### -->
<div class="kt-mainpanel">
    <div class="kt-pagetitle">
        <h5>Modification du compte</h5>
    </div><!-- kt-pagetitle -->
    <div class="kt-pagebody">


        <div class="card pd-20 pd-sm-40 mg-t-50">

            <form action="" method="post" data-parsley-validate>
                <div class="d-sm-flex wd-sm-300">
                    <div class="form-group mg-b-0">
                        <label>Nom  : </label>
                        <input type="text" name="nom" class="form-control wd-200 wd-xs-250"  value=" <?php echo $afficheuser['Nom']; ?>" >
                        <label>Prénom  : </label>
                        <input type="text" name="prenom" class="form-control wd-200 wd-xs-250" value=" <?php echo $afficheuser["Prenom"]; ?>" >
                        <label>Email  : </label>
                        <input id="mail" type="text" name="email" class="form-control wd-200 wd-xs-250"  value=" <?php echo $afficheuser["Mail"]; ?>" >
                        <div id="erreurmail" style="color: red">
                            <p>l'email saisi n'est pas valide </p>
                        </div>
                        <label>Rôle : </label>
                        <input type="text" name="role" class="form-control wd-200 wd-xs-250" value=" <?php echo $afficheuser["profil"]; ?>" >
                        <label>login  : </label>
                        <input type="text" name="ident" class="form-control wd-200 wd-xs-250"  value=" <?php echo $afficheuser["login"]; ?>" >
                        <label>Nouveau mot de passe  : </label>
                        <input id="motpasse" type="password" name="motpasse"  class="form-control wd-200 wd-xs-250 champ" >
                            <div id="erreurmp" style="color: red">
                            <p>votre mot de passe doit contenir au moins 5 caractères</p>
                        </div>
                        <label>Confirmation du nouveau mot de passe  : </label>
                        <input id="conf" type="password" name="conf" class="form-control wd-200 wd-xs-250 champ" >
                        <div id="erreurconf" style="color: red">
                            <p>Vous n'avez pas confirmé votre mot de passe correctement!</p>
                        </div>
                    </div>
                </div>
                <div class="mg-sm-l-10 mg-t-10 mg-sm-t-25 pd-t-4">
                    <button id="envoi" type="submit" class="btn btn-default pd-x-15 " name="modif_user">Modifier</button>
                    <button id="rafraichir" type="reset" class="btn btn-secondary ">Annuler</button>
                </div>
            </form>

            <?php
            if (isset($msg)) {
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

        var  $motpasse = $('#motpasse'),
            $confirmation = $('#conf'),
            $envoi = $('#envoi'),
            $reset = $('#rafraichir'),
            $erreurmail = $('#erreurmail').hide(),
            $erreurmp = $('#erreurmp').hide(),
            $erreurconf = $('#erreurconf').hide(),

            $champ = $('.champ');

        $champ.keyup(function(){
            if($(this).val().length < 5){ // si la chaîne de caractères est inférieure à 5
                $(this).css({ // on rend le champ rouge
                    borderColor : 'red',
                    color : 'red'
                });
                $erreurmp = $('#erreurmp').show();

            }
            else{
                $(this).css({ // si tout est bon, on le rend vert
                    borderColor : 'green',
                    color : 'green'
                });
                $erreurmp = $('#erreurmp').hide();

            }

        });

        $confirmation.keyup(function(){
            if($(this).val() != $motpasse.val()){ // si la confirmation est différente du mot de passe
                $(this).css({ // on rend le champ rouge
                    borderColor : 'red',
                    color : 'red'
                });
                $erreurconf = $('#erreurconf').hide();
                $erreurmp = $('#erreurmp').hide();

            }
            else{
                $(this).css({ // si tout est bon, on le rend vert
                    borderColor : 'green',
                    color : 'green'
                });
                $erreurconf = $('#erreurconf').hide();
                $erreurmp = $('#erreurmp').hide();


            }
        });

        $envoi.click(function(e){

            // puis on lance la fonction de vérification sur tous les champs :
            verifier($motpasse);
            if(!verifier($confirmation)){
                e.preventDefault(); // on annule la fonction par défaut du bouton d'envoi
            }

        });

        $reset.click(function(){
            $champ.css({ // on remet le style des champs comme on l'avait défini dans le style CSS
                borderColor : '#ccc',
                color : '#555'
            });
            $erreurmp.css('display', 'none'); // on prend soin de cacher le message d'erreur
            $erreurconf.css('display', 'none'); // on prend soin de cacher le message d'erreur
            $erreurmail.css('display', 'none'); // on prend soin de cacher le message d'erreur


        });

        function verifier(champ){
            if(champ.val() == ""){ // si le champ est vide
                $erreur.css('display', 'block'); // on affiche le message d'erreur
                champ.css({ // on rend le champ rouge
                    borderColor : 'red',
                    color : 'red'
                });
            }
            if ($confirmation.val() != $motpasse.val()) {
                $erreurconf.show();
                $erreurmp.hide();
                $erreurmail.hide();

                return false;


            }else{
                $erreurconf.hide();
                $erreurmp.hide();
                $erreurmail.hide();

                return true;

            }

        }

    });

</script>
</body>
</html>
