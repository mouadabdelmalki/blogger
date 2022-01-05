function envoyer(){
    var email 	    = $("input#email").val();

    //var verifierFormulaire = document.getElementById("verifierFormulaire");
            $.post("mot-passe-oublier.php", {email:email,});

}
