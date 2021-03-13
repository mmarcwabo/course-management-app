<div class="container" style="background:#fff;">

  <h2>Tableau de bord</h2>
  <div class="row">
    <div class="col-lg-12">
      <div class="card-deck">
        <div class="card" style="width: 18rem;">
          <img src=<?php echo URL."images/asw_default.jpg"; ?> class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Catégories</h5>
            <p class="card-text"><? echo "number of categories"; ?></p>
            <!-- Trigger the categorie modal with a button -->
            <?php Utils::buttonize("Ajouter une catégorie", true, "#categoryModal"); ?>

          </div>
        </div>
        <div class="card" style="width: 18rem;">
          <img src=<?php echo URL."images/asw_default.jpg"; ?> class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Services</h5>
            <p class="card-text"><? echo "number of services"; ?></p>
            <!-- Trigger the service modal with a button -->
            <?php Utils::buttonize("Ajouter un service", true, "#serviceModal"); ?>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row mt-4">

    <div class="col-lg-12 ">
      <form class="form-inline">
        <div class="form-group">
          <br/>
          <label for="Afficher"><h5>Afficher : <h5/></label>
            <select class="form-control" name="">
              <option value="">Utilisateurs</option>
              <option value="">Services</option>
            </select>
          </div>
        </form>
    </div>

    </div>
<!-- Show datatables here -->
    <div class="row ">
      <div class="col-lg-8">
        <?php
        $source = "Utilisateurs";
        Utils::showDatatable($source);
         ?>
      </div>
      <div class="col-lg-4">
        <div class="row">
          <div class="card" style="width: 18rem;">
            <img src=<?php echo URL."images/utilisateurs.jpg"; ?> class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Utilisateurs</h5>
              <p class="card-text"><? echo "number of categories"; ?></p>
              <!-- Trigger the categorie modal with a button -->
              <?php Utils::buttonize("Gérer les utilisateurs", true, "#usersModal"); ?>

            </div>
          </div>
        </div>
        <div class="row mt-4">
          <div class="card" style="width: 18rem;">
            <img src=<?php echo URL."images/bug.jpg"; ?> class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Signaler un bug</h5>
              <p class="card-text"><? echo "number of categories"; ?></p>
              <!-- Trigger the categorie modal with a button -->
              <?php Utils::buttonize("Signaler un bug", true, "#bugsModal"); ?>
            </div>
          </div>
        </div>

      </div>
    </div>
<!-- Show datatables end-->
    <!-- Categorie Modal -->
    <div id="categoryModal" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title center">Ajouter une nouvelle catégorie</h5>
            <button type="button" class="close" data-dismiss="modal">X</button>

          </div>
          <form id="categoryCreationForm" action="<?php echo URL;?>categorie/create" method="post">
            <div class="modal-body">
              <div class="container">
                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label for=""><b>Identifier la catégorie:</b></label>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group">
                      <input type="text" class="form-control" name="titre" id="titre" placeholder="Titre de la categorie">
                    </div>
                    <div class="form-group">
                      <textarea name="description" id="description" class="form-control" placeholder="Description de la catégorie"></textarea>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group">
                      <input class="form-control pri-btn-color" type="submit" value="Ajouter le catégorie"
                      style="background-color: #6dac29;font-weight: bold; border-radius:0px; color: #001;">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>

    </div>

    <!-- Categorie Modal end -->

    <!-- Modal -->
    <div id="serviceModal" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title center">Ajouter un nouveau service</h5>
            <button type="button" class="close" data-dismiss="modal">X</button>

          </div>
          <form id="serviceCreationForm" action="<?php echo URL;?>service/create" method="post">
            <div class="modal-body">
              <div class="container">
                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label for=""><b>Identifier le service :</b></label>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <input type="text" class="form-control" name="denomination" id="denomination" placeholder="Nom du service">
                    </div>
                    <div class="form-group">
                      <input type="email" class="form-control" name="adressemail" id="email" placeholder="Adresse mail">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <input type="text" class="form-control" name="telephone" id="telephone" placeholder="Télephone">
                    </div>
                    <div class="form-group">
                      <select type="role" class="form-control" name="categorie" id="categorie">
                        <!-- List the category names from database here -->
                        <option value="">Catégorie</option>
                        <?php echo Utils::arrayToList($this->categorieNameList); ?>
                      </select>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label for=""><b>Localiser le service :</b></label>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <select type="role" class="form-control" name="pays" id="pays" onChange="refreshTownList(this.value);">
                        <option value="">Pays</option>
                        <!-- List the city's names from database here -->
                        <?php echo Utils::arrayItemToList($this->paysNameList); ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <select type="role" class="form-control" name="ville" id="ville" onchange="showHideEle(this, 'nouvelleVille', 'Ajouter votre ville')">
                        <option value="">Ville</option>
                        <!-- List the city's names from database here -->
                        <!-- Only if they are located in the selected country -->

                        <option>Ajouter votre ville</i></option>
                      </select>
                      <!-- Showed only if the town is new -->
                      <input type="text" class="form-control" name="nouvelleVille" id="nouvelleVille"
                      placeholder="Saisissez le nom de votre ville"
                      style="display:none;"/>
                    </div>
                  </div>
                  <!-- Full form field here -->
                  <div class="col-sm-12">
                    <div class="form-group">
                      <textarea class="form-control" name="adresse" id="adresse" placeholder="Adresse physique"></textarea>
                    </div>
                    <div class="form-group">
                      <input type="text" class="form-control" name="horairedisponibilite" id="horairedisponibilite" placeholder="Horaire de disponibilité">
                    </div>
                    <div class="form-group">
                      <textarea name="details" class="form-control" id="details" placeholder="Description du service"></textarea>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group">
                      <input class="form-control pri-btn-color" type="submit" value="Ajouter le service"
                      style="background-color: #6dac29;font-weight: bold; border-radius:0px; color: #001;">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>

    </div>

    <!-- service Modal end -->

    <div id="btn-devs" class="center">

      <button class="btn">Contacter les developpeurs</button>
      <button class="btn">Proposer un service à referencer</button>
    </div>

  </div>
  <!-- End of the docu -->
