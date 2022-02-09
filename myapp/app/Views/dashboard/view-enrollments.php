<?= $this->extend('layouts/default-with-nav') ?>

<?= $this->section('content') ?>
  <h2 class="text-center py-3">View Enrollments</h2>
  <?=view('dashboard/partials/enrollments-search')?>
  <?=view('dashboard/partials/enrollments')?>
<?= $this->endSection() ?>

<?= $this->section('footer') ?>
<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/shared.css">
<?= $this->endSection() ?>