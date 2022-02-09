<?= $this->extend('layouts/default-with-nav') ?>

<?= $this->section('content') ?>
  <h2 class="text-center py-2">Registered Courses</h2>
  <?=view('dashboard/partials/courses')?>
  <?=view('dashboard/partials/exam-registration-form')?>
<?= $this->endSection() ?>

<?= $this->section('footer') ?>
<script type='text/javascript' src ="<?php echo base_url(); ?>/assets/js/registration-form.js"></script>
<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/registration-form.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/shared.css">
<?= $this->endSection() ?>
