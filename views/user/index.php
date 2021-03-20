<?php
//Categorie main view
?>
<div class="container container-fluid content-row" >
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
               border-radius:0px; color: #001;">
            </div>
            <div class="form-group">
              <label for="loginOrSignin">New to CMA ? <a href="user/register">Register here</a></label>
            </div>
          </div>
        </div>
      </form>
    </div>

    <div class="col-sm-6">
    <div class="card h-100">

      <img class="card-img-top" src=<?php echo URL."images/cma_default.jpg"; ?> alt="Card image">
      <div class="card-img-overlay">
        <h4 class="card-title"> </h4>
        <p class="card-text"> </p>
      </div></div>
    </div>
  </div>
</div>

</div>