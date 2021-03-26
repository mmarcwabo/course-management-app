<div class="container" style="background:#fff;">

  <h2>Dashboard</h2>
  <div class="row">
    <div class="col-lg-12">
      <?php
      if (isset($_SESSION['alertMessage'])) {
        Utils::alert($_SESSION['alertMessage'], $messageType = "success");
        unset($_SESSION['alertMessage']);
      }
      ?>
      <div class="card-deck">
        <div class="card" style="width: 18rem;">
          <img src=<?php echo URL . "images/cma_default.jpg"; ?> class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Courses</h5>
            <p class="card-text">
              <? echo "number of categories"; ?>
            </p>
            <!-- Trigger the categorie modal with a button -->
            <?php Utils::buttonize("Add a new course", true, "#courseModal"); ?>
          </div>
        </div>
        <div class="card" style="width: 18rem;">
          <img src=<?php echo URL . "images/cma_default.jpg"; ?> class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Schedules</h5>
            <p class="card-text">
              <? echo "number of services"; ?>
            </p>
            <!-- Trigger the service modal with a button -->
            <?php Utils::buttonize("Add a new promotion", true, "#promotionModal"); ?>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row mt-4">

    <div class="col-lg-12 ">
      <form class="form-inline">
        <div class="form-group">
          <br />
          <label for="Afficher">
            <h5>Afficher : </h5>
          </label>
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
      $source = "Users";
      Utils::showDatatable($source);
      ?>
    </div>
    <div class="col-lg-4">
      <div class="row">
        <div class="card" style="width: 18rem;">
          <img src=<?php echo URL . "images/utilisateurs.jpg"; ?> class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Users</h5>
            <p class="card-text">
              <? echo "number of categories"; ?>
            </p>
            <!-- Trigger the categorie modal with a button -->
            <?php Utils::buttonize("Manage users", true, "#usersModal"); ?>

          </div>
        </div>
      </div>
      <div class="row mt-4">
        <div class="card" style="width: 18rem;">
          <img src=<?php echo URL . "images/bug.jpg"; ?> class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Signaler un bug</h5>
            <p class="card-text">
              <? echo "number of categories"; ?>
            </p>
            <!-- Trigger the categorie modal with a button -->
            <?php Utils::buttonize("Signaler un bug", true, "#bugsModal"); ?>
          </div>
        </div>
      </div>

    </div>
  </div>
  <!-- Show datatables end-->
  <!-- Categorie Modal -->
  <div id="courseModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title center">Add a new course</h5>
          <button type="button" class="close" data-dismiss="modal">x</button>
        </div>
        <form id="categoryCreationForm" action="<?php echo URL; ?>course/create" method="post">
          <div class="modal-body">
            <div class="container">
              <div class="row">
                <div class="col-sm-12">
                  <div class="form-group">
                    <label for=""><b>Course's details</b></label>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12">
                  <div class="form-group">
                    <input type="text" class="form-control" name="title" id="title" placeholder="Course title">
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control" name="weight" id="weight" placeholder="Course weight">
                  </div>
                  <div class="form-group">
                    <input type="text" name="volume" id="volume" class="form-control" placeholder="Course volume">
                  </div>
                  <div class="form-group">
                    <select type="role" class="form-control" name="teacher" id="teacher">
                      <!-- List the category names from database here -->
                      <option value="">Teacher</option>
                      <?php echo Utils::arrayToList($this->teacherNameList); #add teacher list here 
                      ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <select type="role" class="form-control" name="promotion" id="promotion">
                      <!-- List the category names from database here -->
                      <option value="">Promotion</option>
                      <?php echo Utils::arrayToList($this->promotionNameList); #add teacher list here 
                      ?>
                    </select>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12">
                  <div class="form-group">
                    <input class="form-control pri-btn-color" type="submit" value="Save the course" style="background-color: #6dac29;font-weight: bold; border-radius:0px; color: #001;">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>

  </div>

  <!-- Add Course Modal end -->

  <!-- Add Promotion Modal -->
  <div id="addUserModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title center">Add a new student</h5>
          <button type="button" class="close" data-dismiss="modal">x</button>

        </div>
        <form id="serviceCreationForm" action="<?php echo URL; ?>user/create" method="post">
          <div class="modal-body">
            <div class="container">
              <div class="row">
                <div class="col-sm-12">
                  <div class="form-group">
                    <label for=""><b>User's information :</b></label>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <input type="text" name="names" id="names" class="form-group" placeholder="">
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <select type="role" class="form-control" name="departement" id="departement">
                      <!-- List of departements here -->
                      <option value="">Génie Civil</option>
                      <option value="">Génie Informatique</option>
                      <option value="">Génie Mécanique</option>
                      <option value="">Génie Electrique</option>
                    </select>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group">
                      <input class="form-control pri-btn-color" type="submit" value="Save the user" style="background-color: #6dac29;font-weight: bold; border-radius:0px; color: #001;">
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </form>
      </div>
    </div>

  </div>

  <!-- Add Promotion Modal end -->

  <div id="btn-devs" class="center">

    <button class="btn">Contacter les developpeurs</button>
    <button class="btn">Proposer un service à referencer</button>
  </div>

</div>
<!-- End of the docu -->