
<?= $this->extend('layouts/default') ?>

<?= $this->section('content') ?>
<div class="container text-center mt-5  pt-5">
  <div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4">
      <form class="form-signin container" action="<?php echo base_url(); ?>/SigninController/loginAuth" method="post">
        <?= csrf_field() ?>
        <img class="mb-4" src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
        <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
        <?php if(session()->getFlashdata('msg')):?>
          <div class="alert alert-warning">
              <?= session()->getFlashdata('msg') ?>
          </div>
        <?php endif;?>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" name="email" class="form-control" placeholder="Email address" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name="password" class="form-control mt-2" placeholder="Password" required>
        <button class="btn btn-lg btn-primary btn-block mt-3" type="submit">Sign in</button>
      </form>
    </div>
    <div class="col-md-4"></div>
  </div>
</div>
<?= $this->endSection() ?>
