<?php
Session::init();
Session::set("visitor", "anonymous" . "_" . rand(1000, 9999));
Session::set("visitedAt", date('H:m:s') . " on " . date('d-m-Y'));
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?= isset($this->title) ? $this->title : "CMA  - Course Management App"; ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="<?= URL; ?>/images/logo.png" type="image/png" sizes="20x20">
  <link rel="stylesheet" type="text/css" media="screen" href="<?php echo URL; ?>style/css/main.css" />
  <link rel="stylesheet" type="text/css" media="screen" href="<?php echo URL; ?>style/css/index.css" />
  <link rel="stylesheet" type="text/css" media="screen" href="<?php echo URL; ?>style/css/menu.css" />
  <link rel="stylesheet" type="text/css" media="screen" href="<?php echo URL; ?>style/css/bootstrap.css" />
  <?php //The advice is to use jquery google cdn
  ?>
  <script src="<?php echo URL; ?>scripts/js/jquery.min.js"></script>
  <script src="<?php echo URL; ?>scripts/js/bootstrap.min.js"></script>
  <script src="<?php echo URL; ?>scripts/js/fontawesome.js"></script>
  <!-- Custom global JS Files -->
  <script src="<?php echo URL; ?>scripts/js/menu.js"></script>
  <script src="<?php echo URL; ?>scripts/js/ville.js"></script>

  <?php
  if (isset($this->js)) {
    //including js file from model js array
    foreach ($this->js as $js) {
      echo '<script src="' . URL . $js . '"></script>';
    }
  }
  ?>
</head>

<body>
  <div id="header">
    <div class="container">
      <div class="row mb-3">
        <div class="col-lg-3">
          <img src="<?php echo URL; ?>images/logo.png" alt="LOGO" height="80" width="*">
        </div>
        <div class="col-lg-9" style="vertical-align: middle;">
          <h2 style="padding : 17px; font-family: Arial; font-weight: bolder;">Course Management App</h2>
        </div>

      </div>
    </div>

    <div class="container" style="background:#333;">

      <!--Tabs start-->
      <ul class="nav nav-tabs h-auto" style="border:0px;">
        <li><a href="<?php echo URL; ?>index">Annuaires</a></li>
        <li><a href="<?php echo URL; ?>dashboard">Dashboard</a></li>
        <li><a href="<?php echo URL; ?>service">Services</a></li>
        <li class="active"><a data-toggle="tab" href="#home">Rechercher</a></li>
      </ul>

      <div class="tab-content">
        <div id="home" class="tab-pane fade in active">
          <p class="mt-2">Trouvez et localisez des services utiles dans votre pays, votre ville</p>
          <!-- Search engine end -->
          <form class="" action="index.html" method="post">
            <div class="form-group">
              <div class="input-group mb-3">
                <input type="text" class="form-control" name="rechercher" placeholder="Saisissez le mot clé ici" value="">
                <div class="input-group-append">
                  <button class="btn btn-outline-secondary" type="button" id="btn-rechercher-header">Rechercher</button>
                </div>
              </div>
            </div>
          </form>
          <!-- Search engine end -->
        </div>
      </div>
      <!--Tabs  end-->
      <!--Menu per country start here-->
      <div class="row">
        <div class="float-right">
          <form class="form-inline float-right" action="#" method="post">
            <div class="form-group mb-2 mx-2">
              <label for="ville" class="mx-2" for="menu-pays" style="color:#fff;">Pour commencer sélectionnez</label>
              <select class="form-control" type="role" name="pays" id="menu-pays" onChange="townListToMenu(this.value);">
                <option value="">Votre Pays</option>
                <!-- List the city's names from database here -->
                <?php //echo Utils::arrayItemToList($this->paysNameList); 
                ?>

              </select>
            </div>

            <div class="form-group mb-2 mx-2">
              <label for="ville" class="label-white"></label>
              <select class="form-control" type="role" name="ville" id="menu-ville">
                <option value="">Votre Ville</option>
                <!-- List the city's names from database here -->
                <!-- Only if they are located in the selected country -->
              </select>

            </div>
            <div class="form-group mb-2 mx-2">
              <button type="button" class="form-control btn" name="button" id="rechercher_pays_villes">Rechercher dans votre région</button>
            </div>
          </form>
        </div>
      </div>
      <!--Menu per country end here-->
      <?php Utils::addBreadCumb(); ?>
    </div>
  </div>

  <div id="content">