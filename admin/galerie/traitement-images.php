<?php 

require_once '../../configuration/config.php';



if(!empty($_FILES['file']['name'])){
    $countfiles = count($_FILES['file']['name']);
    $idgalr = $_POST['listgalerie'] ;
   
    for($i=0;$i<$countfiles;$i++){
        $filename = $_FILES['file']['name'][$i];
        move_uploaded_file($_FILES['file']['tmp_name'][$i],"../../images/galerie/".$filename);
        $reqt = mysqli_query($connect,"INSERT INTO `img_galerie` (`id_img`, `id_galerie`, `images`) VALUES (NULL, '".$idgalr."', '$filename')");
    }

   // header('Location:  /liste-galerie.php');
}


// if(!isset($_GET["image"])){
//     if(unlink("../../../images/galerie/".$_GET["image"])){
//         // header('location: ../liste-galerie.php');
//     }
// }

?>