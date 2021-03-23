<?php
//Categorie main view
?>
<div class="container container-fluid content-row">
  <div class="row">
    <h2>Login to your school CMA</h2>
  </div>
  <div class="row">
    <div class="col-sm-6 card">
      <form id="userLoginForm" action="<?php echo URL; ?>user/login" method="post">
        <div class="row">
          <div class="col-sm-12">
            <div class="form-group">
              <label for=""><b></b></label>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-12">
            <div class="form-group">
              <label for="email"><b>Email</b></label>
              <input type="text" class="form-control" name="email" id="email">
            </div>
            <div class="form-group">
              <label for="password"><b>Password</b></label>
              <input type="password" class="form-control" name="password" id="password">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-12">
            <div class="form-group">
              <input class="form-control pri-btn-color" type="submit" value="Login" style="background-color: #6dac29;font-weight: bold;
               border-radius:4px; color: #001;">
            </div>
            <div class="form-group">
              <label for="loginOrSignin">New to CMA ? <?php Utils::linkize("Register here", true, "#userModal"); ?></label>
            </div>
          </div>
        </div>
      </form>
    </div>

    <div class="col-sm-6">
      <div class="card h-100">

        <img class="card-img-top" src=<?php echo URL . "images/cma_default.jpg"; ?> alt="Card image">
        <div class="card-img-overlay">
          <h4 class="card-title"> </h4>
          <p class="card-text"> </p>
        </div>
      </div>
    </div>
  </div>
</div>

</div>

<!-- Add new user Modal -->
<div id="userModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title center">Register to CMA</h5>
        <button type="button" class="close" data-dismiss="modal">x</button>
      </div>
      <form id="categoryCreationForm" action="<?php echo URL; ?>course/create" method="post">
        <div class="modal-body">
          <div class="container">
            <div class="row">
              <div class="col-sm-12">
                <div class="form-group">
                  <label for=""><b>Personal informations</b></label>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                <div class="form-group">
                  <input type="text" class="form-control" name="names" id="names" placeholder="Names">
                </div>
                <div class="form-group">
                  <input type="date" class="form-control" name="birthdate" id="birthdate" placeholder="Birthdate">
                </div>
                <div class="form-group">
                  <input type="email" name="email" id="email" class="form-control" placeholder="email">
                </div>
                <div class="form-group">
                  <label for="password">Set your password (8 characters min. Include numbers and Symbols)</label>
                </div>
                <div class="form-group">
                  <select type="role" class="form-control" name="usertype" id="usertype">
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
                  <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                    <label class="form-check-label" for="flexSwitchCheckDefault"> Accept the Terms and Conditions of use.</label>
                  </div>
                  <div class="form-group">
                    <label for=""></label>
                    <input class="form-control pri-btn-color" type="submit" value="Create your account" style="background-color: #6dac29;font-weight: bold; border-radius:4px; color: #001;">
                  </div>
                  <div class="form-group">
                    <label for="loginOrSignin"><?php Utils::linkize("Connect with an existing account", true, "#loginModal"); ?></label>
                  </div>
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


<!-- Login modal -->
<div id="loginModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title center">Register to CMA</h5>
        <button type="button" class="close" data-dismiss="modal">x</button>
      </div>
      <form id="userLoginForm" action="<?php echo URL; ?>user/login" method="post">
        <div class="row">
          <div class="col-sm-12">
            <div class="form-group">
              <label for=""><b></b></label>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-12">
            <div class="form-group">
              <label for="email"><b>Email</b></label>
              <input type="text" class="form-control" name="email" id="email">
            </div>
            <div class="form-group">
              <label for="password"><b>Password</b></label>
              <input type="password" class="form-control" name="password" id="password">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-12">
            <div class="form-group">
              <input class="form-control pri-btn-color" type="submit" value="Login" style="background-color: #6dac29;font-weight: bold;
               border-radius:4px; color: #001;">
            </div>
            <div class="form-group">
              <label for="loginOrSignin">New to CMA ? <?php Utils::linkize("Register here", true, "#userModal"); ?></label>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>

</div>

<!-- Login Modal end -->