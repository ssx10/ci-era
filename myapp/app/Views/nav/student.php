<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
    <a class="navbar-brand" href="<?php echo base_url(); ?>/student">
      <img src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg" width="30" height="30" class="d-inline-block align-top" alt="">
      Demo App
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        
        <a class="nav-item nav-link active" href="<?php echo base_url(); ?>/student">Home</a>
        <a class="d-block d-lg-none nav-item nav-link" href="<?php echo base_url(); ?>/SigninController/logout">Logout</a>
      </div>
    </div>
    <div class="my-2 my-lg-0 d-none d-lg-block">
      <div class="navbar-nav">
        <a class="nav-item nav-link" href="<?php echo base_url(); ?>/SigninController/logout">Logout</a>
      </div>
    </div>
  </div>
</nav>