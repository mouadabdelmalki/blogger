

    var  $contenu = $('#summernote'),
        $title = $('#titre'),
        $lien=$('#lien'),
        $envoi = $('#envoi'),
        $reset = $('#rafraichir'),
        $erreur = $('#erreur').hide(),
        $erreur2 = $('#erreur2').hide(),
        $id_msg=$('#id_msg'),
        $result=$('#resultat'),
        $titleseo=$('#titleseo'),
        $descripseo=$('#descriptionseo'),
        $champ = $('.champ');



    CKEDITOR.replace( 'contenu' );
    // CKEDITOR.replaceAll('contenu');


    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );

    //traitement d'image modifiée
    $("#upload_link_bg_footer").on('click', function(e){
        e.preventDefault();
        $("#uploadbgfooter").trigger('click');
    });

    //traitement d'image modifiée
    $("#link_modif").on('click', function(e){
        e.preventDefault();
        $("#upload_modif").trigger('click');
    });

//traitement d'image
    $("#link").on('click', function(e){
        e.preventDefault();
        $("#upload").trigger('click');
    });



    // Initialize tooltip
    $('[data-toggle="tooltip"]').tooltip();

    // Initialize popover
    $('[data-popover-color="default"]').popover();

    $('#titleseo').keyup(function (e) {


            $('[data-toggle="popover"],[data-original-title]').each(function () {
                //the 'is' for buttons that trigger popups
                //the 'has' for icons within a button that triggers a popup
                if (!$(this).is(e.target) && $(this).has(e.target).length === 0 && $('.popover').has(e.target).length === 0) {
                    (($(this).popover('hide').data('bs.popover')||{}).inState||{}).keyup = false  // fix for BS 3.3.6
                }
            });

    });

   $('#modifsec1').click(function () {
       $('.section1').show();
       $('.section2').hide();
   });

    $('#modifdescrip').click(function () {
        $('.section1').hide();
        $('.section2').show();


    });
    $envoi.click(function(e){

        // on lance la fonction de vérification sur tous les champs :
        if(!verifier($title) || !verifier($contenu) || !verifier($lien)){
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





    function verifier(champ){
        if(champ.val() == ""){ // si le champ est vide
            champ.css({ // on rend le champ rouge
                borderColor : 'red',
            });
            $erreur.show();
            return false;
        }else{
            $erreur.hide();
            return true;
        }
    }

    if($('#activation').val() == "0"){
        $('#resultat').css({ // on rend le champ rouge
            'border-left' : ' solid 5px red',
        });
    }else{
        $('#resultat').css({
            'border-left' : ' solid 5px green',
        });
    }


    // $('#modifier').click(function (e) {
    //     $('.contenumodif').attr('id','summernote');
    //     e.preventDefault();
    //
    // })

    //
    // var y= $('#gh').val();
    //
    // $('#modifier').click(function (e) {
    //     ht(y);
    //     e.preventDefault();
    //
    //     $('#modifier').unbind();
    // });


// });
// function ht(y) {
//     var r='editor'+y;
//     $('.contenumodif').attr("id",r);
//     var verifi=$('.contenumodif').attr("id");
//     console.log(verifi);
//     var ty='#'+verifi;
//     console.log(ty);
//     ClassicEditor
//         .create( document.querySelector(ty))
//         .catch( error => {
//             console.error( error );
//         } );
// }


function move(){

    $('#envoi').attr('data-toggle', 'modal').attr('data-target','#modaldemo1');
    var elem = document.getElementById("myBar");
    var width = 10;
    var id = setInterval(frame, 10);
    function frame() {
        if (width == 100) {
            clearInterval(id);
            //$success.show();

        } else {
            width++;
            elem.style.width = width + '%';
        }
    }
}




function imagesection(input) {

    if (input.files && input.files[0]){

        var fileimg = new FileReader();
        fileimg.onload=function (e) {
            $('#image').attr('src', e.target.result);
        };
        fileimg.readAsDataURL(input.files[0])

    }

}

function imagesectionmodif(input) {

    if (input.files && input.files[0]){

        var fileimg = new FileReader();
        fileimg.onload=function (e) {
            $('#imagemodif').attr('src', e.target.result);
        };
        fileimg.readAsDataURL(input.files[0])

    }

}


function imagesectionfooter(input) {

    if (input.files && input.files[0]){

        var fileimg = new FileReader();
        fileimg.onload=function (e) {
            $('#bg_footer').attr('src', e.target.result);
        };
        fileimg.readAsDataURL(input.files[0])

    }

}