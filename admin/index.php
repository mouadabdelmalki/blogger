<?php
require_once '../configuration/session-verification.php';
require_once '../configuration/config.php';
require_once 'url.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Meta -->
  <meta name="description" content="Actualités Dr Moussa">

  <title>BLOGGER : Gestion des actualités</title>

  <!-- vendor css -->
  <link rel="icon" href="../images/logo.jpg">
  <link href="../lib/font-awesome/css/font-awesome.css" rel="stylesheet">
  <link href="../lib/Ionicons/css/ionicons.css" rel="stylesheet">
  <link href="../lib/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet">
  <link href="../lib/rickshaw/rickshaw.min.css" rel="stylesheet">

  <!-- Katniss CSS -->
  <link rel="stylesheet" href="../css01/katniss.css">
</head>

<body>


  <?php
 require_once 'header.php';
?>

  <div class="kt-breadcrumb">
    <nav class="breadcrumb">
      <a class="breadcrumb-item" href="index.php">Administration Blog</a>
      <span class="breadcrumb-item active">Accueil</span>
    </nav>
  </div>
  <div class="kt-mainpanel">
    <div class="kt-pagetitle">
      <h5>Accueil</h5>
    </div>

    <div class="kt-pagebody">

    </div>

    <?php
        require_once 'footer.php';
        ?>
  </div>

  <script src="../lib/jquery/jquery.js"></script>
  <script src="../lib/popper.js/popper.js"></script>
  <script src="../lib/bootstrap/bootstrap.js"></script>
  <script src="../lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>
  <script src="../lib/moment/moment.js"></script>
  <script src="../lib/d3/d3.js"></script>
  <script src="../lib/rickshaw/rickshaw.min.js"></script>
  <script src="../lib/gmaps/gmaps.js"></script>
  <script src="../lib/chart.js/Chart.js"></script>

  <script src="../js0/katniss.js"></script>
  <script src="../js0/ResizeSensor.js"></script>
  <script src="../js0/dashboard.js"></script>

</body>

</html>
