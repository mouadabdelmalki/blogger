
$(function(){
    'use strict';


    // Summernote editor
    $('#summernote').summernote({
        tooltip: false
    });


    });

function modifiergal(id_pg,id,titre,btn1,lien1,btn2,lien2,galerie,contenu) {

    document.getElementById('id_page_g').value = id_pg;
    document.getElementById('id_sec_g').value = id;
    document.getElementById('titre_section_modif_g').value = titre;
    document.getElementById('titre1_g').value = btn1;
    document.getElementById('lien1_g').value = lien1;
    document.getElementById('titre2_g').value = btn2;
    document.getElementById('lien2_g').value = lien2;
    document.getElementById('s_galerie').selectedIndex=galerie-1;

    document.getElementById('contenu_g').innerHTML = contenu;
    var myeditor1;
    ClassicEditor
        .create(document.querySelector('#contenu_g')).then(contenu_g => {
        myeditor1 = contenu_g;
    }).catch(error => {
        console.error(error);
    });

    $('#s_g_modif').modal({
        backdrop: 'static',
        keyboard: true,
    });
}

