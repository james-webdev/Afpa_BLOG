<?php include("app/view/layout/header.inc.php"); ?>

<!-- Page Header -->
  <header class="masthead" style="background-image: url('webroot/img/contact-bg.jpg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="page-heading">
            <h1>Inscrivez-vous !</h1>
            <span class="subheading">Aller !</span>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Main Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <p></p>
        
        <form name="sentMessage" id="contactForm" method="post" action="index.php?module=users&action=register">
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Login</label>
              <input type="text" class="form-control" placeholder="Login" id="login"  name="user_login" required data-validation-required-message="Entrez votre login.">
              <p class="help-block text-danger"></p>
            </div>
          </div>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>E-mail</label>
              <input type="email" class="form-control" placeholder="E-mail" id="login"  name="user_email" required data-validation-required-message="Entrez votre login.">
              <p class="help-block text-danger"></p>
            </div>
          </div>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>PenName</label>
              <input type="text" class="form-control" placeholder="PenName" id="login"  name="display_name" required data-validation-required-message="Entrez votre login.">
              <p class="help-block text-danger"></p>
            </div>
          </div>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Password</label>
              <input type="password" class="form-control" placeholder="Password" id="user_pass" name="user_pass" required data-validation-required-message="Entrez votre password.">
              <p class="help-block text-danger"></p>
            </div>
          </div>
          <br>
          <div id="success"></div>
          <div class="form-group">
            <button type="submit" class="btn btn-primary" id="sendMessageButton">M'iscrire</button>
          </div>
        </form>
      </div>
    </div>
  </div>

<?php include("app/view/layout/footer.inc.php"); ?>